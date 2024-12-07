<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PatientProblem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $patients = Patient::all();


        foreach ($patients as $patient) {
            $problem = rand(0, 5);
            $doctor_id = null;

            // Fetch all doctors with the 'admin' role once
            $doctors = Doctor::where('role', 'admin')->get();


            // if ($doctors->where('nextPatient', true)->count() === 0) {
            //     $doctors->first()->nextPatient = true;
            //     $doctors->first()->save();
            // }


            $length = count($doctors);

            for ($i = 0; $i < $problem; $i++) {
                // Loop through the doctors to find the one with nextPatient set to true
                foreach ($doctors as $index => $doctor) {
                    if ($doctor->nextPatient) {
                        // Assign doctor_id and handle nextPatient logic
                        $doctor_id = $doctor->id;
                        $doctor->nextPatient = false; // Set current doctor to false
                        $doctor->save();

                        // Set the next doctor as the next patient
                        $nextIndex = ($index + 1) % $length; // Wrap around if we're at the last doctor
                        $doctors[$nextIndex]->nextPatient = true;
                        $doctors[$nextIndex]->save();

                        break; // Exit the inner loop once a doctor is assigned
                    }
                }

                // If a valid doctor_id is assigned, create the PatientProblem
                if ($doctor_id) {
                    PatientProblem::factory()->create([
                        'patient_id' => $patient->id,
                        'doctor_id' => $doctor_id,
                    ]);
                }
            }
        }

    }

}
