<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Patient::factory()->create([
            'name' => 'Md Jamal', // Generate a fake name
            'email' => 'userpatient@g.c',// Generate a unique email
            'phone' => '012333333333', // Generate a unique phone number
            'password' => Hash::make('1234'), // Encrypt and store the password "1234"j
            'image' => 'https://placeholder',
            'address' => 'dhaka', // Generate a fake address
            'dob' => '2000-01-01', // Generate a date before 2000-01-01
            'gender' => 'male',
            'medical_history' =>  'lorem 50'
        ]);
        Patient::factory(50)->create();
    }
}
