<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Randomly assign a user type (student or doctor)
        $userType = $this->faker->randomElement(['student', 'doctor']);

        // Get a random user ID from the respective table
        $userId = $userType === 'student'
            ? Student::inRandomOrder()->first()->id
            : Doctor::inRandomOrder()->first()->id;

        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
           
            'file' => json_encode([
                'https://placehold.co/400x600', // Fake image URL
                'https://placehold.co/800x600', // Another fake image URL
            ]),
            'user_id' => $userId,
            'user_type' => ucfirst($userType), // Match model names
        ];
    }
}
