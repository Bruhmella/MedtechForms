<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('fecalyses', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('Pname')->nullable();
            $table->integer('Page')->nullable();
            $table->string('Psex')->nullable();
            $table->string('Poc')->nullable();
            $table->string('date')->nullable();
            $table->string('OR')->nullable();
            $table->string('Reqby')->nullable();

            // Physical & Chemical Characteristics
            $table->string('color')->nullable();
            $table->string('consistency')->nullable();
            $table->string('occult_blood')->nullable();
            $table->string('sudan_stain')->nullable();
            $table->string('bacteria')->nullable();
            $table->string('yeast')->nullable();
            $table->string('fat_globules')->nullable();
            $table->string('others')->nullable();

            // Medical Personnel
            $table->string('medtech')->nullable();
            $table->string('mtlicno')->nullable();
            $table->string('pathologist')->nullable();
            $table->string('ptlicno')->nullable();

            // Microscopic Analysis
           $table->decimal('wbc', 10, 2)->nullable();
            $table->decimal('rbc', 10, 2)->nullable();
    

            $table->timestamps(); // Adds created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('fecalyses');
    }
};
