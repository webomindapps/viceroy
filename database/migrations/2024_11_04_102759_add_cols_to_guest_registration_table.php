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
            $table->bigInteger('passportno')->nullable()->after('nationality');
            $table->date('dateofissue')->nullable()->after('passportno');
            $table->string('placeofissue')->nullable()->after('dateofissue');
            $table->date('dateofexpiry')->nullable()->after('placeofissue');
            $table->date('dateofarrival')->nullable()->after('dateofexpiry');
            $table->bigInteger('visano')->nullable()->after('dateofarrival');
            $table->string('placeofvisaissue')->nullable()->after('visano');
            $table->string('durationofstay')->nullable()->after('placeofvisaissue');
            $table->date('dateofvisaissue')->nullable()->after('durationofstay');
            $table->date('dateofvisaexpiry')->nullable()->after('dateofvisaissue');
            $table->enum('employeed', ['yes', 'no'])->nullable()->after('dateofvisaexpiry');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guest_registration', function (Blueprint $table) {
            $table->dropColumn('passportno', 'dateofissue', 'placeofissue', 'dateofexpiry', 'dateofarrival', 'visano', 'placeofvisaissue', 'durationofstay', 'dateofvisaissue', 'dateofvisaexpiry', 'employeed');
        });
    }
};
