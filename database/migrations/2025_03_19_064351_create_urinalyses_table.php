<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('urinalyses', function (Blueprint $table) {
            $table->id();
            $table->string('ReqBy')->nullable();
            $table->date('Date')->nullable();
            $table->string('OR')->nullable();
            $table->string('color')->nullable();
            $table->string('transparency')->nullable();
            $table->string('ph')->nullable();
            $table->string('gravity')->nullable();
            $table->string('rbc')->nullable();
            $table->string('wbc')->nullable();
            $table->string('SEC')->nullable();
            $table->string('Thread')->nullable();
            $table->string('bacteria')->nullable();
            $table->string('protein')->nullable();
            $table->string('glucose')->nullable();
            $table->string('ketones')->nullable();
            $table->string('bilirubin')->nullable();
            $table->string('pregnancy_test')->nullable();
            $table->string('others')->nullable();
            $table->string('au')->nullable();
            $table->string('ap')->nullable();
            $table->string('ua')->nullable();
            $table->string('co')->nullable();
            $table->string('tp')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('urinalyses');
    }
};
