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
        Schema::create('podcast_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title_en')->nullable();
            $table->text('section_2_title_en')->nullable();
            $table->text('section_3_title_en')->nullable();
            $table->text('section_3_description_en')->nullable();
            $table->text('section_3_labels_links_en')->nullable();
            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_description_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->text('section_2_title_zh')->nullable();
            $table->text('section_3_title_zh')->nullable();
            $table->text('section_3_description_zh')->nullable();
            $table->text('section_3_labels_links_zh')->nullable();
            $table->text('section_4_title_zh')->nullable();
            $table->text('section_4_description_zh')->nullable();

            $table->text('section_1_title_ja')->nullable();
            $table->text('section_2_title_ja')->nullable();
            $table->text('section_3_title_ja')->nullable();
            $table->text('section_3_description_ja')->nullable();
            $table->text('section_3_labels_links_ja')->nullable();
            $table->text('section_4_title_ja')->nullable();
            $table->text('section_4_description_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('podcast_contents');
    }
};
