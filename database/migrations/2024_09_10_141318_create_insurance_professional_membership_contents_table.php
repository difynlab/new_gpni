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
        Schema::create('insurance_professional_membership_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_content_en')->nullable();
            $table->string('section_1_image_en')->nullable();
            $table->text('section_2_content_en')->nullable();
            $table->text('section_2_image_en')->nullable();
            $table->text('section_3_content_en')->nullable();
            $table->text('section_4_content_en')->nullable();
            $table->string('section_4_image_en')->nullable();
            $table->text('section_4_sub_content_en')->nullable();
            $table->text('section_5_content_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->text('section_1_content_zh')->nullable();
            $table->string('section_1_image_zh')->nullable();
            $table->text('section_2_content_zh')->nullable();
            $table->text('section_2_image_zh')->nullable();
            $table->text('section_3_content_zh')->nullable();
            $table->text('section_4_content_zh')->nullable();
            $table->string('section_4_image_zh')->nullable();
            $table->text('section_4_sub_content_zh')->nullable();
            $table->text('section_5_content_zh')->nullable();

            $table->text('section_1_title_ja')->nullable();
            $table->text('section_1_content_ja')->nullable();
            $table->string('section_1_image_ja')->nullable();
            $table->text('section_2_content_ja')->nullable();
            $table->text('section_2_image_ja')->nullable();
            $table->text('section_3_content_ja')->nullable();
            $table->text('section_4_content_ja')->nullable();
            $table->string('section_4_image_ja')->nullable();
            $table->text('section_4_sub_content_ja')->nullable();
            $table->text('section_5_content_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_professional_membership_contents');
    }
};
