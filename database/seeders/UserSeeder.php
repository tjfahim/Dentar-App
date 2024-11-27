<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        User::create([
            'name' => 'John Doe',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@admin.com'),
            'phone' => '1234567890',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'user@user.com',
            'password' => Hash::make('user@user.com'),
            'phone' => '0987654321',
            'role' => 'user',
        ]);

        // for ($i = 1; $i <= 40; $i++) {
        //     $email = $faker->email;
        //     $activeStatus = ['active', 'pending', 'block', 'suspend'];

        //     User::create([
        //         'name' => $faker->name,
        //         'email' => $email,
        //         'password' => Hash::make($email),
        //         'phone' => '+09' . str_pad(rand(0, 999999999), 9, '0', STR_PAD_LEFT),
        //         'role' => 'user', // Random status 0 or 1
        //         'status' => $activeStatus[array_rand($activeStatus)]
        //     ]);
        // }

    }
}
