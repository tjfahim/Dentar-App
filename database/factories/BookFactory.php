<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(3), // Random title with 3 words
            'description' => fake()->paragraph(3), // Random paragraph for description
            'image' => fake()->imageUrl(640, 480, 'books', true), // Random image URL (can be changed to a file path if desired)
            'book_type' => $this->faker->randomElement(['pdf', 'book']),
 // Random PDF URL (you can replace this with your file generation logic)
            'status' => fake()->randomElement(['active', 'inactive']), // Randomly assign active or inactive
        ];
    }
}
