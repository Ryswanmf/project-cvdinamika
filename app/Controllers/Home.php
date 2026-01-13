<?php

namespace App\Controllers;

use App\Models\SiteSettingModel;
use App\Models\ProjectModel;
use App\Models\ProductModel;
use App\Models\ContactModel;
use App\Models\BlogModel;
use App\Models\TeamModel;
use App\Models\TestimonialModel;

class Home extends BaseController
{
    protected $siteSettings;
    protected $projectModel;
    protected $productModel;
    protected $blogModel;
    protected $teamModel;
    protected $testimonialModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->productModel = new ProductModel();
        $this->blogModel = new BlogModel();
        $this->teamModel = new TeamModel();
        $this->testimonialModel = new TestimonialModel();

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
        $data = [
            'settings' => $this->siteSettings,
            'recent_projects' => [],
            'teams' => $this->teamModel->findAll(),
            'testimonials' => $this->testimonialModel->findAll()
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
        return view('landing-page/tentang-kami/index', ['settings' => $this->siteSettings]);
    }

    public function sejarah(): string
    {
        return view('landing-page/sejarah/index', ['settings' => $this->siteSettings]);
    }

    public function contact(): string
    {
        return view('landing-page/kontak/index', ['settings' => $this->siteSettings]);
    }

    public function portfolio(): string
    {
        $data = [
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

    public function products(): string
    {
        // Ambil filter kategori dari URL jika ada
        $category = $this->request->getGet('category');
        
        if ($category && $category != 'Semua') {
            $products = $this->productModel->where('category', $category)->findAll();
        } else {
            $products = $this->productModel->findAll();
        }

        $data = [
            'settings' => $this->siteSettings,
            'products' => $products,
            'current_category' => $category ?? 'Semua'
        ];
        return view('landing-page/produk/index', $data);
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

        // Ambil 4 produk terkait (selain produk ini)
        $relatedProducts = $this->productModel->where('id !=', $id)
                                              ->where('category', $product['category'])
                                              ->orderBy('rand()')
                                              ->findAll(4);

        $data = [
            'settings' => $this->siteSettings,
            'product' => $product,
            'related_products' => $relatedProducts
        ];
        return view('landing-page/produk/detail', $data);
    }

    public function blog(): string
    {
        $data = [
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

        $data = [
            'settings' => $this->siteSettings,
            'blog' => $blog,
            'recent_posts' => $this->blogModel->orderBy('created_at', 'DESC')->findAll(3)
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
}