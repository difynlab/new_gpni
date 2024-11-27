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
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();
            
            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_description_en')->nullable();
            $table->string('section_1_image_en')->nullable();
            $table->text('section_1_labels_links_en')->nullable();
            $table->text('section_2_title_en')->nullable();
            $table->text('section_2_points_en')->nullable();
            $table->string('section_2_video_en')->nullable();
            $table->text('section_3_title_en')->nullable();
            $table->text('section_3_description_en')->nullable();
            $table->text('section_3_label_link_en')->nullable();
            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_description_en')->nullable();
            $table->string('section_4_video_en')->nullable();
            $table->text('section_5_title_en')->nullable();
            $table->text('section_5_description_en')->nullable();
            $table->text('section_5_images_en')->nullable();
            $table->text('section_6_title_en')->nullable();
            $table->text('section_6_description_en')->nullable();
            $table->text('section_6_labels_links_en')->nullable();
            $table->text('section_7_title_en')->nullable();
            $table->text('section_7_description_en')->nullable();
            $table->text('section_7_label_link_en')->nullable();
            $table->text('section_8_title_en')->nullable();
            $table->text('section_8_description_en')->nullable();
            $table->text('section_8_sub_description_en')->nullable();
            $table->text('section_8_labels_links_en')->nullable();
            $table->text('section_9_title_en')->nullable();
            $table->text('section_9_description_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->text('section_1_description_zh')->nullable();
            $table->string('section_1_image_zh')->nullable();
            $table->text('section_1_labels_links_zh')->nullable();
            $table->text('section_2_title_zh')->nullable();
            $table->text('section_2_points_zh')->nullable();
            $table->string('section_2_video_zh')->nullable();
            $table->text('section_3_title_zh')->nullable();
            $table->text('section_3_description_zh')->nullable();
            $table->text('section_3_label_link_zh')->nullable();
            $table->text('section_4_title_zh')->nullable();
            $table->text('section_4_description_zh')->nullable();
            $table->string('section_4_video_zh')->nullable();
            $table->text('section_5_title_zh')->nullable();
            $table->text('section_5_description_zh')->nullable();
            $table->text('section_5_images_zh')->nullable();
            $table->text('section_6_title_zh')->nullable();
            $table->text('section_6_description_zh')->nullable();
            $table->text('section_6_labels_links_zh')->nullable();
            $table->text('section_7_title_zh')->nullable();
            $table->text('section_7_description_zh')->nullable();
            $table->text('section_7_label_link_zh')->nullable();
            $table->text('section_8_title_zh')->nullable();
            $table->text('section_8_description_zh')->nullable();
            $table->text('section_8_sub_description_zh')->nullable();
            $table->text('section_8_labels_links_zh')->nullable();
            $table->text('section_9_title_zh')->nullable();
            $table->text('section_9_description_zh')->nullable();

            $table->text('section_1_title_ja')->nullable();
            $table->text('section_1_description_ja')->nullable();
            $table->string('section_1_image_ja')->nullable();
            $table->text('section_1_labels_links_ja')->nullable();
            $table->text('section_2_title_ja')->nullable();
            $table->text('section_2_points_ja')->nullable();
            $table->string('section_2_video_ja')->nullable();
            $table->text('section_3_title_ja')->nullable();
            $table->text('section_3_description_ja')->nullable();
            $table->text('section_3_label_link_ja')->nullable();
            $table->text('section_4_title_ja')->nullable();
            $table->text('section_4_description_ja')->nullable();
            $table->string('section_4_video_ja')->nullable();
            $table->text('section_5_title_ja')->nullable();
            $table->text('section_5_description_ja')->nullable();
            $table->text('section_5_images_ja')->nullable();
            $table->text('section_6_title_ja')->nullable();
            $table->text('section_6_description_ja')->nullable();
            $table->text('section_6_labels_links_ja')->nullable();
            $table->text('section_7_title_ja')->nullable();
            $table->text('section_7_description_ja')->nullable();
            $table->text('section_7_label_link_ja')->nullable();
            $table->text('section_8_title_ja')->nullable();
            $table->text('section_8_description_ja')->nullable();
            $table->text('section_8_sub_description_ja')->nullable();
            $table->text('section_8_labels_links_ja')->nullable();
            $table->text('section_9_title_ja')->nullable();
            $table->text('section_9_description_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_contents');
    }
};
