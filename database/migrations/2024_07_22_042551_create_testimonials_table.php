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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->enum('language', ['English', 'Chinese', 'Japanese']);
            $table->string('name');
            $table->string('designation');
            $table->enum('rate', ['1', '2', '3', '4', '5']);
            $table->enum('type', ['Common', 'Master Class', 'Certification Course']);
            $table->string('image')->nullable();
            $table->text('content');
            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
