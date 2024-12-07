<?php

namespace Database\Seeders;

use App\Models\DoctorSpecialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ar = [
            'Anesthesia & ICU Specialists',
            'Cancer Surgeons',
            'Cardio-Vascular Surgeons',
            'Cardiologists',
            'Colorectal Surgeons',
            'Critical Care Medicine Specialists',
            'Dentists',
            'Dermatologists',
            'Diabetologists',
            'ENT Specialists',
            'Endorionlogists'
        ];

        foreach($ar as $item){
            DoctorSpecialty::factory()->create([
                'name' => $item
            ]);
        }
    }
}
