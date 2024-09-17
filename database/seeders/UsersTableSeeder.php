<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 10 job seekers
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'Job Seeker ' . $i,
                'email' => 'jobseeker' . $i . '@example.com',
                'password' => Hash::make('password'), // Set a default password
                'role' => 'job_seeker',
                'profile_picture' => null,
                'phone_number' => '1234567890',
                'is_anonymous' => false,
                'email_verified_at' => now(),
                'remember_token' => \Str::random(10),
            ]);
        }

        // Create 10 referrers
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'Referrer ' . $i,
                'email' => 'referrer' . $i . '@example.com',
                'password' => Hash::make('password'), // Set a default password
                'role' => 'referrer',
                'profile_picture' => null,
                'phone_number' => '0987654321',
                'is_anonymous' => false,
                'email_verified_at' => now(),
                'remember_token' => \Str::random(10),
            ]);
        }
    }
}
