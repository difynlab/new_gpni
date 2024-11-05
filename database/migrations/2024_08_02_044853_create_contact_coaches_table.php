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
        Schema::create('contact_coaches', function (Blueprint $table) {
            $table->id();
            $table->string('nutritionist');
            $table->string('email');
            $table->string('phone_number');
            $table->string('city');
            $table->string('country');
            $table->enum('app', ['WhatsApp', 'WeChat', 'Skype', 'Other']);
            $table->string('app_id');
            $table->date('date');
            $table->enum('status', [0, 1])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_coaches');
    }
};
