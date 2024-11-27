<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSettingManageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_setting_manages')->insert([
            'title' => 'Sample App Title',
            'description' => 'This is a sample description for the application settings.',
            'phoneimage' => 'img/sample_phone_image.png', // Assuming the image is in the public/storage/img folder
            'phonenumber' => '+1234567890',
            'emailimage' => 'img/sample_email_image.png', // Assuming the image is in the public/storage/img folder
            'email' => 'example@example.com',
            'locationimage' => 'img/sample_location_image.png', // Assuming the image is in the public/storage/img folder
            'location' => 'Sample Location',
            'policy1title' => 'Policy 1 Title',
            'policy1description' => 'This is the description for policy 1.',
            'policy2title' => 'Policy 2 Title',
            'policy2description' => 'This is the description for policy 2.',
        ]);
    }
}
