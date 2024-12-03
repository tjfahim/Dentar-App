<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle, // Using Faker to generate a job title
            'description' => $this->faker->paragraph, // Random job description
            'image' => $this->faker->imageUrl(640, 480, 'business'), // Random image URL
            'company_name' => $this->faker->company, // Random company name
            'job_deadline' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'), // Random deadline within a year
            'source_url' => $this->faker->url, // Random URL
            'status' => $this->faker->randomElement(['active', 'inactive']), // Random active or inactive status
        ];
    }
}
