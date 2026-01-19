<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaqModel;

class Faq extends BaseController
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new FaqModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen FAQ',
            'page_title' => 'Tanya Jawab (FAQ)',
            'faqs' => $this->faqModel->orderBy('sort_order', 'ASC')->findAll()
        ];
        return view('admin/faq/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah FAQ',
            'page_title' => 'Tambah FAQ Baru',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/faq/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'question' => 'required|min_length[5]',
            'answer' => 'required',
            'sort_order' => 'numeric'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->faqModel->save([
            'question' => $this->request->getPost('question'),
            'answer' => $this->request->getPost('answer'),
            'sort_order' => $this->request->getPost('sort_order') ?: 0
        ]);

        return redirect()->to(site_url('admin/faq'))->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $faq = $this->faqModel->find($id);
        if (!$faq) return redirect()->to(site_url('admin/faq'));

        $data = [
            'title' => 'Edit FAQ',
            'page_title' => 'Edit FAQ',
            'faq' => $faq,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/faq/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'question' => 'required|min_length[5]',
            'answer' => 'required',
            'sort_order' => 'numeric'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->faqModel->save([
            'id' => $id,
            'question' => $this->request->getPost('question'),
            'answer' => $this->request->getPost('answer'),
            'sort_order' => $this->request->getPost('sort_order')
        ]);

        return redirect()->to(site_url('admin/faq'))->with('success', 'FAQ berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->faqModel->delete($id);
        return redirect()->to(site_url('admin/faq'))->with('success', 'FAQ berhasil dihapus.');
    }
}
