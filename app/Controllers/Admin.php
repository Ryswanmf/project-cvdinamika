<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ContactModel;
use App\Models\BlogModel;
use App\Models\VisitorModel;

class Admin extends BaseController
{
    public function index()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to(site_url('login'));
        }

        $productModel = new ProductModel();
        $contactModel = new ContactModel();
        $blogModel = new BlogModel();
        $visitorModel = new VisitorModel();

        // Visitor Stats
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        $visitors_today = $visitorModel->where('visit_date', $today)->countAllResults();
        $visitors_yesterday = $visitorModel->where('visit_date', $yesterday)->countAllResults();
        $visitors_total = $visitorModel->countAllResults();

        // Data for Visitor Chart (Last 7 Days)
        $chart_data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $count = $visitorModel->where('visit_date', $date)->countAllResults();
            $chart_data[] = [
                'date' => date('d M', strtotime($date)), // Format: 20 Jan
                'count' => $count
            ];
        }

        // Count products from catalog JSON
        $total_products = $this->countProductsFromCatalog();
        
        $data = [
            'title' => 'Dashboard Admin',
            'page_title' => 'Dashboard Overview',
            'total_products' => $total_products,
            'total_categories' => 0, // Will be counted from catalog
            'total_blogs' => $blogModel->countAllResults(),
            'unread_contacts' => $contactModel->where('status', 'unread')->countAllResults(),
            'recent_contacts' => $contactModel->orderBy('created_at', 'DESC')->findAll(5),
            'chart_data' => $chart_data,
            'visitors_today' => $visitors_today,
            'visitors_yesterday' => $visitors_yesterday,
            'visitors_total' => $visitors_total
        ];

        return view('admin/index', $data);
    }
    
    /**
     * Count total products from catalog JSON file
     */
    private function countProductsFromCatalog()
    {
        $catalogPath = FCPATH . 'data' . DIRECTORY_SEPARATOR . 'products.json';
        
        if (!file_exists($catalogPath)) {
            return 0;
        }
        
        $json = file_get_contents($catalogPath);
        $catalog = json_decode($json, true);
        
        if (!$catalog || !isset($catalog['categories'])) {
            return 0;
        }
        
        $total = 0;
        
        // Count products in all categories
        foreach ($catalog['categories'] as $category) {
            if (isset($category['brands'])) {
                foreach ($category['brands'] as $brand) {
                    // Count products directly in brand
                    if (isset($brand['items']) && is_array($brand['items'])) {
                        $total += count($brand['items']);
                    }
                    
                    // Count products in collections/subfolders
                    if (isset($brand['subfolders']) && is_array($brand['subfolders'])) {
                        foreach ($brand['subfolders'] as $subfolder) {
                            if (isset($subfolder['items']) && is_array($subfolder['items'])) {
                                $total += count($subfolder['items']);
                            }
                        }
                    }
                }
            }
        }
        
        return $total;
    }
}
