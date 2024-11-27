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
        Schema::create('app_setting_manages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('phoneimage')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('emailimage')->nullable();
            $table->string('email')->nullable();
            $table->string('locationimage')->nullable();
            $table->string('location')->nullable();
            $table->string('policy1title')->nullable();
            $table->text('policy1description')->nullable();
            $table->string('policy2title')->nullable();
            $table->text('policy2description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_setting_manages');
    }
};
