<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name, // Random name
            'email' => $this->faker->unique()->safeEmail, // Unique email
            'phone' => $this->faker->unique()->phoneNumber, // Unique phone number
            'address' => $this->faker->address, // Random address
            'password' => Hash::make('1234'),
            'dob' => $this->faker->date, // Random date of birth
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']), // Random gender
            'university' => $this->faker->company, // Random university name
            'year' => $this->faker->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year', 'Final Year']), // Random year of study
            'specialization' => $this->faker->randomElement(['Cardiology', 'Neurology', 'Orthopedics', 'Pediatrics', 'Surgery']), // Random specialization
            'medical_history' => $this->faker->text(200), // Random medical history
            'additional_info' => $this->faker->text(150), // Random additional info
            'bio' => $this->faker->paragraph, // Random bio
        ];
    }
}
