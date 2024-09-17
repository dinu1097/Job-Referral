<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ReferrerProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Loop through referrer IDs 11 to 20 and randomly assign them to companies 1 to 20
        for ($referrer_id = 11; $referrer_id <= 20; $referrer_id++) {
            DB::table('referrer_profiles')->insert([
                'name' => 'Referrer ' . $referrer_id,
                'email' => 'referrer' . $referrer_id . '@example.com',
                'position' => 'Position ' . $referrer_id,
                'user_id' => $referrer_id,
                'company_id' => rand(1, 20), // Random company ID between 1 and 20
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
