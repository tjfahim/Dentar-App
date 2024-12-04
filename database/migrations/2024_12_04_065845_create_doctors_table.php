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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Doctor's name
            $table->string('email')->unique(); // Email address
            $table->string('phone')->unique(); // Phone number
            $table->string('password');
            $table->string('specialization'); // Medical specialization
            $table->string('hospital')->nullable(); // Hospital or clinic the doctor works at
            $table->string('gender')->nullable(); // Gender
            $table->text('biography')->nullable(); // Biography of the doctor
            $table->date('dob')->nullable(); // Date of Birth
            $table->string('degree')->nullable(); // Degree or qualifications
            $table->string('image')->nullable(); // Doctor's image (optional)
            $table->string('signature')->nullable(); // Doctor's signature image
            $table->enum('role', ['normal', 'admin'])->default('normal'); // Doctor role (normal or admin)
            $table->text('address')->nullable(); // Doctor's address
            $table->timestamps();
            $table->softDeletes(); // Soft delete functionality
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
