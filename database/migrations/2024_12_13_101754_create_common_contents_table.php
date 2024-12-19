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
        Schema::create('common_contents', function (Blueprint $table) {
            $table->id();

            $table->text('header_second_tab_en')->nullable();
            $table->text('header_third_tab_en')->nullable();
            $table->text('header_fourth_tab_en')->nullable();
            $table->text('header_login_en')->nullable();
            $table->text('header_user_dashboard_en')->nullable();
            $table->text('header_user_logout_en')->nullable();
            $table->text('footer_powered_en')->nullable();
            $table->text('footer_get_in_touch_en')->nullable();
            $table->text('footer_instagram_en')->nullable();
            $table->text('footer_facebook_en')->nullable();
            $table->text('footer_youtube_en')->nullable();
            $table->text('footer_twitter_en')->nullable();
            $table->text('footer_linkedin_en')->nullable();
            $table->text('footer_get_latest_en')->nullable();
            $table->text('footer_placeholder_en')->nullable();
            $table->text('footer_button_en')->nullable();
            $table->text('footer_about_en')->nullable();
            $table->text('footer_education_en')->nullable();
            $table->text('footer_partners_en')->nullable();
            $table->text('footer_other_en')->nullable();
            $table->text('footer_country_en')->nullable();
            $table->text('footer_copyright_en')->nullable();
            $table->text('captcha_title_en')->nullable();
            $table->text('captcha_button_en')->nullable();

            $table->text('header_second_tab_zh')->nullable();
            $table->text('header_third_tab_zh')->nullable();
            $table->text('header_fourth_tab_zh')->nullable();
            $table->text('header_login_zh')->nullable();
            $table->text('header_user_dashboard_zh')->nullable();
            $table->text('header_user_logout_zh')->nullable();
            $table->text('footer_powered_zh')->nullable();
            $table->text('footer_get_in_touch_zh')->nullable();
            $table->text('footer_instagram_zh')->nullable();
            $table->text('footer_facebook_zh')->nullable();
            $table->text('footer_youtube_zh')->nullable();
            $table->text('footer_twitter_zh')->nullable();
            $table->text('footer_linkedin_zh')->nullable();
            $table->text('footer_get_latest_zh')->nullable();
            $table->text('footer_placeholder_zh')->nullable();
            $table->text('footer_button_zh')->nullable();
            $table->text('footer_about_zh')->nullable();
            $table->text('footer_education_zh')->nullable();
            $table->text('footer_partners_zh')->nullable();
            $table->text('footer_other_zh')->nullable();
            $table->text('footer_country_zh')->nullable();
            $table->text('footer_copyright_zh')->nullable();
            $table->text('captcha_title_zh')->nullable();
            $table->text('captcha_button_zh')->nullable();

            $table->text('header_second_tab_ja')->nullable();
            $table->text('header_third_tab_ja')->nullable();
            $table->text('header_fourth_tab_ja')->nullable();
            $table->text('header_login_ja')->nullable();
            $table->text('header_user_dashboard_ja')->nullable();
            $table->text('header_user_logout_ja')->nullable();
            $table->text('footer_powered_ja')->nullable();
            $table->text('footer_get_in_touch_ja')->nullable();
            $table->text('footer_instagram_ja')->nullable();
            $table->text('footer_facebook_ja')->nullable();
            $table->text('footer_youtube_ja')->nullable();
            $table->text('footer_twitter_ja')->nullable();
            $table->text('footer_linkedin_ja')->nullable();
            $table->text('footer_get_latest_ja')->nullable();
            $table->text('footer_placeholder_ja')->nullable();
            $table->text('footer_button_ja')->nullable();
            $table->text('footer_about_ja')->nullable();
            $table->text('footer_education_ja')->nullable();
            $table->text('footer_partners_ja')->nullable();
            $table->text('footer_other_ja')->nullable();
            $table->text('footer_country_ja')->nullable();
            $table->text('footer_copyright_ja')->nullable();
            $table->text('captcha_title_ja')->nullable();
            $table->text('captcha_button_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_contents');
    }
};
