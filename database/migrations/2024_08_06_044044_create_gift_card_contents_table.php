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
        Schema::create('gift_card_contents', function (Blueprint $table) {
            $table->id();

            $table->text('title_en')->nullable();
            $table->text('sub_title_en')->nullable();
            $table->text('description_en')->nullable();
            $table->text('images_en')->nullable();
            $table->text('button_en')->nullable();

            $table->text('title_zh')->nullable();
            $table->text('sub_title_zh')->nullable();
            $table->text('description_zh')->nullable();
            $table->text('images_zh')->nullable();
            $table->text('button_zh')->nullable();

            $table->text('title_ja')->nullable();
            $table->text('sub_title_ja')->nullable();
            $table->text('description_ja')->nullable();
            $table->text('images_ja')->nullable();
            $table->text('button_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_card_contents');
    }
};
