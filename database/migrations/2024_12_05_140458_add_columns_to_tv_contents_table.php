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
        Schema::table('tv_contents', function (Blueprint $table) {
            $table->text('page_name_en')->after('id');
            $table->text('page_name_zh')->after('page_name_en');
            $table->text('page_name_ja')->after('page_name_zh');

            $table->text('section_11_instagram_en')->nullable()->after('section_11_sub_title_en');
            $table->text('section_11_twitter_en')->nullable()->after('section_11_instagram_en');
            $table->text('section_11_linkedin_en')->nullable()->after('section_11_twitter_en');
            $table->text('section_11_youtube_en')->nullable()->after('section_11_linkedin_en');
            $table->text('section_11_facebook_en')->nullable()->after('section_11_youtube_en');

            $table->text('section_11_instagram_zh')->nullable()->after('section_11_sub_title_zh');
            $table->text('section_11_twitter_zh')->nullable()->after('section_11_instagram_zh');
            $table->text('section_11_linkedin_zh')->nullable()->after('section_11_twitter_zh');
            $table->text('section_11_youtube_zh')->nullable()->after('section_11_linkedin_zh');
            $table->text('section_11_facebook_zh')->nullable()->after('section_11_youtube_zh');

            $table->text('section_11_instagram_ja')->nullable()->after('section_11_sub_title_ja');
            $table->text('section_11_twitter_ja')->nullable()->after('section_11_instagram_ja');
            $table->text('section_11_linkedin_ja')->nullable()->after('section_11_twitter_ja');
            $table->text('section_11_youtube_ja')->nullable()->after('section_11_linkedin_ja');
            $table->text('section_11_facebook_ja')->nullable()->after('section_11_youtube_ja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tv_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en', 'page_name_zh', 'page_name_ja',
    
                'section_11_instagram_en', 'section_11_twitter_en', 'section_11_linkedin_en', 'section_11_youtube_en', 'section_11_facebook_en',
                'section_11_instagram_zh', 'section_11_twitter_zh', 'section_11_linkedin_zh', 'section_11_youtube_zh', 'section_11_facebook_zh',
                'section_11_instagram_ja', 'section_11_twitter_ja', 'section_11_linkedin_ja', 'section_11_youtube_ja', 'section_11_facebook_ja',
            ]);
        });
    }
};
