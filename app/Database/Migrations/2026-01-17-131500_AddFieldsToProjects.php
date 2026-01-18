<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToProjects extends Migration
{
    public function up()
    {
        $fields = [
            'product_details' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'description'
            ],
            'badge_text' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
                'after' => 'product_details'
            ],
        ];
        
        $this->forge->addColumn('projects', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('projects', ['product_details', 'badge_text']);
    }
}
