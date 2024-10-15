<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->timestamps();
            $table->string('name')->unique();
            $table->string('kind_of_animal');
            $table->integer('age');
            $table->string('image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
