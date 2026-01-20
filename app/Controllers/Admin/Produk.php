<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductImageModel;

class Produk extends BaseController
{
    protected $productModel;
    protected $productImageModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productImageModel = new ProductImageModel();
        helper('image');
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
                'rules' => 'uploaded[image]|max_size[image,5120]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'label' => 'Gambar'
            ],
            'file_catalog' => [
                'rules' => 'max_size[file_catalog,5120]|mime_in[file_catalog,application/pdf]',
                'label' => 'Katalog PDF'
            ]
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $fileImage = $this->request->getFile('image');
        $imageName = $fileImage->getRandomName();
        
        // Use helper function to compress image
        upload_and_compress($fileImage, 'uploads/products', $imageName, 80, 1000);

        // Handle Catalog PDF
        $catalogName = null;
        $fileCatalog = $this->request->getFile('file_catalog');
        if ($fileCatalog && $fileCatalog->isValid() && !$fileCatalog->hasMoved()) {
            $catalogName = $fileCatalog->getRandomName();
            $fileCatalog->move('uploads/products/catalogs', $catalogName);
        }

        $this->productModel->save([
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'details' => $this->request->getPost('details'),
            'price' => $this->request->getPost('price'),
            'image' => $imageName,
            'file_catalog' => $catalogName
        ]);

        return redirect()->to(site_url('admin/produk'))->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            return redirect()->to(site_url('admin/produk'))->with('error', 'Produk tidak ditemukan.');
        }

        // Get gallery images
        $gallery = $this->productImageModel->where('product_id', $id)->findAll();

        $data = [
            'title' => 'Edit Produk',
            'page_title' => 'Edit Produk',
            'product' => $product,
            'gallery' => $gallery,
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
                'rules' => 'uploaded[image]|max_size[image,5120]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'label' => 'Gambar'
            ];
        }

        // Validasi katalog pdf
        if ($this->request->getFile('file_catalog')->isValid()) {
            $rules['file_catalog'] = [
                'rules' => 'uploaded[file_catalog]|max_size[file_catalog,5120]|mime_in[file_catalog,application/pdf]',
                'label' => 'Katalog PDF'
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

        // Handle Image
        $fileImage = $this->request->getFile('image');
        if ($fileImage->isValid() && !$fileImage->hasMoved()) {
            if ($product['image'] && file_exists('uploads/products/' . $product['image'])) {
                unlink('uploads/products/' . $product['image']);
            }
            $imageName = $fileImage->getRandomName();
            upload_and_compress($fileImage, 'uploads/products', $imageName, 80, 1000);
            $data['image'] = $imageName;
        }

        // Handle Catalog PDF
        $fileCatalog = $this->request->getFile('file_catalog');
        if ($fileCatalog->isValid() && !$fileCatalog->hasMoved()) {
            // Hapus katalog lama
            if (!empty($product['file_catalog']) && file_exists('uploads/products/catalogs/' . $product['file_catalog'])) {
                unlink('uploads/products/catalogs/' . $product['file_catalog']);
            }
            $catalogName = $fileCatalog->getRandomName();
            $fileCatalog->move('uploads/products/catalogs', $catalogName);
            $data['file_catalog'] = $catalogName;
        }

        $this->productModel->save($data);

        // Handle Gallery Uploads
        if ($imagefile = $this->request->getFiles()) {
            if (isset($imagefile['gallery'])) {
                foreach ($imagefile['gallery'] as $img) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        $newName = $img->getRandomName();
                        // Upload ke folder gallery
                        // Buat folder dulu jika belum ada, tapi upload_and_compress biasanya butuh path yang valid
                        // Asumsi folder uploads/products/gallery sudah dibuat manual atau otomatis oleh script
                        if (!is_dir('uploads/products/gallery')) {
                            mkdir('uploads/products/gallery', 0777, true);
                        }
                        
                        upload_and_compress($img, 'uploads/products/gallery', $newName, 70, 800);
                        
                        $this->productImageModel->insert([
                            'product_id' => $id,
                            'image' => $newName,
                            'title' => '' 
                        ]);
                    }
                }
            }
        }

        return redirect()->to(site_url('admin/produk/edit/'.$id))->with('success', 'Produk dan Galeri berhasil diperbarui.');
    }

    public function delete($id)
    {
        $product = $this->productModel->find($id);
        if ($product) {
            if ($product['image'] && file_exists('uploads/products/' . $product['image'])) {
                unlink('uploads/products/' . $product['image']);
            }
            if (!empty($product['file_catalog']) && file_exists('uploads/products/catalogs/' . $product['file_catalog'])) {
                unlink('uploads/products/catalogs/' . $product['file_catalog']);
            }
            
            // Hapus gallery images
            $gallery = $this->productImageModel->where('product_id', $id)->findAll();
            foreach ($gallery as $img) {
                if (file_exists('uploads/products/gallery/' . $img['image'])) {
                    unlink('uploads/products/gallery/' . $img['image']);
                }
            }
            
            $this->productModel->delete($id);
            return redirect()->to(site_url('admin/produk'))->with('success', 'Produk berhasil dihapus.');
        }
        return redirect()->to(site_url('admin/produk'))->with('error', 'Gagal menghapus produk.');
    }

    public function delete_image($id)
    {
        $img = $this->productImageModel->find($id);
        if ($img) {
            if (file_exists('uploads/products/gallery/' . $img['image'])) {
                unlink('uploads/products/gallery/' . $img['image']);
            }
            $this->productImageModel->delete($id);
            return redirect()->back()->with('success', 'Gambar varian dihapus.');
        }
        return redirect()->back()->with('error', 'Gambar tidak ditemukan.');
    }
}