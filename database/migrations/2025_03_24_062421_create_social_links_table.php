<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('facebook')->nullable();
            $table->string('gmail')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('messenger')->nullable();
            $table->timestamps();
        });

        // Insert initial data
        \DB::table('social_links')->insert([
            'facebook' => 'https://www.facebook.com/your-profile',
            'gmail' => 'your-email@gmail.com',
            'linkedin' => 'https://www.linkedin.com/in/your-profile',
            'messenger' => 'https://m.me/your-profile',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_links');
    }
};
