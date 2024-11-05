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
        Schema::create('history_of_gpni_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_large_title_en')->nullable();
            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_year_en')->nullable();
            $table->string('section_1_image_en')->nullable();
            $table->text('section_2_title_en')->nullable();
            $table->text('section_2_sub_title_en')->nullable();
            $table->text('section_2_description_en')->nullable();
            $table->text('section_3_title_en')->nullable();
            $table->string('section_3_image_en')->nullable();
            $table->text('section_3_description_en')->nullable();
            $table->text('section_4_title_en')->nullable();
            $table->text('section_5_title_en')->nullable();
            $table->string('section_5_image_en')->nullable();
            $table->text('section_5_description_en')->nullable();
            $table->text('section_6_title_en')->nullable();
            $table->string('section_6_image_en')->nullable();
            $table->text('section_6_description_en')->nullable();

            $table->text('section_1_large_title_zh')->nullable();
            $table->text('section_1_title_zh')->nullable();
            $table->text('section_1_year_zh')->nullable();
            $table->string('section_1_image_zh')->nullable();
            $table->text('section_2_title_zh')->nullable();
            $table->text('section_2_sub_title_zh')->nullable();
            $table->text('section_2_description_zh')->nullable();
            $table->text('section_3_title_zh')->nullable();
            $table->string('section_3_image_zh')->nullable();
            $table->text('section_3_description_zh')->nullable();
            $table->text('section_4_title_zh')->nullable();
            $table->text('section_5_title_zh')->nullable();
            $table->string('section_5_image_zh')->nullable();
            $table->text('section_5_description_zh')->nullable();
            $table->text('section_6_title_zh')->nullable();
            $table->string('section_6_image_zh')->nullable();
            $table->text('section_6_description_zh')->nullable();

            $table->text('section_1_large_title_ja')->nullable();
            $table->text('section_1_title_ja')->nullable();
            $table->text('section_1_year_ja')->nullable();
            $table->string('section_1_image_ja')->nullable();
            $table->text('section_2_title_ja')->nullable();
            $table->text('section_2_sub_title_ja')->nullable();
            $table->text('section_2_description_ja')->nullable();
            $table->text('section_3_title_ja')->nullable();
            $table->string('section_3_image_ja')->nullable();
            $table->text('section_3_description_ja')->nullable();
            $table->text('section_4_title_ja')->nullable();
            $table->text('section_5_title_ja')->nullable();
            $table->string('section_5_image_ja')->nullable();
            $table->text('section_5_description_ja')->nullable();
            $table->text('section_6_title_ja')->nullable();
            $table->string('section_6_image_ja')->nullable();
            $table->text('section_6_description_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_of_gpni_contents');
    }
};
