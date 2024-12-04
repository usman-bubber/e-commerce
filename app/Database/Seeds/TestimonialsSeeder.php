<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\TestimonialModel;
class TestimonialsSeeder extends Seeder
{
    public function run()
    {
           $data = [
            [
                'user_id'=> '12',
                'username'=> 'Samara',
                'comment' => 'This tour was indeed the highlight of our trip to Dubai! Enjoyed every minute of it!! We were picked up by our driver Sahib who welcomes us with a smile. He is such an excellent driver cum tour guide',
                'image' => 'chris-c.jpg',
                'approved' => '1',
                'trip_name' => 'Excellent service',
                'country_id' => '21',
            ],
            [
                'user_id'=> '19',
                'username'=> 'Imrana M',
                'comment' => 'Excellent tour, guides are knowledgeable however staying relevant is important for the guides, being over friendly doesnt help as tours might feel uneasy. Over all experience was super the company has experienced drivers and well maintained cars.',
                'image' => 'chris-c.jpg',
                'approved' => '1',
                'trip_name' => 'Day safari',
                'country_id' => '22',
            ],
            [
                'user_id'=> '19',
                'username'=> 'Doug B',
                'comment' => 'This tour has many features, with some being wonderful and others being very fine. We were picked up promptly as arranged at our hotel by Ali (our guide and driver) and he told us about some interesting features of Dubai on the way to the desert.',
                'image' => 'chris-c.jpg',
                'approved' => '1',
                'trip_name' => 'Very fine evening for a remarkable price',
                'country_id' => '22',
            ],
            [
                'user_id'=> '17',
                'username'=> 'Jhon Mchlain',
                'comment' => 'We had an awesome desert safari tour with my family. The adventure was filled with thrilling dune bashing, stunning desert landscapes, and a beautiful sunset. We enjoyed a delicious BBQ dinner under the stars.',
                'image' => 'chris-c.jpg',
                'approved' => '1',
                'trip_name' => 'Awesome Desert Safari',
                'country_id' => '22',
            ],
            [
                'user_id'=> '17',
                'username'=> 'Ilyas Iqbal',
                'comment' => 'Dubai tours were an absolute delight! From the towering Burj Khalifa to the traditional souks, every moment felt like a glimpse into a vibrant world of wonder.',
                'image' => 'chris-c.jpg',
                'approved' => '1',
                'trip_name' => 'Day at Burj Khalifa',
                'country_id' => '22',
            ],
            [
                'user_id'=> '21',
                'username'=> 'Faisal Malik',
                'comment' => 'Dubai tours exceeded all expectations! The futuristic skyline, the cultural richness, and the warmth of the people made it an unforgettable experience. Highly recommended!',
                'image' => 'chris-c.jpg',
                'approved' => '1',
                'trip_name' => 'Day trip to Desert Safari',
                'country_id' => '22',
            ],
            // Add more data as needed
        ];

        // Load the model
        $product_transfermodel = new TestimonialModel();

        // Loop through the data and insert each set
        foreach ($data as $transferData) {
            $product_transfermodel->insert($transferData);
        }
    }
}
