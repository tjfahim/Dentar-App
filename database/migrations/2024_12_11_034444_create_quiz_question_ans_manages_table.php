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
        Schema::create('quiz_question_ans_manages', function (Blueprint $table) {
            $table->id();
            $table->string('unique_quiz_id');
            $table->unsignedBigInteger('user_id');
            $table->string('user_type');
            $table->unsignedBigInteger('quiz_question_manages_id');
            $table->foreign('quiz_question_manages_id')->references('id')->on('quiz_question_manages')->onDelete('cascade');
            $table->string('user_answer')->nullable();
            $table->boolean('answer_is_correct');
            $table->integer('points');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('quiz_question_ans_manages');
    }
};
