<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Credit Card',
                'description' => 'Visa Card',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Cash on delivery',
                'description' => 'COD',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Bank Account',
                'description' => 'Bank Details',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('payment_method')->insertBatch($data);
    }
}
