<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiteSettingModel;

class TentangKami extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SiteSettingModel();
    }

    public function index()
    {
        // Ambil semua setting dan ubah jadi array key => value
        $settingsData = $this->settingModel->findAll();
        $settings = [];
        foreach ($settingsData as $row) {
            $settings[$row['key_name']] = $row['value'];
        }

        $data = [
            'title' => 'Edit Tentang Kami',
            'page_title' => 'Manajemen Halaman Tentang Kami',
            'settings' => $settings,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/tentang-kami/index', $data);
    }

    public function update()
    {
        // Daftar field yang bisa diedit
        $fields = ['about_history', 'about_vision', 'about_mission'];
        
        foreach ($fields as $field) {
            $this->saveSetting($field, $this->request->getPost($field));
        }

        // Handle Image Uploads (Image 1 & Image 2)
        $this->handleImageUpload('about_image_1');
        $this->handleImageUpload('about_image_2');

        // Clear cache agar perubahan langsung muncul di frontend
        cache()->delete('site_settings');

        return redirect()->to(site_url('admin/tentang-kami'))->with('success', 'Halaman Tentang Kami berhasil diperbarui.');
    }

    private function saveSetting($key, $value)
    {
        $existing = $this->settingModel->where('key_name', $key)->first();
        if ($existing) {
            $this->settingModel->update($existing['id'], ['value' => $value]);
        } else {
            $this->settingModel->insert(['key_name' => $key, 'value' => $value]);
        }
    }

    private function handleImageUpload($fieldName)
    {
        $file = $this->request->getFile($fieldName);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/about', $newName);

            // Hapus gambar lama jika ada
            $existing = $this->settingModel->where('key_name', $fieldName)->first();
            if ($existing && !empty($existing['value']) && file_exists('uploads/about/' . $existing['value'])) {
                unlink('uploads/about/' . $existing['value']);
            }

            $this->saveSetting($fieldName, $newName);
        }
    }
}
