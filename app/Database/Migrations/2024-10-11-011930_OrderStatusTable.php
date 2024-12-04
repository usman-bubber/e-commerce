<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderStatusTable extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'color_hex_code' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'created_at TIMESTAMP DEFAULT NOW() NOT NULL',
            'updated_at TIMESTAMP DEFAULT NOW() NOT NULL',
            'deleted_at TIMESTAMP DEFAULT NULL',
            // 'created_by TIMESTAMP DEFAULT NOW() NOT NULL',
            // 'updated_by TIMESTAMP DEFAULT NOW() NOT NULL',
            // 'deleted_by TIMESTAMP DEFAULT NULL',

            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'deleted_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('created_by', 'users', 'id', 'RESTRICT', 'RESTRICT', 'fk_users_id_order_status_createdby');
        $this->forge->addForeignKey('updated_by', 'users', 'id', 'RESTRICT', 'RESTRICT', 'fk_users_id_order_status_updatedby');
        $this->forge->addForeignKey('deleted_by', 'users', 'id', 'RESTRICT', 'RESTRICT', 'fk_users_id_order_status_deletedby');
        $this->forge->createTable('order_status');
    }

    public function down()
    {
        $this->forge->dropTable('order_status');
    }
}
