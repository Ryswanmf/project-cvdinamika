<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Produk extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Produk',
            'products' => $this->productModel->orderBy('id', 'DESC')->findAll(),
            'page_title' => 'Manajemen Produk'
        ];
        return view('admin/produk/index', $data);
    }

    public function detail($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            return redirect()->to(site_url('admin/produk'))->with('error', 'Produk tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Produk',
            'page_title' => 'Detail Produk',
            'product' => $product
        ];
        return view('admin/produk/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Produk',
            'page_title' => 'Tambah Produk Baru',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/produk/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Nama Produk'
            ],
            'category' => [
                'rules' => 'required',
                'label' => 'Kategori'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'label' => 'Gambar'
            ]
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $fileImage = $this->request->getFile('image');
        $imageName = $fileImage->getRandomName();
        $fileImage->move('uploads/products', $imageName);

        $this->productModel->save([
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'details' => $this->request->getPost('details'),
            'price' => $this->request->getPost('price'),
            'image' => $imageName
        ]);

        return redirect()->to(site_url('admin/produk'))->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            return redirect()->to(site_url('admin/produk'))->with('error', 'Produk tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Produk',
            'page_title' => 'Edit Produk',
            'product' => $product,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/produk/edit', $data);
    }

    public function update($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            return redirect()->to(site_url('admin/produk'))->with('error', 'Produk tidak ditemukan.');
        }

        $rules = [
            'name' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Nama Produk'
            ],
            'category' => [
                'rules' => 'required',
                'label' => 'Kategori'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
        ];

        // Validasi gambar hanya jika ada file yang diupload
        if ($this->request->getFile('image')->isValid()) {
            $rules['image'] = [
                'rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'label' => 'Gambar'
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'details' => $this->request->getPost('details'),
            'price' => $this->request->getPost('price'),
        ];

        $fileImage = $this->request->getFile('image');
        if ($fileImage->isValid() && !$fileImage->hasMoved()) {
            // Hapus gambar lama jika ada
            if ($product['image'] && file_exists('uploads/products/' . $product['image'])) {
                unlink('uploads/products/' . $product['image']);
            }
            
            $imageName = $fileImage->getRandomName();
            $fileImage->move('uploads/products', $imageName);
            $data['image'] = $imageName;
        }

        $this->productModel->save($data);

        return redirect()->to(site_url('admin/produk'))->with('success', 'Produk berhasil diperbarui.');
    }

    public function delete($id)
    {
        $product = $this->productModel->find($id);
        if ($product) {
            if ($product['image'] && file_exists('uploads/products/' . $product['image'])) {
                unlink('uploads/products/' . $product['image']);
            }
            $this->productModel->delete($id);
            return redirect()->to(site_url('admin/produk'))->with('success', 'Produk berhasil dihapus.');
        }
        return redirect()->to(site_url('admin/produk'))->with('error', 'Gagal menghapus produk.');
    }
}
