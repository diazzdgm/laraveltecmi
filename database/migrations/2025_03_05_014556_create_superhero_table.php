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
    Schema::create('superhero', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('universe_id');
        $table->unsignedBigInteger('gender_id');
        $table->string('name');
        $table->string('real_name');
        $table->string('picture')->nullable();
        $table->timestamps();

        // Claves foráneas
        $table->foreign('universe_id')->references('id')->on('universe')->onDelete('cascade');
        $table->foreign('gender_id')->references('id')->on('gender')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('superhero');
    }
};
