<?php
 use Illuminate\Database\Migrations\Migration;
 use Illuminate\Database\Schema\Blueprint;
 use Illuminate\Support\Facades\Schema;
 
 return new class extends Migration {
     public function up()
     {
         // Universes Table
         Schema::create('universes', function (Blueprint $table) {
             $table->id();
             $table->string('name', 50)->unique();
             $table->timestamps();
         });
 
         // Genders Table
         Schema::create('genders', function (Blueprint $table) {
             $table->id();
             $table->string('name', 20)->unique();
             $table->timestamps();
         });
 
         // Superheroes Table
         Schema::create('superheroes', function (Blueprint $table) {
             $table->id();
             $table->string('name', 50)->unique();
             $table->string('real_name', 50);
             $table->string('image')->nullable(); // URL or file path for image
             $table->foreignId('universe_id')->constrained()->onDelete('cascade');
             $table->foreignId('gender_id')->constrained()->onDelete('cascade');
             $table->timestamps();
         });
     }
 
     public function down()
     {
         Schema::dropIfExists('superheroes');
         Schema::dropIfExists('genders');
         Schema::dropIfExists('universes');
     }
 };
 