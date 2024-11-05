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
        Schema::create('tv_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_content_en')->nullable();
            $table->text('section_1_rating_title_en')->nullable();
            $table->text('section_1_rating_en')->nullable();
            $table->text('section_1_image_en')->nullable();
            $table->text('section_1_label_link_en')->nullable();
            $table->text('section_2_title_en')->nullable();
            $table->text('section_2_sub_title_en')->nullable();
            $table->text('section_3_title_en')->nullable();
            $table->text('section_3_description_en')->nullable();
            $table->text('section_3_content_en')->nullable();
            $table->text('section_3_image_en')->nullable();
            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_content_en')->nullable();
            $table->text('section_5_content_en')->nullable();
            $table->text('section_5_image_en')->nullable();
            $table->text('section_6_image_en')->nullable();
            $table->text('section_6_content_en')->nullable();
            $table->text('section_7_content_en')->nullable();
            $table->text('section_7_video_en')->nullable();
            $table->text('section_8_title_en')->nullable();
            $table->text('section_8_content_en')->nullable();
            $table->text('section_8_label_link_en')->nullable();
            $table->text('section_9_title_en')->nullable();
            $table->text('section_9_content_en')->nullable();
            $table->text('section_10_image_en')->nullable();
            $table->text('section_10_content_en')->nullable();
            $table->text('section_11_title_en')->nullable();
            $table->text('section_11_sub_title_en')->nullable();
            $table->text('section_11_message_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->text('section_1_content_zh')->nullable();
            $table->text('section_1_rating_title_zh')->nullable();
            $table->text('section_1_rating_zh')->nullable();
            $table->text('section_1_image_zh')->nullable();
            $table->text('section_1_label_link_zh')->nullable();
            $table->text('section_2_title_zh')->nullable();
            $table->text('section_2_sub_title_zh')->nullable();
            $table->text('section_3_title_zh')->nullable();
            $table->text('section_3_description_zh')->nullable();
            $table->text('section_3_content_zh')->nullable();
            $table->text('section_3_image_zh')->nullable();
            $table->text('section_4_title_zh')->nullable();
            $table->text('section_4_content_zh')->nullable();
            $table->text('section_5_content_zh')->nullable();
            $table->text('section_5_image_zh')->nullable();
            $table->text('section_6_image_zh')->nullable();
            $table->text('section_6_content_zh')->nullable();
            $table->text('section_7_content_zh')->nullable();
            $table->text('section_7_video_zh')->nullable();
            $table->text('section_8_title_zh')->nullable();
            $table->text('section_8_content_zh')->nullable();
            $table->text('section_8_label_link_zh')->nullable();
            $table->text('section_9_title_zh')->nullable();
            $table->text('section_9_content_zh')->nullable();
            $table->text('section_10_image_zh')->nullable();
            $table->text('section_10_content_zh')->nullable();
            $table->text('section_11_title_zh')->nullable();
            $table->text('section_11_sub_title_zh')->nullable();
            $table->text('section_11_message_zh')->nullable();

            $table->text('section_1_title_ja')->nullable();
            $table->text('section_1_content_ja')->nullable();
            $table->text('section_1_rating_title_ja')->nullable();
            $table->text('section_1_rating_ja')->nullable();
            $table->text('section_1_image_ja')->nullable();
            $table->text('section_1_label_link_ja')->nullable();
            $table->text('section_2_title_ja')->nullable();
            $table->text('section_2_sub_title_ja')->nullable();
            $table->text('section_3_title_ja')->nullable();
            $table->text('section_3_description_ja')->nullable();
            $table->text('section_3_content_ja')->nullable();
            $table->text('section_3_image_ja')->nullable();
            $table->text('section_4_title_ja')->nullable();
            $table->text('section_4_content_ja')->nullable();
            $table->text('section_5_content_ja')->nullable();
            $table->text('section_5_image_ja')->nullable();
            $table->text('section_6_image_ja')->nullable();
            $table->text('section_6_content_ja')->nullable();
            $table->text('section_7_content_ja')->nullable();
            $table->text('section_7_video_ja')->nullable();
            $table->text('section_8_title_ja')->nullable();
            $table->text('section_8_content_ja')->nullable();
            $table->text('section_8_label_link_ja')->nullable();
            $table->text('section_9_title_ja')->nullable();
            $table->text('section_9_content_ja')->nullable();
            $table->text('section_10_image_ja')->nullable();
            $table->text('section_10_content_ja')->nullable();
            $table->text('section_11_title_ja')->nullable();
            $table->text('section_11_sub_title_ja')->nullable();
            $table->text('section_11_message_ja')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tv_contents');
    }
};
