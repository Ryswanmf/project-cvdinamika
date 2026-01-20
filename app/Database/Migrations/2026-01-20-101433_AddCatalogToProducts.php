<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCatalogToProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'file_catalog' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'image'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('products', 'file_catalog');
    }
}