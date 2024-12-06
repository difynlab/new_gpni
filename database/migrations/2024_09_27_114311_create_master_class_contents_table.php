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
        Schema::create('master_class_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_sub_title_en')->nullable();
            $table->text('section_1_description_en')->nullable();
            $table->text('section_3_title_en')->nullable();
            $table->text('section_3_points_en')->nullable();
            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_description_en')->nullable();
            $table->text('section_4_video_en')->nullable();
            $table->text('section_5_title_en')->nullable();
            $table->text('section_5_description_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->text('section_1_sub_title_zh')->nullable();
            $table->text('section_1_description_zh')->nullable();
            $table->text('section_3_title_zh')->nullable();
            $table->text('section_3_points_zh')->nullable();
            $table->text('section_4_title_zh')->nullable();
            $table->text('section_4_description_zh')->nullable();
            $table->text('section_4_video_zh')->nullable();
            $table->text('section_5_title_zh')->nullable();
            $table->text('section_5_description_zh')->nullable();

            $table->text('section_1_title_ja')->nullable();
            $table->text('section_1_sub_title_ja')->nullable();
            $table->text('section_1_description_ja')->nullable();
            $table->text('section_3_title_ja')->nullable();
            $table->text('section_3_points_ja')->nullable();
            $table->text('section_4_title_ja')->nullable();
            $table->text('section_4_description_ja')->nullable();
            $table->text('section_4_video_ja')->nullable();
            $table->text('section_5_title_ja')->nullable();
            $table->text('section_5_description_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_class_contents');
    }
};
