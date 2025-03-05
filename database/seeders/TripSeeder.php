<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 10 trips using the TripFactory
        Trip::factory()->count(5)->create();

        // Optionally, you can create specific trips with custom data
        Trip::factory()->create([
            'origin_city' => 'New York',
            'destination_city' => 'Los Angeles',
            'transportation_mode' => 'bus',
            'status' => 'completed',
        ]);

        
    }
}
