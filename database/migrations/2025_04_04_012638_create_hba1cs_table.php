<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hba1c', function (Blueprint $table) {
            $table->id();
            $table->string('Pname')->nullable();
            $table->integer('Page')->nullable();
            $table->string('Psex')->nullable();
            $table->string('Poc')->nullable(); // Place of Origin
            $table->string('OR')->nullable();
            $table->string('Reqby')->nullable();
            $table->string('date')->nullable();
            $table->string('test')->nullable();
            $table->string('result')->nullable();
            $table->string('unit')->nullable();
            $table->string('medtech')->nullable();
            $table->string('mtlicno')->nullable();
            $table->string('pathologist')->nullable();
            $table->string('ptlicno')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hba1c');
    }
};
