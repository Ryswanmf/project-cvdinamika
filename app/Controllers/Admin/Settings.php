<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiteSettingModel;
use App\Models\UserModel;

class Settings extends BaseController
{
    public function index()
    {
        $model = new SiteSettingModel();
        $settings = $model->findAll();

        // Get Current User Data
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        $data = [
            'title' => 'Pengaturan Situs',
            'page_title' => 'Pengaturan Situs',
            'settings' => [],
            'user_fullname' => $user['name'] ?? ''
        ];

        foreach ($settings as $s) {
            $data['settings'][$s['key_name']] = $s['value'];
        }

        return view('admin/settings/index', $data);
    }

    public function update()
    {
        $model = new SiteSettingModel();
        $postData = $this->request->getPost();

        foreach ($postData as $key => $value) {
            // Check if setting exists
            $existing = $model->where('key_name', $key)->first();
            
            if ($existing) {
                $model->update($existing['id'], ['value' => $value]);
            } else {
                // Optional: Create new setting if strictly defined keys are not enforced
                // $model->insert(['key_name' => $key, 'value' => $value]);
            }
        }

        // Clear cache so frontend gets fresh data immediately
        cache()->delete('site_settings');

        return redirect()->to('/admin/settings')->with('success', 'Profil Website berhasil diperbarui.');
    }

    public function update_account()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login');
        }

        $name = $this->request->getPost('name');
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        $dataToUpdate = [
            'name' => $name
        ];

        // Jika user ingin ganti password
        if (!empty($newPassword)) {
            // 1. Validasi Password Lama
            if (empty($currentPassword)) {
                return redirect()->back()->with('error', 'Masukkan password lama untuk mengubah password.');
            }

            if (!password_verify($currentPassword, $user['password'])) {
                return redirect()->back()->with('error', 'Password lama salah.');
            }

            // 2. Validasi Password Baru
            if (strlen($newPassword) < 6) {
                return redirect()->back()->with('error', 'Password baru minimal 6 karakter.');
            }

            if ($newPassword !== $confirmPassword) {
                return redirect()->back()->with('error', 'Konfirmasi password baru tidak cocok.');
            }

            // 3. Hash Password Baru
            $dataToUpdate['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $userModel->update($userId, $dataToUpdate);

        return redirect()->to('/admin/settings')->with('success', 'Akun berhasil diperbarui.');
    }
}
