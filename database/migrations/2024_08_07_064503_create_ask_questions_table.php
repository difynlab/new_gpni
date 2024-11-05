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
        Schema::create('ask_questions', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('subject');
            $table->string('initial_message');
            $table->date('date');
            $table->time('time');
            $table->enum('is_viewed', [0, 1]);
            $table->enum('status', [0, 1])->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ask_questions');
    }
};
