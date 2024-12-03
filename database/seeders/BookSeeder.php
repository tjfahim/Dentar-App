<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\File;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); // Create a Faker instance

        // Create 10 fake books
        for ($i = 0; $i < 10; $i++) {
            // Generate a random PDF file and save it in the storage directory
            $pdfPath = 'pdfs/' . $faker->word . '.pdf';
            $fakePdfContent = "Fake PDF content for book {$faker->word}."; // Content for the PDF
            File::put(public_path($pdfPath), $fakePdfContent); // Save the fake content to the file

            // Create the book entry in the database
            Book::create([
                'title' => $faker->sentence(3), // Random title with 3 words
                'description' => $faker->paragraph(3), // Random paragraph for description
                'image' => $faker->imageUrl(640, 480, 'books', true), // Random image URL
                'pdf' => $pdfPath, // Store the relative path to the generated PDF
                'status' => $faker->randomElement(['active', 'inactive']), // Randomly assign active or inactive
            ]);
        }
    }
}
