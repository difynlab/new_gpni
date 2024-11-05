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
        Schema::create('advisory_boards', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('designations');
            $table->enum('language', ['English', 'Chinese', 'Japanese']);
            $table->text('description');
            $table->string('image');
            $table->string('fb')->nullable();
            $table->string('linkedin')->nullable();
            $table->enum('status', [0, 1, 2])->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advisory_boards');
    }
};
