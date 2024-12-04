<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'site_name' => 'Dubai Desert Safari',
                'site_short_name' => 'DDS',
                'site_url' => 'https://www.dubaisafaristour.com/',
                'site_email' => 'sales@abudhabicitytour.com',
                'info_email' => 'info@example.com',
                'phone_number' => '+(971 5) 43 33 04 96',
                'mobile_number' => '+(971 5) 43 33 04 96',
                'whatsapp_number' => '+(971 5) 43 33 04 96',
                'address' => 'Al Karama Bur Dubai, Sheikh Khalifa Bin Zayed St, Dubai, United Arab Emirates P.O Box. 6009',
                'facebook' => 'https://www.facebook.com/yourpage',
                'tiktok' => 'https://twitter.com/yourtwitter',
                'instagrame' => 'https://www.instagram.com/yourinstagram',
                'youtube' => 'https://www.youtube.com/yourchannel',
                'bank_name' => 'Your Bank Name',
                'bank_account_number' => '1234567890',
                'bank_account_name' => 'Account Name',
                'bank_account_description' => 'Account Description',
                'created_by' => 1,
                'updated_by' => 1,
                'deleted_by' => null
            ],
        ];

        $this->db->table('site_settings')->insertBatch($data);
    }
}