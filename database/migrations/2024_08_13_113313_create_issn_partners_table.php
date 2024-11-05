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
        Schema::create('issn_partners', function (Blueprint $table) {
            $table->id();

            $table->enum('language', ['English', 'Chinese', 'Japanese']);
            $table->string('image');
            $table->enum('status', [0, 1, 2])->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issn_partners');
    }
};
