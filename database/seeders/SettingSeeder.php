<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'website_name' => 'Admin Panel',
            'website_email' => 'info@gmail.com',
            'phone' => '+880',
            'address' => 'Dhaka-1216  Bangladesh',
            'website_logo' => '48931727673307.png',
            'website_favicon' => '99771727673307.png',
        ]);
    }
}
