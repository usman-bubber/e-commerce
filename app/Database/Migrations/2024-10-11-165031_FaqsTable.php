<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FaqsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'question'    => ['type' => 'TEXT'],
            'answer'      => ['type' => 'TEXT'],
            'category'    => ['type' => 'VARCHAR', 'constraint' => '255'],
            'order_by'    => ['type' => 'INT'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('faqs');
    }
    
    public function down()
    {
        $this->forge->dropTable('faqs');
    }
}
