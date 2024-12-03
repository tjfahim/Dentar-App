<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\File;


use App\Models\Book;
use App\Models\Slider;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     SettingSeeder::class,
        //     UserSeeder::class,
        // ]);


        // Slider::factory(5)->create();
        // Book::factory(5)->create();


        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            // Generate a random PDF file and save it in the storage directory
            $pdfPath = 'pdfs/' . $faker->word . '.pdf';
            $fakePdfContent = "Fake PDF content for book {$faker->word}."; // Content for the PDF
            File::put(public_path($pdfPath), $fakePdfContent); // Save the fake content to the file

            // Create the book entry in the database
            Book::create([
                'pdf' => $pdfPath, // Store the relative path to the generated PDF
            ]);
        }
    }
}
