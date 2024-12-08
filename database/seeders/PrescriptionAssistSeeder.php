<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\PrescriptionAssist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrescriptionAssistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = Patient::inRandomOrder()->limit(10)->get();

        foreach($patients as $patient){
            PrescriptionAssist::factory()->create([
                'user_id' => $patient->id,
                'userType' => $patient->userType
            ]);
        }
    }
}
