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
        Schema::create('issn_partner_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_sub_title_en')->nullable();
            $table->text('section_1_description_en')->nullable();

            $table->text('section_2_title_en')->nullable();
            $table->text('section_2_description_en')->nullable();
            $table->text('section_2_image_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->text('section_1_sub_title_zh')->nullable();
            $table->text('section_1_description_zh')->nullable();

            $table->text('section_2_title_zh')->nullable();
            $table->text('section_2_description_zh')->nullable();
            $table->text('section_2_image_zh')->nullable();

            $table->text('section_1_title_ja')->nullable();
            $table->text('section_1_sub_title_ja')->nullable();
            $table->text('section_1_description_ja')->nullable();

            $table->text('section_2_title_ja')->nullable();
            $table->text('section_2_description_ja')->nullable();
            $table->text('section_2_image_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issn_partner_contents');
    }
};
