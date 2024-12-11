<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrescriptionAssistReplay>
 */
class PrescriptionAssistReplayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(5),
            'files_url' =>  json_encode(['ab', 'bd']),
            'doctor_id' => 1,
            'prescription_assist_id' => 1
        ];
    }
}
