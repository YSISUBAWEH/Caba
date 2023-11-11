<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->username(),
            'password' => '$2y$10$.9JZpZvLyU4lEGIZ4gwQQuOCaYE0uQV7ZNbX6ahgSO10W5tU8aKyS', // 1
            'foto' => $this->faker->randomElement(['face1.jpg', 'face4.jpg', 'face7.jpg', 'face8.jpg', 'face13.jpg']),

            // tambahkan baris diawah ini
            'role_id' => mt_rand(1, 2),

            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
}
