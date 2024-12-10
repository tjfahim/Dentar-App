<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diognostic>
 */
class DiognosticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(), // Generates a random name
            'age' => $this->faker->numberBetween(1, 100),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']), // Generates a random age between 1 and 100
            'number' => $this->faker->phoneNumber(), // Generates a random phone number
            'image' => $this->faker->imageUrl(640, 480, 'people', true, 'Patient'), // Generates a placeholder image URL
            'problem' => $this->faker->sentence(10), // Generates a random short description
        ];
    }
}
