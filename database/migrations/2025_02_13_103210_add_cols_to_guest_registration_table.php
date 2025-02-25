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
            $table->string('notes_text')->nullable()->after('vipdetails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guest_registration', function (Blueprint $table) {
            $table->dropColumn('notes_text');
        });
    }
};
