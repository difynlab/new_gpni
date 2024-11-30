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
            $table->string('age')->nullable();
            $table->enum('language', ['English', 'Chinese', 'Japanese']);
            $table->string('country')->nullable();
            $table->enum('is_certified', [1, 2])->nullable();
            $table->enum('is_sns', [1, 2])->nullable();
            $table->enum('is_snc', [1, 2])->nullable();
            $table->enum('is_cissn', [1, 2])->nullable();
            $table->enum('is_asnc', [1, 2])->nullable();
            $table->enum('cec_status', [1, 2])->nullable()->index();
            $table->text('credentials')->nullable();
            $table->string('certificate_number')->nullable();
            $table->enum('membership_credential_status', [1, 2])->nullable();
            $table->text('area_of_interests')->nullable();
            $table->text('self_introduction')->nullable();
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
