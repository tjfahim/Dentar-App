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
            $table->string('image');
            $table->longtext('description');
            $table->bool('is_read')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->string('userType');
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
