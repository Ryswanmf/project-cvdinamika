<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'name'    => 'Administrator',
            'password' => password_hash('password', PASSWORD_DEFAULT),
        ];

        // Simple check to avoid duplicates if run multiple times
        $this->db->table('users')->where('username', 'admin')->delete();

        $this->db->table('users')->insert($data);
    }
}