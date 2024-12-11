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
        Schema::create('quiz_question_manages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_manage_id')->nullable(); // Nullable foreign key to the quiz
            $table->string('question'); 
            $table->string('answer'); 
            $table->string('question_type')->nullable();
            $table->string('option_1')->nullable(); 
            $table->string('option_2')->nullable(); 
            $table->string('option_3')->nullable();
            $table->string('option_4')->nullable();
            $table->integer('points')->default(1); 
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('quiz_manage_id')->references('id')->on('quiz_manages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_question_manages');
    }
};
