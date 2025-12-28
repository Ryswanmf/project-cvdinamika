<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProjectModel;

class Projects extends BaseController
{
    protected $projectModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Proyek',
            'page_title' => 'Kelola Proyek',
            'projects' => $this->projectModel->orderBy('id', 'DESC')->findAll()
        ];

        return view('admin/projects/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Proyek',
            'page_title' => 'Tambah Proyek Baru',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/projects/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Judul Proyek'
            ],
            'category' => [
                'rules' => 'required',
                'label' => 'Kategori'
            ],
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'label' => 'Gambar Proyek'
            ]
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('image');
        $fileName = $file->getRandomName();
        $file->move('uploads/projects', $fileName);

        $this->projectModel->save([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'client_name' => $this->request->getPost('client_name'),
            'image' => $fileName,
            'completed_date' => $this->request->getPost('completed_date') ?: null
        ]);

        return redirect()->to(site_url('admin/projects'))->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $project = $this->projectModel->find($id);
        if (!$project) return redirect()->to(site_url('admin/projects'));

        $data = [
            'title' => 'Edit Proyek',
            'page_title' => 'Edit Proyek',
            'project' => $project,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/projects/edit', $data);
    }

    public function update($id)
    {
        $project = $this->projectModel->find($id);
        if (!$project) return redirect()->to(site_url('admin/projects'));

        $rules = [
            'title' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Judul Proyek'
            ],
            'category' => [
                'rules' => 'required',
                'label' => 'Kategori'
            ],
        ];

        if ($this->request->getFile('image')->isValid()) {
             $rules['image'] = [
                'rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'label' => 'Gambar Proyek'
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id' => $id,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'client_name' => $this->request->getPost('client_name'),
            'completed_date' => $this->request->getPost('completed_date') ?: null
        ];

        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            // Hapus gambar lama
            if (!empty($project['image']) && file_exists('uploads/projects/' . $project['image'])) {
                unlink('uploads/projects/' . $project['image']);
            }

            $fileName = $file->getRandomName();
            $file->move('uploads/projects', $fileName);
            $data['image'] = $fileName;
        }

        $this->projectModel->save($data);
        return redirect()->to(site_url('admin/projects'))->with('success', 'Proyek berhasil diperbarui.');
    }

    public function delete($id)
    {
        $project = $this->projectModel->find($id);
        if ($project) {
            if (!empty($project['image']) && file_exists('uploads/projects/' . $project['image'])) {
                unlink('uploads/projects/' . $project['image']);
            }
            $this->projectModel->delete($id);
            return redirect()->to(site_url('admin/projects'))->with('success', 'Proyek berhasil dihapus.');
        }
        return redirect()->to(site_url('admin/projects'))->with('error', 'Gagal menghapus proyek.');
    }
}