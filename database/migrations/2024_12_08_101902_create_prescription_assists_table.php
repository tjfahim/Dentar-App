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
        Schema::create('prescription_assists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->longtext('description');
            $table->boolean('is_read')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->string('userType');
            $table->unsignedBigInteger('replay_user_id')->nullable();
            $table->string('replay_user_type')->nullable();
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
        Schema::dropIfExists('prescription_assists');
    }
};
