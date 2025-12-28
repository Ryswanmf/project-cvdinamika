<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiteSettingModel;

class Settings extends BaseController
{
    public function index()
    {
        $model = new SiteSettingModel();
        $settings = $model->findAll();

        $data = [
            'title' => 'Pengaturan Situs',
            'page_title' => 'Pengaturan Situs',
            'settings' => []
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

        return redirect()->to('/admin/settings')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
