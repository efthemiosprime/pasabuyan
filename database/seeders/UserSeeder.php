<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Bong Suyat',
            'email' => 'bongbox@gmail.com',
            'phone_number' => '917-544-3800',
            'about' => 'This is a test user.',
            'profile_picture' => 'https://randomuser.me/api/portraits/men/1.jpg',
            'id_verified' => true,
            'rating' => 4.5,
        ]);

        // Create additional random users (optional)
        User::factory(5)->create();
    }


}