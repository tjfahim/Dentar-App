<?php

use App\Models\Doctor;
use App\Models\Patient;
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
        Schema::create('patient_problems', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Patient's name
            $table->integer('age'); // Patient's age
            $table->string('number'); // Contact number
            $table->string('image')->nullable(); // Path to image, nullable
            $table->text('problem'); // Description of the problem
            $table->foreignIdFor(Patient::class);
            $table->foreignIdFor(Doctor::class);
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_problems');
    }
};
