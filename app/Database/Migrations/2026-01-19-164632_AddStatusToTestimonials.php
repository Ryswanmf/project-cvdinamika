<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToTestimonials extends Migration
{
    public function up()
    {
        $fields = [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default'    => 'approved', // Existing ones default to approved
                'after'      => 'rating'
            ],
        ];
        $this->forge->addColumn('testimonials', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('testimonials', 'status');
    }
}