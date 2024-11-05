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
        Schema::create('course_chapters', function (Blueprint $table) {
            $table->id();
            $table->string('course_id');
            $table->string('module_id');
            $table->string('chapter_no');

            $table->text('title')->nullable();
            $table->text('about')->nullable();
            $table->text('content')->nullable();
            $table->text('books')->nullable();
            $table->text('videos')->nullable();
            $table->text('video_links')->nullable();
            $table->text('additional_videos')->nullable();
            $table->text('additional_video_links')->nullable();
            $table->text('presentation_medias')->nullable();
            $table->text('downloadable_resources')->nullable();

            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_chapters');
    }
};
