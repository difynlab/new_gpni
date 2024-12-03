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
        Schema::create('course_final_exam_answers', function (Blueprint $table) {
            $table->id();

            $table->string('course_final_exam_id');
            $table->string('course_final_question_id');
            $table->enum('selected_option', ['A', 'B', 'C', 'D'])->nullable();
            $table->enum('is_correct', ['Yes', 'No'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_final_exam_answers');
    }
};
