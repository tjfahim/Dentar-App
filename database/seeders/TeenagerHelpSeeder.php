<?php

namespace Database\Seeders;

use App\Models\TeenagerHelp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeenagerHelpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeenagerHelp::factory(20)->create();
    }
}
