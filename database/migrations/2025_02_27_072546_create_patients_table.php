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
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('Pname'); // Full Name
            $table->integer('Page'); // Age
             $table->enum('Psex', ['M', 'F']); // Restricts values to 'M' or 'F'
        $table->string('Poc')->unique(); // Change Poc from integer to string (VARCHAR)
        $table->string('Por')->unique(); // Change Por from integer to string (VARCHAR)
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
