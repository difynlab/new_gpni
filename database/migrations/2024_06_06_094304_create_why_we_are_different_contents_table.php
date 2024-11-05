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
        Schema::create('why_we_are_different_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title_en')->nullable();
            $table->string('section_1_video_en')->nullable();
            $table->text('section_1_description_en')->nullable();
            $table->text('section_2_title_en')->nullable();
            $table->string('section_2_image_en')->nullable();
            $table->text('section_2_top_description_en')->nullable();
            $table->text('section_2_bottom_description_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->string('section_1_video_zh')->nullable();
            $table->text('section_1_description_zh')->nullable();
            $table->text('section_2_title_zh')->nullable();
            $table->string('section_2_image_zh')->nullable();
            $table->text('section_2_top_description_zh')->nullable();
            $table->text('section_2_bottom_description_zh')->nullable();

            $table->text('section_1_title_ja')->nullable();
            $table->string('section_1_video_ja')->nullable();
            $table->text('section_1_description_ja')->nullable();
            $table->text('section_2_title_ja')->nullable();
            $table->string('section_2_image_ja')->nullable();
            $table->text('section_2_top_description_ja')->nullable();
            $table->text('section_2_bottom_description_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_we_are_different_contents');
    }
};
