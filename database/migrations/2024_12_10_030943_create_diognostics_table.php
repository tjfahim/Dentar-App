<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Doctor;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diognostics', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Patient's name
            $table->integer('age'); // Patient's age
            $table->string('gender'); // Contact number
            $table->string('number'); // Contact number
            $table->string('image')->nullable(); // Path to image, nullable
            $table->text('problem'); // Description of the problem
            $table->string('patient_type');
            $table->integer('patient_id');
            $table->foreignIdFor(Doctor::class);
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
        Schema::dropIfExists('diognostics');
    }
};