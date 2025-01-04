<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\File;

use App\Models\ChronicCare;
use App\Models\DiabeticGuide;
use App\Models\FemaleHealthGuide;
use App\Models\HeartGuide;
use App\Models\KidneyGuide;
use App\Models\MentelHelthGuide;
use App\Models\PregnantMotherGuide;
use App\Models\SkinGuide;
use App\Models\HepaticGuide;


use App\Models\Book;
use App\Models\Doctor;
use App\Models\Slider;
use App\Models\Job;
use App\Models\NationalGuideLine;
use App\Models\PrescriptionAssistReplay;
use App\Models\TeenagerHelp;


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
            VideoSeeder::class,
            BlogSeeder::class,
            BlogCommentSeeder::class,
            PrescriptionAssistSeeder::class,
            DiognosticSeeder::class,
            NationalGuideLineSeeder::class,
            TeenagerHelpSeeder::class,
            MedicineSeeder::class,
            PrescriptionAssistReplaySeeder::class,
            AntibioticGuidelineSeeder::class,
            UnknownMedicineSeeder::class,
            PrescriptionReadSeeder::class
        ]);



        ChronicCare::factory(15)->create();
        DiabeticGuide::factory(15)->create();
        FemaleHealthGuide::factory(15)->create();
        HeartGuide::factory(15)->create();
        KidneyGuide::factory(15)->create();
        MentelHelthGuide::factory(15)->create();
        PregnantMotherGuide::factory(15)->create();
        SkinGuide::factory(15)->create();
        HepaticGuide::factory(15)->create();




        Slider::factory(5)->create();
        Job::factory(10)->create();

    }
}
