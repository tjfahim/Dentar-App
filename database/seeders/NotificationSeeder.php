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
            $notifications = Notification::factory(rand(1, 5))->make()->each(function ($notification) use ($patient) {
                $notification->user_type = $patient->userType;
            });
            $patient->notifications()->saveMany($notifications);
        });

        $student = Student::all();
        $student->each(function ($student) {
            $notifications = Notification::factory(rand(1, 10))->make()->each(function ($notification)  use ($student) {
                $notification->user_type = $student->userType;
            });
            $student->notifications()->saveMany($notifications);
        });

        $doctor = Doctor::all();
        $doctor->each(function ($doctor) {
            $notifications = Notification::factory(rand(1, 20))->make()->each(function ($notification)  use ($doctor) {
                $notification->user_type = $doctor->userType;
            });
            $doctor->notifications()->saveMany($notifications);
        });

    }
}
