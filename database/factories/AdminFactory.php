<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('password'), // You may use any password hashing method here
            'email' => $this->faker->unique()->safeEmail,
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
        ];
    }
}
