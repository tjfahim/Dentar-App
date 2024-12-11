<?php

namespace Database\Factories;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'prescription_id' => 1, // Assuming a related Prescription is created
            'name' => $this->faker->word, // Generate a random word for the medicine name
            'dose' => json_encode([1, 0, 1]), // Random array with values [1, 0, 2]
            'meal' => $this->faker->randomElement(['before', 'after']), // Randomly pick 'before' or 'after'
            'duration' => $this->faker->numberBetween(1, 30), // Random number between 1 and 30
        ];
    }
}
