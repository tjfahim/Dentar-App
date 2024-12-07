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


        Doctor::factory()->create([
            'name' => 'Mr. Doctor',
            'email' => 'userdoctor@g.c',
            'phone' => 01223334444,
            'password' => bcrypt('123456'),
            'specialization' => 'doctor',
            'role' => 'admin'

        ]);

        $doctor = Doctor::where('role', 'admin')->first();

        $doctor->nextPatient = true;
        $doctor->save();
    }
}
