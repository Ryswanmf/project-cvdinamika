<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class Services extends BaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        helper('image');
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Layanan',
            'page_title' => 'Daftar Layanan',
            'services' => $this->serviceModel->orderBy('sort_order', 'ASC')->findAll()
        ];
        return view('admin/services/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Layanan',
            'page_title' => 'Tambah Layanan Baru',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/services/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title' => 'required|min_length[3]',
            'description' => 'required',
            'icon' => 'required',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('image');
        $fileName = $file->getRandomName();
        
        // Upload & Compress
        upload_and_compress($file, 'uploads/services', $fileName, 80, 800);

        $this->serviceModel->save([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'icon' => $this->request->getPost('icon'),
            'image' => $fileName,
            'sort_order' => $this->request->getPost('sort_order') ?: 0
        ]);

        return redirect()->to(site_url('admin/services'))->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $service = $this->serviceModel->find($id);
        if (!$service) return redirect()->to(site_url('admin/services'));

        $data = [
            'title' => 'Edit Layanan',
            'page_title' => 'Edit Layanan',
            'service' => $service,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/services/edit', $data);
    }

    public function update($id)
    {
        $service = $this->serviceModel->find($id);
        if (!$service) return redirect()->to(site_url('admin/services'));

        $rules = [
            'title' => 'required|min_length[3]',
            'description' => 'required',
            'icon' => 'required',
        ];

        if ($this->request->getFile('image')->isValid()) {
            $rules['image'] = 'uploaded[image]|max_size[image,2048]|is_image[image]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id' => $id,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'icon' => $this->request->getPost('icon'),
            'sort_order' => $this->request->getPost('sort_order') ?: 0
        ];

        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            if ($service['image'] && file_exists('uploads/services/' . $service['image'])) {
                unlink('uploads/services/' . $service['image']);
            }
            $fileName = $file->getRandomName();
            upload_and_compress($file, 'uploads/services', $fileName, 80, 800);
            $data['image'] = $fileName;
        }

        $this->serviceModel->save($data);
        return redirect()->to(site_url('admin/services'))->with('success', 'Layanan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $service = $this->serviceModel->find($id);
        if ($service) {
            if ($service['image'] && file_exists('uploads/services/' . $service['image'])) {
                unlink('uploads/services/' . $service['image']);
            }
            $this->serviceModel->delete($id);
            return redirect()->to(site_url('admin/services'))->with('success', 'Layanan berhasil dihapus.');
        }
        return redirect()->to(site_url('admin/services'));
    }
}
