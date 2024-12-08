<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name, // Generate a fake name
            'email' => $this->faker->unique()->safeEmail, // Generate a unique email
            'phone' => $this->faker->unique()->phoneNumber, // Generate a unique phone number
            'password' => Hash::make('123456'), // Encrypt and store the password "1234"j
            'image' => $this->faker->imageUrl(),
            'address' => $this->faker->address, // Generate a fake address
            'dob' => $this->faker->date('Y-m-d', '2000-01-01'), // Generate a date before 2000-01-01
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']), // Pick a random gender
            'medical_history' => $this->faker->sentence(10), // Generate a short medical history
        ];
    }
}
