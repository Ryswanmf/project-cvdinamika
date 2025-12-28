<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $keys = ['site_title', 'site_description', 'contact_email', 'contact_phone', 'contact_address'];

        // Delete existing settings to avoid duplicates
        $this->db->table('site_settings')->whereIn('key_name', $keys)->delete();

        $data = [
            [
                'key_name' => 'site_title',
                'value'    => 'CV Dinamika',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_name' => 'site_description',
                'value'    => 'Solusi Terbaik untuk Kebutuhan Anda',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_name' => 'contact_email',
                'value'    => 'info@dinamika.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_name' => 'contact_phone',
                'value'    => '+62 812 3456 7890',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'key_name' => 'contact_address',
                'value'    => 'Jl. Contoh No. 123, Jakarta, Indonesia',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('site_settings')->insertBatch($data);
    }
}
