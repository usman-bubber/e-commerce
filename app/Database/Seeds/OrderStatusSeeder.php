<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    public function run()
    {
        // Delete previous records
        $this->db->table('order_status')->truncate();
        $data = [
            [
                'title' => 'Pending',
                'description' => 'New Order Placed',
                'color_hex_code' => '#F44E14',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Completed',
                'description' => 'Order has been Completed',
                'color_hex_code' => '#16AB84',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Cancelled',
                'description' => 'Order has been Cancelled',
                'color_hex_code' => '#16AB85',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Verified - Awaiting Payment',
                'description' => 'Order is verfied but payment pending',
                'color_hex_code' => '#87817FFB',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Payment Received',
                'description' => 'Order Placed and recived payment',
                'color_hex_code' => '#2047f443',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Confirmed',
                'description' => 'Order has been Confirmed',
                'color_hex_code' => '#16AB83',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Scheduled for Pickup',
                'description' => 'Order has been Completed and scheduled for pickup',
                'color_hex_code' => '#16AB83',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'In Progress',
                'description' => 'Order is in progress',
                'color_hex_code' => '#16AB83',
                'updated_by' => '1',
                'created_by' => '1',
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at'  =>     date('Y-m-d H:i:s'),
            ],

        ];
        $this->db->table('order_status')->insertBatch($data);
    }
}
