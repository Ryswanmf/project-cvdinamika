<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;

class Testimonial extends BaseController
{
    protected $testimonialModel;

    public function __construct()
    {
        $this->testimonialModel = new TestimonialModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Testimonial',
            'page_title' => 'Manajemen Testimonial',
            'testimonials' => $this->testimonialModel->findAll()
        ];
        return view('admin/testimonial/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Testimonial',
            'page_title' => 'Tambah Testimonial',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/testimonial/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'name' => 'required',
            'message' => 'required',
            'image' => 'max_size[image,2048]|is_image[image]' // Image optional
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'position' => $this->request->getPost('position'),
            'message' => $this->request->getPost('message'),
            'rating' => $this->request->getPost('rating') ?: 5,
        ];

        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/testimonial', $fileName);
            $data['image'] = $fileName;
        }

        $this->testimonialModel->save($data);

        return redirect()->to(site_url('admin/testimonial'))->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $testi = $this->testimonialModel->find($id);
        if ($testi) {
            if (!empty($testi['image']) && file_exists('uploads/testimonial/' . $testi['image'])) {
                unlink('uploads/testimonial/' . $testi['image']);
            }
            $this->testimonialModel->delete($id);
            return redirect()->to(site_url('admin/testimonial'))->with('success', 'Testimonial dihapus.');
        }
        return redirect()->to(site_url('admin/testimonial'));
    }
}
