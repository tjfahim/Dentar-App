<?php

namespace Database\Seeders;

use App\Models\NationalGuideLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NationalGuideLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NationalGuideLine::factory(15)->create();
    }
}
