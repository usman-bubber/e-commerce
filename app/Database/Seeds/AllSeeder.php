<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call('RoleSeeder');
        $this->call('UserSeeder');
        $this->call('CategorySeeder');
        $this->call('OrderStatusSeeder');
        $this->call('PaymentStatusSeeder');
        $this->call('PaymentMethodSeeder');
        $this->call('FaqSeeder');
        $this->call('TestimonialsSeeder');
        $this->call('SiteSettingsSeeder');
    }
}
