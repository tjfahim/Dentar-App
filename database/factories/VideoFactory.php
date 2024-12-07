<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5), // Random title with 5 words
            'description' => $this->faker->paragraph(2), // Random paragraph for description
            'url' => 'https://www.youtube.com/watch?v=qd6nEVuy_mo', // Random URL
            'image_poster' => $this->faker->imageUrl(640, 480, 'video poster'),
            'status' => $this->faker->boolean(), // Random true/false for status
        ];
    }
}
