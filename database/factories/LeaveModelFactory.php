<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => 1,
            'days' => random_int(3, 70),
            'approved' => null,
            'approved_by' => null,
        ];
    }
}
