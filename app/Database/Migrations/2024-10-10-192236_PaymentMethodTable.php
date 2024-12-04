<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentMethodTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'default'    => 'active',
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'deleted_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'created_at TIMESTAMP DEFAULT NOW() NOT NULL',
            'updated_at TIMESTAMP DEFAULT NOW() NOT NULL',
            'deleted_at TIMESTAMP DEFAULT NULL',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');
        $this->forge->addForeignKey('deleted_by', 'users', 'id');
        $this->forge->createTable('payment_method');
    }

    public function down()
    {
        //
        $this->forge->dropTable('payment_method');
    }
}
