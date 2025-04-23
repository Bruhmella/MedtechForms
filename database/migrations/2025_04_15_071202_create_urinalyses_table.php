<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('urinalysis', function (Blueprint $table) {
            $table->id();
            $table->string('Pname')->nullable();
            $table->integer('Page')->nullable();
            $table->string('Psex')->nullable();
            $table->string('Poc')->nullable(); // Place of Origin
            $table->string('OR')->nullable();
            $table->string('Reqby')->nullable();

            // Physical Examination
            $table->string('color')->nullable();
            $table->string('transparency')->nullable();
            $table->string('ph')->nullable();
            $table->string('gravity')->nullable();
            
            // Chemical Examination
            $table->string('protein')->nullable();
            $table->string('glucose')->nullable();
            $table->string('ketones')->nullable();
            $table->string('bilirubin')->nullable();
            $table->string('pregnancy')->nullable();
            $table->string('others')->nullable();
            
            // Microscopic Examination
            $table->decimal('rbc', 10, 2)->nullable();
            $table->decimal('wbc', 10, 2)->nullable();
            $table->string('sec')->nullable();
            $table->string('mucus')->nullable();
            $table->string('bacteria')->nullable();
            
            // Additional Tests
            $table->string('au')->nullable();
            $table->string('ap')->nullable();
            $table->string('ua')->nullable();
            $table->string('co')->nullable();
            $table->string('tp')->nullable();
            
            // Casts
            $table->decimal('hyaline', 10, 2)->nullable();
            $table->decimal('granular', 10, 2)->nullable();
            $table->decimal('wbc2', 10, 2)->nullable();
            $table->decimal('rbc2', 10, 2)->nullable();

            $table->string('medtech')->nullable();
            $table->string('pathologist')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('urinalysis');
    }
};
