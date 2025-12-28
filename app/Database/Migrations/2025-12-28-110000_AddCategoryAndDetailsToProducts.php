<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoryAndDetailsToProducts extends Migration
{
    public function up()
    {
        $fields = [
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'after'      => 'name',
                'default'    => 'Uncategorized',
            ],
            'details' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'description',
            ],
        ];
        $this->forge->addColumn('products', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('products', ['category', 'details']);
    }
}
