<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->timestamps();
            $table->string('name');
            $table->string('number')->unique();
            $table->integer('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
