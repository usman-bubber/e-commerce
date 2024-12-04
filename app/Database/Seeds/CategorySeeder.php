<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CategoryModel;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Women Purse',
                'cover_image' => 'purse.png',
                'created_by'=>1,
                'updated_by'=>1
            ],
            [
                'title' => 'Men T-Shirt',
                'cover_image' => 'shirt.png',
                'created_by'=>1,
                'updated_by'=>1
            ],
            [
                'title' => 'Watches',
                'cover_image' => 'watch.png',
                'created_by'=>1,
                'updated_by'=>1
            ],
            [
                'title' => 'Handfree',
                'cover_image' => 'handphone.png',
                'created_by'=>1,
                'updated_by'=>1
            ],
            [
                'title' => 'Boot',
                'cover_image' => 'boot.png',
                'created_by'=>1,
                'updated_by'=>1
            ],
        ];

        // Load the model
        $categorymodel = new CategoryModel();

        // Loop through the data and insert each set
        foreach ($data as $categoryData) {
            $categorymodel->insert($categoryData);
        }
    }
}
