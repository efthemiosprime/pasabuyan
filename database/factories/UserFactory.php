<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Default password is 'password'
            'phone_number' => fake()->phoneNumber(),
            'about' => fake()->paragraph(),
            'profile_picture' => $this->getRandomUserProfilePicture($faker),
            'id_verified' => fake()->boolean(),
            'rating' => fake()->randomFloat(2, 1, 5), // Random rating between 1.00 and 5.00
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

            /**
     * Generate a random profile picture URL from RandomUser.me.
     *
     * @param \Faker\Generator $faker
     * @return string
     */
    private function getRandomUserProfilePicture($faker)
    {
        $genders = ['men', 'women'];
        $gender = $genders[array_rand($genders)]; // Randomly pick a gender
        $id = $faker->numberBetween(1, 99); // Random ID between 1 and 99

        return "https://randomuser.me/api/portraits/{$gender}/{$id}.jpg";
    }
}
