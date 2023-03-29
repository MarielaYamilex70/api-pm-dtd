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
        Schema::create('coders', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('gender');
            $table->integer('years');
            $table->string('avaliability');
            $table->boolean('remote');
            $table->string('email');
            $table->string('phone');
            $table->string('linkedin');
            $table->string('github');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coders');
    }
};
