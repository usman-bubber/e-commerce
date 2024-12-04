<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role_id'=>'1',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=> password_hash('Admin123_', PASSWORD_DEFAULT),
                'phone_number'=>'03317344949',
                'status'=>'active',
            ],
            [
                'role_id'=>'2',
                'username'=>'customer',
                'email'=>'customer@gmail.com',
                'password'=> password_hash('Admin123_', PASSWORD_DEFAULT),
                'phone_number'=>'03317344949',
                'status'=>'active',
            ],
        ];

        // Load the model
        $usermodel = new UserModel();

        foreach ($data as $userData) {
            // Check if the email already exists
            if ($usermodel->where('email', $userData['email'])->first() === null) {
                // Insert only if the email doesn't exist
                $usermodel->insert($userData);
            } else {
                echo "Skipping duplicate entry for email: {$userData['email']}\n";
            }
        }
    }
}
