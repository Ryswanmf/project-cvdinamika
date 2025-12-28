<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ContactModel;
use App\Models\BlogModel;

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

        $data = [
            'title' => 'Dashboard Admin',
            'page_title' => 'Dashboard Overview',
            'total_products' => $productModel->countAllResults(),
            'total_blogs' => $blogModel->countAllResults(),
            'unread_contacts' => $contactModel->where('status', 'unread')->countAllResults(),
            'recent_contacts' => $contactModel->orderBy('created_at', 'DESC')->findAll(5)
        ];

        return view('admin/index', $data);
    }
}
