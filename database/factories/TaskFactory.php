<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Employee;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Retrieve all existing employee ids
        $employeeIds = Employee::pluck('employee_id');

        // Ensure at least one employee id exists
        if ($employeeIds->isEmpty()) {
            throw new \Exception('No employee ids found');
        }

        // Randomly select one employee id
        $employeeId = $this->faker->randomElement($employeeIds);

        // Retrieve all existing customer ids
        $customerIds = Customer::pluck('customer_id');

        // Ensure at least one customer id exists
        if ($customerIds->isEmpty()) {
            throw new \Exception('No customer ids found');
        }

        // Randomly select one customer id
        $customerId = $this->faker->randomElement($customerIds);

        return [
            'uuid' => $this->faker->uuid(),
            'customer_id' => $customerId,
            'employee_id' => $employeeId,
            'task_description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['Pending', 'In Progress', 'Completed']),
        ];
    }
}


