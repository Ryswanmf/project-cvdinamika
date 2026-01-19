<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ProjectModel;
use App\Models\BlogModel;
use App\Models\SiteSettingModel;

class Search extends BaseController
{
    protected $siteSettings;
    protected $productModel;
    protected $projectModel;
    protected $blogModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->projectModel = new ProjectModel();
        $this->blogModel = new BlogModel();

        // Load settings (mirip dengan Home.php)
        $this->siteSettings = cache('site_settings');
        if (!$this->siteSettings) {
            $settingModel = new SiteSettingModel();
            $settingsData = $settingModel->findAll();

            $this->siteSettings = [];
            foreach ($settingsData as $row) {
                $this->siteSettings[$row['key_name']] = $row['value'];
            }
            cache()->save('site_settings', $this->siteSettings, 3600);
        }
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');
        
        $data = [
            'settings' => $this->siteSettings,
            'keyword' => $keyword,
            'results' => [
                'products' => [],
                'projects' => [],
                'blogs'    => []
            ]
        ];

        if ($keyword) {
            // Search Products
            $data['results']['products'] = $this->productModel
                ->like('name', $keyword)
                ->orLike('description', $keyword)
                ->findAll();

            // Search Projects
            $data['results']['projects'] = $this->projectModel
                ->like('title', $keyword) // Asumsi fieldnya 'title'
                ->orLike('description', $keyword)
                ->findAll();

            // Search Blogs
            $data['results']['blogs'] = $this->blogModel
                ->like('title', $keyword)
                ->orLike('content', $keyword)
                ->findAll();
        }

        return view('landing-page/search_results', $data);
    }
}
