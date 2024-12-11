<?php

namespace Database\Seeders;

use App\Models\PrescriptionAssistReplay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrescriptionAssistReplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrescriptionAssistReplay::factory(10)->create();
    }
}
