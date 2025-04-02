<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHematologiesTable extends Migration
{
    public function up()
    {
        Schema::create('hematologies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();
            // The following fields are from the Patient model, added to the hematologies table
            $table->string('Pname')->nullable();
            $table->integer('Page')->nullable();
            $table->string('Psex')->nullable();
            $table->string('Poc')->nullable();
            $table->string('OR')->nullable();  // Assuming this is related to OR (Operation Room or another term)
            // Hematology-related fields
            $table->decimal('hemogoblin', 5, 2)->nullable();
            $table->decimal('hematocrit', 5, 2)->nullable();
            $table->decimal('rbc', 5, 2)->nullable();
            $table->decimal('wbc', 5, 2)->nullable();
            $table->decimal('segmenters', 5, 2)->nullable();
            $table->decimal('band', 5, 2)->nullable();
            $table->decimal('lymphocyte', 5, 2)->nullable();
            $table->decimal('Monocyte', 5, 2)->nullable();
            $table->decimal('Eosinophil', 5, 2)->nullable();
            $table->decimal('Basophil', 5, 2)->nullable();
            $table->decimal('Metamyelocyte', 5, 2)->nullable();
            $table->decimal('Myelocyte', 5, 2)->nullable();
            $table->decimal('Blast_Cell', 5, 2)->nullable(); // Corrected 'Blast Cell'
            $table->decimal('platelet', 5, 2)->nullable();
            $table->decimal('Reticulocyte', 5, 2)->nullable();
            $table->string('BLOOD_TYPING')->nullable();
            $table->string('rh_factor')->nullable();
            $table->decimal('esr', 5, 2)->nullable();
            $table->decimal('clotting_time', 5, 2)->nullable();
            $table->decimal('bleeding_time', 5, 2)->nullable();
            $table->string('medtech')->nullable();
            $table->string('pathologist')->nullable();
            $table->timestamps();
            
            // Foreign key relationship
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hematologies');
    }
}
