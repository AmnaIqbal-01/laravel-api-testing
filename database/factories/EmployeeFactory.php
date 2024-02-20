<?php

namespace Database\Factories;
use App\Models\Employee;
use App\Models\Admin; 

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Retrieve all existing admin ids
    $adminIds = Admin::pluck('id');

    // Ensure at least one admin id exists
    if ($adminIds->isEmpty()) {
        throw new \Exception('No admin ids found');
    }

    // Randomly select one admin id
    $adminId = $this->faker->randomElement($adminIds);

    return [
        'uuid' => (string) \Illuminate\Support\Str::uuid(),
        'admin_id' => $adminId,
        'first_name' => $this->faker->firstName,
        'last_name' => $this->faker->lastName,
        'email' => $this->faker->unique()->safeEmail,
    ];
    }
}
