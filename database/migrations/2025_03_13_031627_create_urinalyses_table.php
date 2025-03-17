<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('urinalyses', function (Blueprint $table) {
            // 🔴 TEMPORARY: Making all fields nullable (Remove later when implementing required fields)
            $table->string('ReqBy')->nullable()->change();
            $table->date('Date')->nullable()->change();
            $table->string('OR')->nullable()->change();
            $table->string('color')->nullable()->change();
            $table->string('transparency')->nullable()->change();
            $table->string('ph')->nullable()->change();
            $table->string('gravity')->nullable()->change();
            $table->string('rbc')->nullable()->change();
            $table->string('wbc')->nullable()->change();
            $table->string('SEC')->nullable()->change();
            $table->string('Thread')->nullable()->change();
            $table->string('bacteria')->nullable()->change();
            $table->string('protein')->nullable()->change();
            $table->string('glucose')->nullable()->change();
            $table->string('ketones')->nullable()->change();
            $table->string('pregnancy_test')->nullable()->change();
            $table->string('au')->nullable()->change();
            $table->string('ap')->nullable()->change();
            $table->string('ua')->nullable()->change();
            $table->string('co')->nullable()->change();
            $table->string('tp')->nullable()->change();
            $table->string('hyaline')->nullable()->change();
            $table->string('granular')->nullable()->change();
            $table->string('wbc2')->nullable()->change();
            $table->string('rbc2')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('urinalyses', function (Blueprint $table) {
            // Remove nullable property (when ready)
            $table->string('ReqBy')->nullable(false)->change();
            $table->date('Date')->nullable(false)->change();
            $table->string('OR')->nullable(false)->change();
            $table->string('color')->nullable(false)->change();
            $table->string('transparency')->nullable(false)->change();
            $table->string('ph')->nullable(false)->change();
            $table->string('gravity')->nullable(false)->change();
            $table->string('rbc')->nullable(false)->change();
            $table->string('wbc')->nullable(false)->change();
            $table->string('SEC')->nullable(false)->change();
            $table->string('Thread')->nullable(false)->change();
            $table->string('bacteria')->nullable(false)->change();
            $table->string('protein')->nullable(false)->change();
            $table->string('glucose')->nullable(false)->change();
            $table->string('ketones')->nullable(false)->change();
            $table->string('pregnancy_test')->nullable(false)->change();
            $table->string('au')->nullable(false)->change();
            $table->string('ap')->nullable(false)->change();
            $table->string('ua')->nullable(false)->change();
            $table->string('co')->nullable(false)->change();
            $table->string('tp')->nullable(false)->change();
            $table->string('hyaline')->nullable(false)->change();
            $table->string('granular')->nullable(false)->change();
            $table->string('wbc2')->nullable(false)->change();
            $table->string('rbc2')->nullable(false)->change();
        });
    }
};
