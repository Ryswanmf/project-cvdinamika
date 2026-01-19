<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\BlogModel;
use App\Models\ProjectModel;

class Sitemap extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $blogModel = new BlogModel();
        $projectModel = new ProjectModel();

        $products = $productModel->orderBy('updated_at', 'DESC')->findAll();
        $blogs = $blogModel->orderBy('updated_at', 'DESC')->findAll();
        $projects = $projectModel->orderBy('created_at', 'DESC')->findAll(); // Project biasanya tidak punya updated_at, pakai created

        $urls = [];

        // Static Pages
        $urls[] = ['loc' => base_url('/'), 'priority' => '1.0', 'changefreq' => 'daily'];
        $urls[] = ['loc' => base_url('/produk'), 'priority' => '0.9', 'changefreq' => 'weekly'];
        $urls[] = ['loc' => base_url('/portofolio'), 'priority' => '0.9', 'changefreq' => 'weekly'];
        $urls[] = ['loc' => base_url('/blog'), 'priority' => '0.8', 'changefreq' => 'weekly'];
        $urls[] = ['loc' => base_url('/tentang-kami'), 'priority' => '0.7', 'changefreq' => 'monthly'];
        $urls[] = ['loc' => base_url('/kontak'), 'priority' => '0.7', 'changefreq' => 'monthly'];

        // Products
        foreach ($products as $prod) {
            $urls[] = [
                'loc' => base_url('produk/detail/' . $prod['id']),
                'priority' => '0.9',
                'changefreq' => 'weekly',
                'lastmod' => $prod['updated_at'] ?? date('Y-m-d H:i:s')
            ];
        }

        // Blogs
        foreach ($blogs as $blog) {
            $urls[] = [
                'loc' => base_url('blog/' . $blog['slug']),
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'lastmod' => $blog['updated_at'] ?? $blog['created_at']
            ];
        }

        // Projects (Karena tidak punya halaman detail, kita skip atau arahkan ke halaman portofolio)
        // Jika nanti ada detail proyek, bisa ditambahkan di sini.

        // Generate XML
        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">
";

        foreach ($urls as $url) {
            $xml .= "\t<url>\n";
            $xml .= "\t\t<loc>" . $url['loc'] . "</loc>\n";
            if (isset($url['lastmod'])) {
                // Format tanggal W3C Datetime
                $date = new \DateTime($url['lastmod']);
                $xml .= "\t\t<lastmod>" . $date->format('c') . "</lastmod>\n";
            }
            $xml .= "\t\t<changefreq>" . $url['changefreq'] . "</changefreq>\n";
            $xml .= "\t\t<priority>" . $url['priority'] . "</priority>\n";
            $xml .= "\t</url>\n";
        }

        $xml .= "</urlset>";

        return $this->response->setContentType('text/xml')->setBody($xml);
    }
}
