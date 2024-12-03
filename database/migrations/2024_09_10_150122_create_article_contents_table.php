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
        Schema::create('article_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_social_title_en')->nullable();
            $table->text('section_1_newsletter_title_en')->nullable();
            $table->text('section_1_newsletter_description_en')->nullable();
            $table->text('section_1_newsletter_placeholder_en')->nullable();
            $table->text('section_1_newsletter_button_en')->nullable();
            $table->text('section_2_title_en')->nullable();
            $table->text('section_2_description_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->text('section_1_social_title_zh')->nullable();
            $table->text('section_1_newsletter_title_zh')->nullable();
            $table->text('section_1_newsletter_description_zh')->nullable();
            $table->text('section_1_newsletter_placeholder_zh')->nullable();
            $table->text('section_1_newsletter_button_zh')->nullable();
            $table->text('section_2_title_zh')->nullable();
            $table->text('section_2_description_zh')->nullable();

            $table->text('section_1_title_ja')->nullable();
            $table->text('section_1_social_title_ja')->nullable();
            $table->text('section_1_newsletter_title_ja')->nullable();
            $table->text('section_1_newsletter_description_ja')->nullable();
            $table->text('section_1_newsletter_placeholder_ja')->nullable();
            $table->text('section_1_newsletter_button_ja')->nullable();
            $table->text('section_2_title_ja')->nullable();
            $table->text('section_2_description_ja')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_contents');
    }
};
