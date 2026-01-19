<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogModel;

class Blog extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
        helper('image');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Artikel',
            'page_title' => 'Manajemen Blog',
            'blogs' => $this->blogModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/blog/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tulis Artikel',
            'page_title' => 'Tulis Artikel Baru',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/blog/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title' => 'required|min_length[5]',
            'category' => 'required',
            'content' => 'required',
            'image' => 'uploaded[image]|max_size[image,5120]|is_image[image]'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('image');
        $fileName = $file->getRandomName();
        
        // Compress image
        $uploadPath = 'uploads/blog';
        upload_and_compress($file, $uploadPath, $fileName, 80, 1024);

        $slug = url_title($this->request->getPost('title'), '-', true);

        $this->blogModel->save([
            'title' => $this->request->getPost('title'),
            'slug' => $slug,
            'category' => $this->request->getPost('category'),
            'content' => $this->request->getPost('content'),
            'image' => $fileName,
            'author' => session()->get('user_name') ?? 'Admin'
        ]);

        return redirect()->to(site_url('admin/blog'))->with('success', 'Artikel berhasil diterbitkan.');
    }

    public function edit($id)
    {
        $blog = $this->blogModel->find($id);
        if (!$blog) return redirect()->to(site_url('admin/blog'));

        $data = [
            'title' => 'Edit Artikel',
            'page_title' => 'Edit Artikel',
            'blog' => $blog,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/blog/edit', $data);
    }

    public function update($id)
    {
        $blog = $this->blogModel->find($id);
        if (!$blog) return redirect()->to(site_url('admin/blog'));

        $rules = [
            'title' => 'required|min_length[5]',
            'category' => 'required',
            'content' => 'required',
        ];

        if ($this->request->getFile('image')->isValid()) {
            $rules['image'] = 'uploaded[image]|max_size[image,5120]|is_image[image]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $slug = url_title($this->request->getPost('title'), '-', true);

        $data = [
            'id' => $id,
            'title' => $this->request->getPost('title'),
            'slug' => $slug,
            'category' => $this->request->getPost('category'),
            'content' => $this->request->getPost('content'),
        ];

        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            if ($blog['image'] && file_exists('uploads/blog/' . $blog['image'])) {
                unlink('uploads/blog/' . $blog['image']);
            }
            $fileName = $file->getRandomName();
            
            // Compress image
            $uploadPath = 'uploads/blog';
            upload_and_compress($file, $uploadPath, $fileName, 80, 1024);
            
            $data['image'] = $fileName;
        }

        $this->blogModel->save($data);
        return redirect()->to(site_url('admin/blog'))->with('success', 'Artikel berhasil diperbarui.');
    }

    public function delete($id)
    {
        $blog = $this->blogModel->find($id);
        if ($blog) {
            if ($blog['image'] && file_exists('uploads/blog/' . $blog['image'])) {
                unlink('uploads/blog/' . $blog['image']);
            }
            $this->blogModel->delete($id);
            return redirect()->to(site_url('admin/blog'))->with('success', 'Artikel berhasil dihapus.');
        }
        return redirect()->to(site_url('admin/blog'))->with('error', 'Artikel tidak ditemukan.');
    }
}
