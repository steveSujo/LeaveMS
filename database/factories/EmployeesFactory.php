<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'Line_Manager' => "Richard Wilson",
            'Team' => $this->faker->randomElement(['Design', 'IOS', 'Android', 'Testing', 'PHP', 'Business']),
            'office' => 'Focus Technologies',
            'Permissions' => 'Employee',
        ];
    }
}
