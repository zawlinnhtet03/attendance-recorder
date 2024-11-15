<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->string('organization')->nullable()->change(); // Make organization nullable
            $table->string('license_number')->nullable()->change(); // Make license_number nullable
            $table->string('work_registration_number')->nullable()->change(); // Make work_registration_number nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->string('organization')->nullable(false)->change(); // Revert organization to not nullable
            $table->string('license_number')->nullable(false)->change(); // Revert license_number to not nullable
            $table->string('work_registration_number')->nullable(false)->change(); // Revert work_registration_number to not nullable
        });
    }
};
