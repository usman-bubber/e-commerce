<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductReviewsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_id' => 1,
                'name'       => 'John Doe',
                'rating'     => 5,
                'message'    => 'Excellent product! Highly recommend.',
                'images'     => json_encode(['uploads/reviews/image1.jpg', 'uploads/reviews/image2.jpg']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 1,
                'name'       => 'Jane Smith',
                'rating'     => 4,
                'message'    => 'Good quality, but a bit expensive.',
                'images'     => json_encode(['uploads/reviews/image3.jpg']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 2,
                'name'       => 'Mark Taylor',
                'rating'     => 3,
                'message'    => 'Average experience. Could be better.',
                'images'     => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 2,
                'name'       => 'Emma Brown',
                'rating'     => 5,
                'message'    => 'Fantastic product! Will buy again.',
                'images'     => json_encode(['uploads/reviews/image4.jpg']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data into the product_reviews table
        $this->db->table('product_reviews')->insertBatch($data);
    }
}
