<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('chemistries', function (Blueprint $table) {
            $table->id();
            $table->string('Pname')->nullable();
            $table->integer('Page')->nullable();
            $table->string('Psex')->nullable();
            $table->string('Poc')->nullable(); // Place of Origin
            $table->string('OR')->nullable();
            $table->string('Reqby')->nullable();
            $table->float('glucose')->nullable();
            $table->float('urea_nitrogen')->nullable();
            $table->float('creatine')->nullable();
            $table->float('uric_acid')->nullable();
            $table->float('total_cholesterol')->nullable();
            $table->float('triglyceride')->nullable();
            $table->float('hdl')->nullable();
            $table->float('ldl')->nullable();
            $table->float('vldl')->nullable();
            $table->float('ratio')->nullable();
            $table->float('ast')->nullable();
            $table->float('alt')->nullable();
            $table->float('sodium')->nullable();
            $table->float('potassium')->nullable();
            $table->float('chloride')->nullable();
            $table->float('ionized_calcium')->nullable();
            $table->float('protein')->nullable();
            $table->float('albumin')->nullable();
            $table->float('globulin')->nullable();
            $table->float('ag_ratio')->nullable();
            $table->float('alkaline')->nullable();
            $table->float('bilirubin')->nullable();
            $table->float('b2')->nullable();
            $table->float('b1')->nullable();
            $table->string('others')->nullable();
            $table->string('remarks')->nullable();
            $table->string('medtech')->nullable();
            $table->string('pathologist')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chemistries');
    }
};
