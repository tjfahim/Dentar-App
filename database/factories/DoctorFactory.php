<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(), // Fake doctor's name
            'email' => $this->faker->unique()->safeEmail(), // Unique email address
            'phone' => $this->faker->unique()->phoneNumber(), // Unique phone number
            'password' => bcrypt('password'), // Default password (hashed)
            'specialization' => $this->faker->word(), // Fake specialization (e.g., "Cardiology")
            'hospital' => $this->faker->company(), // Fake hospital/clinic name
            'gender' => $this->faker->randomElement(['Male', 'Female']), // Random gender
            'biography' => $this->faker->paragraph(), // Fake biography
            'dob' => $this->faker->date(), // Fake date of birth
            'degree' => $this->faker->word(), // Fake degree
            'image' => $this->faker->imageUrl(640, 480, 'people'), // Fake image URL
            'signature' => $this->faker->imageUrl(640, 480, 'business'), // Fake signature image URL
            'role' => $this->faker->randomElement(['normal', 'admin']), // Random role
            'address' => $this->faker->address(), // Fake address
        ];
    }
}
