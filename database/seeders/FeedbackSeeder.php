<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $students = Student::inRandomOrder()->limit(10)->get();


        foreach($students as $student){
            Feedback::factory()->create([
                'user_id' => $student->id,
                'user_type' => $student->userType,
            ]);
        }
    }
}
