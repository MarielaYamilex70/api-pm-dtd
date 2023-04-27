<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aux_recruiters', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('lastname');
           
            $table->string('email')->unique();

            $table->string('company');
            
            $table->unsignedTinyInteger('first_interview')->nullable();
            $table->unsignedTinyInteger('last_interview')->nullable();

            $table->boolean('remote');


            $table->string('barcelona')->nullable();
            $table->string('madrid')->nullable();
            $table->string('asturias')->nullable();
            $table->string('sevilla')->nullable();
            $table->string('malaga')->nullable();
            $table->string('cantabria')->nullable();
            $table->string('galicia')->nullable();
            $table->string('castilla_y_leon')->nullable();
            
            $table->string('php')->nullable();
            $table->string('java')->nullable();
            /* $table->string('javascript')->nullable();
            $table->string('react')->nullable(); */
            $table->string('idioma')->nullable();

            $table->string('gender')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aux_recruiters');
    }
};
