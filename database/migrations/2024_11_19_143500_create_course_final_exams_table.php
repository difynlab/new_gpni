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
        Schema::create('course_final_exams', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('course_id');
            $table->integer('total_questions');
            $table->integer('total_correct_answers')->default(0);
            $table->integer('total_un_attended_answers')->default(0);
            $table->decimal('marks', 10, 2)->default(0.00);
            $table->enum('result', ['Pass', 'Fail'])->nullable();
            $table->enum('status', [0, 1])->default(1)->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_final_exams');
    }
};
