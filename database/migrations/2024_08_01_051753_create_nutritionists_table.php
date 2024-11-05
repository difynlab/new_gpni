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
        Schema::create('nutritionists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->enum('language', ['English', 'Chinese', 'Japanese']);
            $table->string('country');
            $table->enum('cec_status', [1, 2])->index();
            $table->text('credentials');
            $table->string('certificate_number');
            $table->enum('membership_credential_status', [1, 2])->index();
            $table->text('area_of_interests');
            $table->text('self_introduction');
            $table->string('image')->nullable();
            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutritionists');
    }
};
