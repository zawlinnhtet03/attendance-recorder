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
            $table->boolean('is_nuclear_medicine_member')->default(false); // 是否澳門核醫及分子影像學會會員
            $table->string('occupation_category')->nullable(); // 職業類別 (nullable)
            $table->string('license_number'); // 執照編號
            $table->boolean('is_medical_specialist_member')->default(false); // 是否澳門醫學専科院土
            $table->string('work_registration_number'); // 單位工作登編號
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropColumn([
                'is_nuclear_medicine_member',
                'occupation_category',
                'license_number',
                'is_medical_specialist_member',
                'work_registration_number',
            ]);
        });
    }
};
