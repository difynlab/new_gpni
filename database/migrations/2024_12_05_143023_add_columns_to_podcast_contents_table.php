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
        Schema::table('podcast_contents', function (Blueprint $table) {
            $table->text('page_name_en')->after('id');
            $table->text('single_podcast_page_name_en')->nullable()->after('page_name_en');
            $table->text('section_2_listen_en')->nullable()->after('section_2_title_en');
            $table->text('section_2_watch_en')->nullable()->after('section_2_listen_en');

            $table->text('page_name_zh')->after('single_podcast_page_name_en');
            $table->text('single_podcast_page_name_zh')->nullable()->after('page_name_zh');
            $table->text('section_2_listen_zh')->nullable()->after('section_2_title_zh');
            $table->text('section_2_watch_zh')->nullable()->after('section_2_listen_zh');

            $table->text('page_name_ja')->after('single_podcast_page_name_zh');
            $table->text('single_podcast_page_name_ja')->nullable()->after('page_name_ja');
            $table->text('section_2_listen_ja')->nullable()->after('section_2_title_ja');
            $table->text('section_2_watch_ja')->nullable()->after('section_2_listen_ja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('podcast_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en',
                'single_podcast_page_name_en',
                'section_2_listen_en',
                'section_2_watch_en',
    
                'page_name_zh',
                'single_podcast_page_name_zh',
                'section_2_listen_zh',
                'section_2_watch_zh',
    
                'page_name_ja',
                'single_podcast_page_name_ja',
                'section_2_listen_ja',
                'section_2_watch_ja',
            ]);
        });
    }
};
