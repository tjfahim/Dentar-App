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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the student
            $table->string('email')->unique(); // Email of the student
            $table->string('phone')->unique(); // Phone number
            $table->string('token')->nullable();
            $table->string('userType')->default('student');
            $table->string('password');
            $table->string('address')->nullable(); // Address
            $table->date('dob')->nullable(); // Date of Birth
            $table->string('gender')->nullable(); // Gender
            $table->string('university')->nullable(); // University name
            $table->string('year')->nullable(); // Year of study
            $table->string('specialization')->nullable(); // Medical specialization
            $table->text('medical_history')->nullable(); // Medical history (if applicable)
            $table->text('additional_info')->nullable(); // Additional info
            $table->string('organization')->nullable();
            $table->string('occupation')->nullable();
            $table->text('bio')->nullable(); // Additional info
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
        Schema::dropIfExists('students');
    }
};
