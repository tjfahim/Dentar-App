<?php

namespace Database\Seeders;

use App\Models\Diognostic;
use App\Models\Patient;
use App\Models\Student;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiognosticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $normal_user = Patient::all();
        $student = Student::all();

        $patients = $normal_user->merge($student);

        foreach($patients as $patient){
            $doctor_id = null;


            $doctors = Doctor::where('role', 'admin')->get();

            $length = count($doctors);
            $problem = rand(0, 5);

            for($i = 0; $i<$problem; $i++){


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
                    Diognostic::factory()->create([
                        'patient_type' => $patient->userType,
                        'patient_id' => $patient->id,
                        'doctor_id' => $doctor_id,
                    ]);
                }



            }
        }
    }
}
