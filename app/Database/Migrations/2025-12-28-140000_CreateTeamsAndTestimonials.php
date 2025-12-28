<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTeamsAndTestimonials extends Migration
{
    public function up()
    {
        // Tabel Teams
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'position' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'social_fb' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'social_twitter' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'social_instagram' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'social_linkedin' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('teams');

        // Tabel Testimonials
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'position' => [ // ex: CEO of Google, or just "Customer"
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'message' => [
                'type' => 'TEXT',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'rating' => [
                'type'       => 'INT',
                'constraint' => 1,
                'default'    => 5
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('testimonials');
    }

    public function down()
    {
        $this->forge->dropTable('teams');
        $this->forge->dropTable('testimonials');
    }
}
