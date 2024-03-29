<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
         \App\Models\Admin::factory(3)->create();
         \App\Models\Employee::factory(5)->create();
            \App\Models\Customer::factory(5)->create();
           \App\Models\Task::factory(4)->create();
    }
}
