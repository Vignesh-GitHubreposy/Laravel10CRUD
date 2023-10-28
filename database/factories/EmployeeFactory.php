<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'emp_name'=> fake()->name(),
            'emp_email'=> fake()->unique()->safeEmail(),
            'emp_phno'=> fake()->phoneNumber(),
            'emp_dob'=> fake()->date(),
            'emp_address'=> fake()->address(),
            'emp_designation'=> fake()->jobTitle(),
            'emp_doj'=> fake()->date(),
            'emp_photo'=>fake()->imageUrl(350, 350, 'humans', true),
        ];
    }
}
