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
        $faker = Faker::create();

        // Create the 'pdfs' directory if it doesn't exist
        if (!File::exists(public_path('pdfs'))) {
            File::makeDirectory(public_path('pdfs'), 0755, true);
        }

        // Create 10 fake books
        for ($i = 0; $i < 10; $i++) {
            // Generate a random PDF file and save it in the storage directory
            $pdfFileName = $faker->word . '.pdf';
            $pdfPath = 'pdfs/' . 'dummy.pdf'; // Relative path
            $pdfFullPath = public_path($pdfPath); // Full path to save the PDF
            $fakePdfContent = "Fake PDF content for book " . $faker->word . ".";

            // Save the fake PDF file
            File::put($pdfFullPath, $fakePdfContent);

            // Create the book entry in the database
            Book::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(3),
                'image' => $faker->imageUrl(640, 480, 'books', true),
                'pdf' => 'pdfs/dummy.pdf', // Store the relative path in the database
                'book_type' => $faker->randomElement(['book', 'pdf']),
                'status' => $faker->randomElement(['active', 'inactive']),
            ]);
        }
    }
}
