<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory(100)->create();


        Student::factory()->create([
            'name' => 'Md Student',
            'email' => 'userstudent@g.c', // Unique email
            'phone' => '01223335555', // Unique phone number
            'address' => 'Dhaka Bangladesh',
            'password' => Hash::make('123456'),
            'dob' => '1972-02-25', // Random date of birth
            'gender' => 'male',
            'image' => 'images/students/student.jpg',
            'university' => 'Dhaka Univerisy', // Random university name
            'year' => '1st Year',
            'specialization' => 'Neurology',
            'medical_history' => 'when an unknown y with d', // Random medical history
            'additional_info' => 'when an unknow, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with d 50', // Random additional info
            'bio' => 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with d'
        ]);

    }
}
