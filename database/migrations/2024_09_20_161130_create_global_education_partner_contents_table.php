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
        Schema::create('global_education_partner_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_sub_title_en')->nullable();
            $table->text('section_1_description_en')->nullable();
            $table->text('section_2_title_en')->nullable();
            $table->text('section_2_first_column_title_en')->nullable();
            $table->text('section_2_second_column_title_en')->nullable();
            $table->text('section_2_third_column_title_en')->nullable();
            $table->text('section_2_points_en')->nullable();
            $table->text('section_3_title_en')->nullable();
            $table->text('section_3_description_en')->nullable();
            $table->text('section_3_sub_title_en')->nullable();
            $table->text('section_3_language_title_en')->nullable();
            $table->text('section_3_languages_en')->nullable();
            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_description_en')->nullable();
            $table->text('section_4_label_link_en')->nullable();
            $table->text('section_5_title_en')->nullable();
            $table->text('section_5_description_en')->nullable();
            $table->text('section_5_points_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->text('section_1_sub_title_zh')->nullable();
            $table->text('section_1_description_zh')->nullable();
            $table->text('section_2_title_zh')->nullable();
            $table->text('section_2_first_column_title_zh')->nullable();
            $table->text('section_2_second_column_title_zh')->nullable();
            $table->text('section_2_third_column_title_zh')->nullable();
            $table->text('section_2_points_zh')->nullable();
            $table->text('section_3_title_zh')->nullable();
            $table->text('section_3_description_zh')->nullable();
            $table->text('section_3_sub_title_zh')->nullable();
            $table->text('section_3_language_title_zh')->nullable();
            $table->text('section_3_languages_zh')->nullable();
            $table->text('section_4_title_zh')->nullable();
            $table->text('section_4_description_zh')->nullable();
            $table->text('section_4_label_link_zh')->nullable();
            $table->text('section_5_title_zh')->nullable();
            $table->text('section_5_description_zh')->nullable();
            $table->text('section_5_points_zh')->nullable();

            $table->text('section_1_title_ja')->nullable();
            $table->text('section_1_sub_title_ja')->nullable();
            $table->text('section_1_description_ja')->nullable();
            $table->text('section_2_title_ja')->nullable();
            $table->text('section_2_first_column_title_ja')->nullable();
            $table->text('section_2_second_column_title_ja')->nullable();
            $table->text('section_2_third_column_title_ja')->nullable();
            $table->text('section_2_points_ja')->nullable();
            $table->text('section_3_title_ja')->nullable();
            $table->text('section_3_description_ja')->nullable();
            $table->text('section_3_sub_title_ja')->nullable();
            $table->text('section_3_language_title_ja')->nullable();
            $table->text('section_3_languages_ja')->nullable();
            $table->text('section_4_title_ja')->nullable();
            $table->text('section_4_description_ja')->nullable();
            $table->text('section_4_label_link_ja')->nullable();
            $table->text('section_5_title_ja')->nullable();
            $table->text('section_5_description_ja')->nullable();
            $table->text('section_5_points_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_education_partner_contents');
    }
};
