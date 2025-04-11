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
        Schema::create('spermcount', function (Blueprint $table) {
            $table->id();
            $table->string('OR')->nullable();
            $table->string('Pname');
            $table->integer('Page');
            $table->string('Psex');
            $table->string('Poc');
            $table->string('Reqby')->nullable();
            
             $table->time('timec')->nullable();
        $table->time('timer')->nullable();
        $table->time('timel')->nullable();

        $table->string('color')->nullable();
        $table->string('viscocity')->nullable();
        $table->string('volume')->nullable();

        $table->decimal('motile', 8, 2)->nullable();
        $table->decimal('nonmotile', 8, 2)->nullable();

        $table->string('motilegrade')->nullable();

        $table->decimal('normal', 8, 2)->nullable();
        $table->decimal('abnormal', 8, 2)->nullable();
        $table->decimal('Phead', 8, 2)->nullable();
        $table->decimal('Ghead', 8, 2)->nullable();
        $table->decimal('Dhead', 8, 2)->nullable();
        $table->decimal('Ctail', 8, 2)->nullable();
        $table->decimal('spermatid', 8, 2)->nullable();

        $table->string('medtech')->nullable();
        $table->string('pathologist')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spermcounts');
    }
};
