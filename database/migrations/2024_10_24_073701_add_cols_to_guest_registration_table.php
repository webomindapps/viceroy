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
        Schema::table('guest_registration', function (Blueprint $table) {
            $table->bigInteger('roomno')->after('nationality')->nullable();
            $table->bigInteger('packno')->after('roomno')->nullable();
            $table->string('mealplan')->after('packno')->nullable();
            $table->string('manager_signature_image_url')->after('signature_image_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guest_registration', function (Blueprint $table) {
            $table->dropcolumn('roomno','packno','mealplan');
        });
    }
};
