<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\RoleModel;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Admin',
                'description' => '',
            ],
            [
                'title' => 'Customer',
                'description' => '',
            ],
        ];

        // Load the model
        $rolemodel = new RoleModel();

        // Loop through the data and insert each set
        foreach ($data as $roleData) {
            $rolemodel->insert($roleData);
        }
    }
}
