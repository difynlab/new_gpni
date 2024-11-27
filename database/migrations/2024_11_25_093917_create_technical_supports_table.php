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
        Schema::create('technical_supports', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->text('subject');
            $table->text('message');
            $table->enum('status', [0, 1])->default('0')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technical_supports');
    }
};
