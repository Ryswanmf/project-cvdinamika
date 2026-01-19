<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannerModel;

class Banner extends BaseController
{
    protected $bannerModel;

    public function __construct()
    {
        $this->bannerModel = new BannerModel();
        helper('image'); // Helper custom kita
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Banner',
            'page_title' => 'Banner / Slider Depan',
            'banners' => $this->bannerModel->orderBy('sort_order', 'ASC')->findAll()
        ];
        return view('admin/banner/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Banner',
            'page_title' => 'Tambah Banner Baru',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/banner/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'image' => 'uploaded[image]|max_size[image,5120]|is_image[image]',
            'sort_order' => 'numeric'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('image');
        $fileName = $file->getRandomName();
        
        // Simpan gambar (tanpa kompresi berlebih karena ini hero image, kualitas harus bagus)
        // Kita pakai helper tapi set quality tinggi
        upload_and_compress($file, 'uploads/banners', $fileName, 90, 1920);

        $this->bannerModel->save([
            'title' => $this->request->getPost('title'),
            'subtitle' => $this->request->getPost('subtitle'),
            'image' => $fileName,
            'link' => $this->request->getPost('link'),
            'sort_order' => $this->request->getPost('sort_order') ?: 0,
            'is_active' => 1
        ]);

        return redirect()->to(site_url('admin/banner'))->with('success', 'Banner berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $banner = $this->bannerModel->find($id);
        if ($banner) {
            if (file_exists('uploads/banners/' . $banner['image'])) {
                unlink('uploads/banners/' . $banner['image']);
            }
            $this->bannerModel->delete($id);
            return redirect()->to(site_url('admin/banner'))->with('success', 'Banner dihapus.');
        }
        return redirect()->to(site_url('admin/banner'));
    }
}
