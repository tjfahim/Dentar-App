<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::factory(50)->create();

        $doctor = Doctor::where('role', 'admin')->first();

        $doctor->nextPatient = true;
        $doctor->save();
    }
}
