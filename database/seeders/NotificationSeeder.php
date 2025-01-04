<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient = Patient::all();
        $patient->each(function ($patient) {
            $patient->notifications()->saveMany(Notification::factory(rand(1, 5))->make());
        });

        $student = Student::all();
        $student->each(function ($student) {
            $student->notifications()->saveMany(Notification::factory(rand(1, 20))->make());
        });

        $doctor = Doctor::all();
        $doctor->each(function ($doctor) {
            $doctor->notifications()->saveMany(Notification::factory(rand(1, 10))->make());
        });

    }
}
