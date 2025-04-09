<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('misc4', function (Blueprint $table) {
            $table->id();
            $table->string('Pname')->nullable();
            $table->integer('Page')->nullable();
            $table->string('Psex')->nullable();
            $table->string('Poc')->nullable(); // Place of Origin
            $table->string('OR')->nullable();
            $table->string('Reqby')->nullable();

            $table->string('exam')->nullable();
            $table->string('specimen')->nullable();
            $table->string('result')->nullable();
//            $table->string('lotno1')->nullable();
  //          $table->string('lotno2')->nullable();
    //        $table->string('lotno3')->nullable();
      //      $table->string('result1')->nullable();
        //    $table->string('result2')->nullable();
          //  $table->string('result3')->nullable();

            $table->string('medtech')->nullable();
            $table->string('pathologist')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('misc4');
    }
};
