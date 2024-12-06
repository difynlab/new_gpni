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
        Schema::table('article_contents', function (Blueprint $table) {
            $table->text('page_name_en')->after('id');
            $table->text('single_article_page_name_en')->nullable()->after('page_name_en');
            $table->text('single_article_author_en')->nullable()->after('single_article_page_name_en');

            $table->text('page_name_zh')->after('single_article_author_en');
            $table->text('single_article_page_name_zh')->nullable()->after('page_name_zh');
            $table->text('single_article_author_zh')->nullable()->after('single_article_page_name_zh');

            $table->text('page_name_ja')->after('single_article_author_zh');
            $table->text('single_article_page_name_ja')->nullable()->after('page_name_ja');
            $table->text('single_article_author_ja')->nullable()->after('single_article_page_name_ja');

            $table->text('section_1_first_tab_en')->nullable()->after('section_1_title_en');
            $table->text('section_1_second_tab_en')->nullable()->after('section_1_first_tab_en');
            $table->text('section_1_read_en')->nullable()->after('section_1_second_tab_en');
            $table->text('section_1_trend_en')->nullable()->after('section_1_read_en');

            $table->text('section_1_first_tab_zh')->nullable()->after('section_1_title_zh');
            $table->text('section_1_second_tab_zh')->nullable()->after('section_1_first_tab_zh');
            $table->text('section_1_read_zh')->nullable()->after('section_1_second_tab_zh');
            $table->text('section_1_trend_zh')->nullable()->after('section_1_read_zh');

            $table->text('section_1_first_tab_ja')->nullable()->after('section_1_title_ja');
            $table->text('section_1_second_tab_ja')->nullable()->after('section_1_first_tab_ja');
            $table->text('section_1_read_ja')->nullable()->after('section_1_second_tab_ja');
            $table->text('section_1_trend_ja')->nullable()->after('section_1_read_ja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('article_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en', 'page_name_zh', 'page_name_ja',
                'single_article_page_name_en', 'single_article_page_name_zh', 'single_article_page_name_ja',
                'single_article_author_en', 'single_article_author_zh', 'single_article_author_ja',

                'section_1_first_tab_en', 
                'section_1_second_tab_en', 
                'section_1_read_en', 
                'section_1_trend_en',

                'section_1_first_tab_zh', 
                'section_1_second_tab_zh', 
                'section_1_read_zh', 
                'section_1_trend_zh',

                'section_1_first_tab_ja', 
                'section_1_second_tab_ja', 
                'section_1_read_ja', 
                'section_1_trend_ja',
            ]);
        });
    }
};