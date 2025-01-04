<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\UnknownMedicine;

class UnknownMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = Patient::inRandomOrder()->limit(10)->get();


        foreach($users as $user){
            UnknownMedicine::factory()->create([
                'user_id' => $user->id,
                'user_type' => $user->userType
            ]);
        }
    }
}
