<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactModel;

class Kontak extends BaseController
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pesan Masuk',
            'page_title' => 'Inbox / Pesan Masuk',
            'contacts' => $this->contactModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/kontak/index', $data);
    }

    public function detail($id)
    {
        $contact = $this->contactModel->find($id);

        if (!$contact) {
            return redirect()->to(site_url('admin/kontak'))->with('error', 'Pesan tidak ditemukan.');
        }

        // Tandai sebagai dibaca
        if ($contact['status'] == 'unread') {
            $this->contactModel->update($id, ['status' => 'read']);
        }

        $data = [
            'title' => 'Detail Pesan',
            'page_title' => 'Detail Pesan',
            'contact' => $contact
        ];
        return view('admin/kontak/detail', $data);
    }

    public function delete($id)
    {
        $this->contactModel->delete($id);
        return redirect()->to(site_url('admin/kontak'))->with('success', 'Pesan berhasil dihapus.');
    }
}
