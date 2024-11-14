<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->string('type_of_fur')->nullable(); 
            $table->string('colour')->nullable();  
            $table->string('size')->nullable();       
            $table->string('temper')->nullable();    
        });
    }

    public function down(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropColumn(['type_of_fur', 'colour', 'size', 'temper']); 
        });
    }
};
