<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name' => 'Amazon',
                'description' => 'A global e-commerce and cloud computing giant.',
                'logo' => 'logos/amazon.png'
            ],
            [
                'name' => 'Apple',
                'description' => 'A leader in technology, known for iPhone and Mac products.',
                'logo' => 'logos/apple.png'
            ],
            [
                'name' => 'Google',
                'description' => 'The leading search engine and tech company.',
                'logo' => 'logos/google.png'
            ],
            [
                'name' => 'Microsoft',
                'description' => 'A global leader in software, known for Windows OS.',
                'logo' => 'logos/microsoft.png'
            ],
            [
                'name' => 'Tesla',
                'description' => 'An innovative electric vehicle and energy company.',
                'logo' => 'logos/tesla.png'
            ],
            [
                'name' => 'Facebook',
                'description' => 'A social media giant, rebranded as Meta.',
                'logo' => 'logos/facebook.png'
            ],
            [
                'name' => 'Alibaba',
                'description' => 'A global e-commerce and retail company.',
                'logo' => 'logos/alibaba.png'
            ],
            [
                'name' => 'Samsung',
                'description' => 'A leader in electronics and consumer goods.',
                'logo' => 'logos/samsung.png'
            ],
            [
                'name' => 'Toyota',
                'description' => 'The largest automobile manufacturer in the world.',
                'logo' => 'logos/toyota.png'
            ],
            [
                'name' => 'Nike',
                'description' => 'The leading brand in sportswear and athletic shoes.',
                'logo' => 'logos/nike.png'
            ],
            [
                'name' => 'Coca-Cola',
                'description' => 'A global leader in beverages and soft drinks.',
                'logo' => 'logos/coca-cola.png'
            ],
            [
                'name' => 'PepsiCo',
                'description' => 'A global food and beverage leader.',
                'logo' => 'logos/pepsico.png'
            ],
            [
                'name' => 'Walmart',
                'description' => 'The largest retail corporation in the world.',
                'logo' => 'logos/walmart.png'
            ],
            [
                'name' => 'Intel',
                'description' => 'The world leader in semiconductor chip manufacturing.',
                'logo' => 'logos/intel.png'
            ],
            [
                'name' => 'BMW',
                'description' => 'A premium automobile manufacturer known for luxury vehicles.',
                'logo' => 'logos/bmw.png'
            ],
            [
                'name' => 'Sony',
                'description' => 'A leader in electronics, gaming, and entertainment.',
                'logo' => 'logos/sony.png'
            ],
            [
                'name' => 'IBM',
                'description' => 'An American multinational technology corporation.',
                'logo' => 'logos/ibm.png'
            ],
            [
                'name' => 'Disney',
                'description' => 'A leader in media, entertainment, and theme parks.',
                'logo' => 'logos/disney.png'
            ],
            [
                'name' => 'Visa',
                'description' => 'A global leader in payment technology and credit cards.',
                'logo' => 'logos/visa.png'
            ],
            [
                'name' => 'MasterCard',
                'description' => 'A global payment technology company.',
                'logo' => 'logos/mastercard.png'
            ]
        ]);
    }
}
