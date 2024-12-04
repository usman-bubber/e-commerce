<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NewsLettersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'TEXT',
            ],
            'created_at TIMESTAMP DEFAULT NOW() NOT NULL',
            'updated_at TIMESTAMP DEFAULT NOW() NOT NULL',
            'deleted_at TIMESTAMP DEFAULT NULL',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('newsletter_subscribed');
    }

    public function down()
    {
        $this->forge->dropTable('newsletter_subscribed');
    }
}
