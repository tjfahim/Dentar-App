<?php

namespace Database\Seeders;

use App\Models\AntibioticGuideline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AntibioticGuidelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AntibioticGuideline::factory(15)->create();
    }
}
