<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\File;


use App\Models\Book;
use App\Models\Doctor;
use App\Models\Slider;
use App\Models\Job;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SettingSeeder::class,
            UserSeeder::class,
            BookSeeder::class,
            PatientSeeder::class,
            StudentSeeder::class,
            DoctorSeeder::class,
            DoctorSpecialtySeeder::class,
            PatientProblemSeeder::class,
            NotificationSeeder::class,
            PrivacyPolicySeeder::class,
            FeedbackSeeder::class,
            ContactSeeder::class,
            VideoSeeder::class
        ]);







        Slider::factory(5)->create();
        Job::factory(10)->create();

    }
}
