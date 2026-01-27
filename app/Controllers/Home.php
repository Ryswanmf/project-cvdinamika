<?php

namespace App\Controllers;

use App\Models\SiteSettingModel;
use App\Models\ProjectModel;
use App\Models\ProductModel;
use App\Models\ContactModel;
use App\Models\BlogModel;
use App\Models\TeamModel;
use App\Models\TestimonialModel;
use App\Models\FaqModel;
use App\Models\BannerModel;
use App\Models\ServiceModel;
use App\Models\ProductImageModel;

class Home extends BaseController
{
    protected $siteSettings;
    protected $projectModel;
    protected $productModel;
    protected $productImageModel;
    protected $blogModel;
    protected $teamModel;
    protected $testimonialModel;
    protected $faqModel;
    protected $bannerModel;
    protected $serviceModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->productModel = new ProductModel();
        $this->productImageModel = new ProductImageModel();
        $this->blogModel = new BlogModel();
        $this->teamModel = new TeamModel();
        $this->testimonialModel = new TestimonialModel();
        $this->faqModel = new FaqModel();
        $this->bannerModel = new BannerModel();
        $this->serviceModel = new ServiceModel();

        // Cache site settings for 1 hour
        $this->siteSettings = cache('site_settings');
        if (!$this->siteSettings) {
            $settingModel = new SiteSettingModel();
            $settingsData = $settingModel->findAll();

            // Convert to associative array [key_name => value]
            $this->siteSettings = [];
            foreach ($settingsData as $row) {
                $this->siteSettings[$row['key_name']] = $row['value'];
            }
            cache()->save('site_settings', $this->siteSettings, 3600); // 1 hour
        }
    }

    public function index(): string
    {
        // Schema.org Organization Data
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $this->siteSettings['site_title'] ?? 'CV Dinamika',
            'url' => base_url(),
            'logo' => base_url('img/logo_dinamikainti.png'),
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => $this->siteSettings['contact_phone'] ?? '',
                'contactType' => 'customer service',
                'areaServed' => 'ID',
                'availableLanguage' => 'Indonesian'
            ],
            'sameAs' => array_values(array_filter([
                $this->siteSettings['social_instagram'] ?? null,
                $this->siteSettings['social_facebook'] ?? null,
                $this->siteSettings['link_tokopedia'] ?? null,
                $this->siteSettings['link_shopee'] ?? null
            ]))
        ];

        $data = [
            'title' => 'Beranda',
            'settings' => $this->siteSettings,
            'recent_projects' => [],
            'teams' => $this->teamModel->findAll(),
            'testimonials' => $this->testimonialModel->findAll(),
            'banners' => $this->bannerModel->where('is_active', 1)->orderBy('sort_order', 'ASC')->findAll(),
            'services' => $this->serviceModel->orderBy('sort_order', 'ASC')->findAll(),
            'schema' => $schema
        ];
        try {
            $data['recent_projects'] = $this->projectModel->orderBy('id', 'DESC')->findAll(6);
        } catch (\Throwable $e) {
            $data['recent_projects'] = [];
        }
        return view('landing-page/index', $data);
    }

    public function about(): string
    {
        return view('landing-page/tentang-kami/index', [
            'title' => 'Tentang Kami',
            'settings' => $this->siteSettings
        ]);
    }

    public function sejarah(): string
    {
        return view('landing-page/sejarah/index', [
            'title' => 'Sejarah Kami',
            'settings' => $this->siteSettings
        ]);
    }

    public function contact(): string
    {
        return view('landing-page/kontak/index', [
            'title' => 'Kontak',
            'settings' => $this->siteSettings
        ]);
    }

    public function portfolio(): string
    {
        $data = [
            'title' => 'Portofolio Proyek',
            'settings' => $this->siteSettings,
            'projects' => []
        ];
        try {
            $data['projects'] = $this->projectModel->findAll();
        } catch (\Throwable $e) {
            $data['projects'] = [];
        }
        return view('landing-page/portofolio/index', $data);
    }

    public function productDetail($id = null): \CodeIgniter\HTTP\ResponseInterface|string
    {
        if ($id === null) {
            return redirect()->to('/produk');
        }

        $product = $this->productModel->find($id);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil galeri varian
        $gallery = $this->productImageModel->where('product_id', $id)->findAll();

        // Ambil 4 produk terkait (selain produk ini)
        $relatedProducts = $this->productModel->where('id !=', $id)
                                              ->where('category', $product['category'])
                                              ->orderBy('rand()')
                                              ->findAll(4);
        
        // Schema.org Product Data
        $schema = [
            '@context' => 'https://schema.org/',
            '@type' => 'Product',
            'name' => $product['name'],
            'image' => base_url('uploads/products/' . $product['image']),
            'description' => substr(strip_tags($product['description']), 0, 160),
            'brand' => [
                '@type' => 'Brand',
                'name' => $this->siteSettings['site_title'] ?? 'CV Dinamika'
            ],
            'offers' => [
                '@type' => 'Offer',
                'url' => current_url(),
                'priceCurrency' => 'IDR',
                'price' => $product['price'],
                'availability' => 'https://schema.org/InStock',
                'itemCondition' => 'https://schema.org/NewCondition'
            ]
        ];

        $data = [
            'title' => $product['name'],
            'meta_description' => substr(strip_tags($product['description']), 0, 160),
            'og_image' => base_url('uploads/products/' . $product['image']),
            'settings' => $this->siteSettings,
            'product' => $product,
            'gallery' => $gallery,
            'related_products' => $relatedProducts,
            'schema' => $schema // Pass schema to view
        ];
        return view('landing-page/produk/detail', $data);
    }

    public function blog(): string
    {
        $data = [
            'title' => 'Blog & Artikel',
            'settings' => $this->siteSettings,
            'blogs' => $this->blogModel->orderBy('created_at', 'DESC')->paginate(6),
            'pager' => $this->blogModel->pager
        ];
        return view('landing-page/blog/index', $data);
    }

    public function blogDetail($slug = null): string
    {
        $blog = $this->blogModel->where('slug', $slug)->first();

        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Schema.org BlogPosting Data
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => current_url()
            ],
            'headline' => $blog['title'],
            'image' => base_url('uploads/blog/' . $blog['image']),
            'author' => [
                '@type' => 'Person',
                'name' => $blog['author'] ?? 'Admin'
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => $this->siteSettings['site_title'] ?? 'CV Dinamika',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => base_url('img/logo_dinamikainti.png')
                ]
            ],
            'datePublished' => $blog['created_at'],
            'dateModified' => $blog['updated_at'] ?? $blog['created_at']
        ];

        $data = [
            'title' => $blog['title'],
            'meta_description' => substr(strip_tags($blog['content']), 0, 160),
            'og_image' => base_url('uploads/blog/' . $blog['image']),
            'settings' => $this->siteSettings,
            'blog' => $blog,
            'recent_posts' => $this->blogModel->orderBy('created_at', 'DESC')->findAll(3),
            'schema' => $schema
        ];
        return view('landing-page/blog/detail', $data);
    }

    public function sendMessage()
    {
        $contactModel = new ContactModel();

        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'message' => 'required|min_length[5]',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Harap isi form dengan benar.');
        }

        $contactModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
            'status' => 'unread'
        ]);

        return redirect()->to('/kontak')->with('success', 'Pesan Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }

    public function sendTestimonial()
    {
        $testimonialModel = new TestimonialModel();

        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'message' => 'required|min_length[10]',
            'rating' => 'required|numeric|less_than_equal_to[5]'
        ])) {
            return redirect()->back()->withInput()->with('error_testi', 'Mohon lengkapi ulasan Anda.');
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'position' => $this->request->getPost('position') ?: 'Pelanggan',
            'message' => $this->request->getPost('message'),
            'rating' => $this->request->getPost('rating'),
            'status' => 'pending' // Wajib pending sampai diapprove admin
        ];

        // Handle Image Optional
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Compress logic should ideally be here, but for now simple move
            // We can reuse the helper if we load it
            helper('image');
            $fileName = $file->getRandomName();
            upload_and_compress($file, 'uploads/testimonial', $fileName, 80, 500);
            $data['image'] = $fileName;
        }

        $testimonialModel->save($data);

        return redirect()->to('/kontak')->with('success_testi', 'Terima kasih! Ulasan Anda telah dikirim dan menunggu moderasi.');
    }

    public function faq(): string
    {
        $data = [
            'title' => 'Pertanyaan yang Sering Diajukan (FAQ)',
            'settings' => $this->siteSettings,
            'faqs' => $this->faqModel->orderBy('sort_order', 'ASC')->findAll()
        ];
        return view('landing-page/faq/index', $data);
    }

    public function products(): string
    {
        $data = [
            'title' => 'Produk Kami - Koleksi Lantai Berkualitas Premium',
            'settings' => $this->siteSettings,
            'meta_description' => 'Jelajahi koleksi lengkap lantai vinyl premium kami dari brand terkemuka seperti LX Hausys, LG Hausys, Gerflor, Armstrong, dan lainnya.',
            'meta_keywords' => 'lantai vinyl, homogeneous sheet, heterogeneous sheet, plank tile, LX Hausys, LG Hausys, Gerflor, Armstrong'
        ];
        return view('landing-page/products', $data);
    }
}