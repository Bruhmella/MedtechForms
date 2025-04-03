<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('rbs', function (Blueprint $table) {
            $table->id();
            $table->string('Pname')->nullable();
            $table->integer('Page')->nullable();
            $table->string('Psex')->nullable();
            $table->string('Poc')->nullable(); // Place of Origin
            $table->string('OR')->nullable();
            $table->string('Reqby')->nullable();
            $table->float('result')->nullable();
            $table->float('result2')->nullable();
            $table->string('medtech')->nullable();
            $table->string('pathologist')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rbs');
    }
};
