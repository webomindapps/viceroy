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
        Schema::create('guest_registration', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('arrivingfrom')->nullable(); 
            $table->dateTime('datetime')->nullable();    
            $table->string('purposeofvisit')->nullable();
            $table->date('depaturedate')->nullable(); 
            $table->string('proceedingto')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone');
            $table->string('nationality');
            $table->string('vipdetails')->nullable();  
            $table->string('signature_image_url')->nullable(); 
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_guest_registration');
    }
};
