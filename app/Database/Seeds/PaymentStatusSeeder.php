<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Pending',
                'description' => 'Order is verfied but payment pending',
                'color_hex_code' => '#87817FFB',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Confirmed',
                'description' => 'Payment has been Confirmed',
                'color_hex_code' => '#16AB83',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Canceled',
                'description' => 'Payment has been Canceled',
                'color_hex_code' => '#16AB83',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('payment_status')->insertBatch($data);

    }
}
