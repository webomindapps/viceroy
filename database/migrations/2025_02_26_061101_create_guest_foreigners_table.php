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
        Schema::create('guest_foreigners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id')->constrained('guest_registration')->onDelete('cascade');  
            $table->bigInteger('passportno')->nullable();
            $table->date('dateofissue')->nullable();
            $table->string('placeofissue')->nullable();
            $table->date('dateofexpiry')->nullable();
            $table->date('dateofarrival')->nullable();
            $table->bigInteger('visano')->nullable();
            $table->string('placeofvisaissue')->nullable();
            $table->string('durationofstay')->nullable();
            $table->date('dateofvisaissue')->nullable();
            $table->date('dateofvisaexpiry')->nullable();
            $table->enum('employeed', ['yes', 'no'])->nullable();
            $table->string('guest_name')->nullable();
            $table->string('guest_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_foreigners');
    }
};
