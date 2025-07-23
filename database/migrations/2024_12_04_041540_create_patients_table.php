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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->string('token')->nullable();
            $table->string('userType')->default('patient');
            $table->string('password');
            $table->string('address')->nullable();
            $table->date('dob')->nullable(); // Date of Birth
            $table->string('gender')->nullable();
            $table->text('medical_history')->nullable();
            $table->string('organization')->nullable();
            $table->string('occupation')->nullable();
                                    $table->boolean('notification_play')->default(1);

            $table->softDeletes();
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
        Schema::dropIfExists('patients');
    }
};
