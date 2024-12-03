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
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['Image', 'Video', 'Vimeo Video Link', 'PDF', 'Word', 'Excel', 'PPT', 'Audio'])->index();
            $table->enum('location', ['Student Center', 'Member Corner']);
            $table->enum('language', ['English', 'Chinese', 'Japanese']);

            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('vimeo_video_link')->nullable();
            $table->string('pdf')->nullable();
            $table->string('word')->nullable();
            $table->string('excel')->nullable();
            $table->string('ppt')->nullable();
            $table->string('audio')->nullable();

            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};
