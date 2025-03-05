<?php

namespace Database\Factories;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'origin_city' => $this->faker->city,
            'origin_country' => $this->faker->country,
            'destination_city' => $this->faker->city,
            'destination_country' => $this->faker->country,
            'departure_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'arrival_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'transportation_mode' => Arr::random(['car', 'bus', 'train', 'plane', 'boat', 'other']),
            'max_weight_kg' => $this->faker->randomFloat(2, 1, 100),
            'max_volume_l' => $this->faker->randomFloat(2, 1, 100),
            'notes' => $this->faker->sentence,
            'status' => Arr::random(['pending', 'in_progress', 'completed', 'canceled']),

            // needs to remove geographic point for now since it involves several steps, 
            // including setting up the database schema, creating a custom cast for the point type, 
            // and handling the data in your application.
            // 'origin_coordinates' => [
            //     'lat' => $this->faker->latitude,
            //     'lng' => $this->faker->longitude,
            // ],
            // 'destination_coordinates' => [
            //     'lat' => $this->faker->latitude,
            //     'lng' => $this->faker->longitude,
            // ],
        ];
    }
}
