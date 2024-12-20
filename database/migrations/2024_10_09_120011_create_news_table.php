<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->timestamps('data');
            $table->string('title');
            $table->string('description');
            $table->string('image')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
