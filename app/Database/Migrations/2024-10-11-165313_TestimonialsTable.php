<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TestimonialsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id'      => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'username'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'comment'      => [
                'type'           => 'TEXT',
            ],
            'image'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,
            ],
            'approved'     => [
                'type'           => 'TINYINT',
                'constraint'     => 1,
                'default'        => 0,
            ],
            'trip_name'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => true,
            ],
            'country_id'   => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'created_at'   => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at'   => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('testimonials');
    }
    
    public function down()
    {
        $this->forge->dropTable('testimonials');
    }
}    
