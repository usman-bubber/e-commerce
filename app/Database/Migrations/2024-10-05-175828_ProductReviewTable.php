<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductReviewTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('product_reviews', true);
      
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'rating' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'review' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at TIMESTAMP DEFAULT NOW() NOT NULL',
            'updated_at TIMESTAMP DEFAULT NOW() NOT NULL',
            'deleted_at TIMESTAMP DEFAULT NULL',

        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('product_reviews');
    }

    public function down()
    {
        $this->forge->dropTable('product_reviews');
    }
}
