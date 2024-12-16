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
        Schema::table('master_class_contents', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });

        Schema::table('master_class_contents', function (Blueprint $table) {
            $table->text('page_name_en')->after('id');
            $table->text('single_master_class_page_name_en')->nullable()->after('page_name_en');
            $table->text('page_name_zh')->after('page_name_en');
            $table->text('single_master_class_page_name_zh')->nullable()->after('page_name_zh');
            $table->text('page_name_ja')->after('page_name_zh');
            $table->text('single_master_class_page_name_ja')->nullable()->after('page_name_ja');

            $table->text('section_1_search_en')->nullable()->after('section_1_title_en');
            $table->text('section_2_first_tab_en')->nullable()->after('section_1_description_en');
            $table->text('section_2_second_tab_en')->nullable()->after('section_2_first_tab_en');
            $table->text('section_2_learn_en')->nullable()->after('section_2_second_tab_en');
            $table->text('section_2_enroll_en')->nullable()->after('section_2_learn_en');
            $table->text('section_2_no_all_courses_en')->nullable()->after('section_2_enroll_en');
            $table->text('section_2_no_upcoming_courses_en')->nullable()->after('section_2_no_all_courses_en');

            $table->text('section_1_search_zh')->nullable()->after('section_1_title_zh');
            $table->text('section_2_first_tab_zh')->nullable()->after('section_1_description_zh');
            $table->text('section_2_second_tab_zh')->nullable()->after('section_2_first_tab_zh');
            $table->text('section_2_learn_zh')->nullable()->after('section_2_second_tab_zh');
            $table->text('section_2_enroll_zh')->nullable()->after('section_2_learn_zh');
            $table->text('section_2_no_all_courses_zh')->nullable()->after('section_2_enroll_zh');
            $table->text('section_2_no_upcoming_courses_zh')->nullable()->after('section_2_no_all_courses_zh');

            $table->text('section_1_search_ja')->nullable()->after('section_1_title_ja');
            $table->text('section_2_first_tab_ja')->nullable()->after('section_1_description_ja');
            $table->text('section_2_second_tab_ja')->nullable()->after('section_2_first_tab_ja');
            $table->text('section_2_learn_ja')->nullable()->after('section_2_second_tab_ja');
            $table->text('section_2_enroll_ja')->nullable()->after('section_2_learn_ja');
            $table->text('section_2_no_all_courses_ja')->nullable()->after('section_2_enroll_ja');
            $table->text('section_2_no_upcoming_courses_ja')->nullable()->after('section_2_no_all_courses_ja');

            $table->text('course_duration_en')->nullable();
            $table->text('language_en')->nullable();
            $table->text('course_type_en')->nullable();
            $table->text('no_of_modules_en')->nullable();
            $table->text('no_of_students_enrolled_en')->nullable();
            $table->text('by_en')->nullable();
            $table->text('already_purchased_en')->nullable();
            $table->text('enroll_now_en')->nullable();
            $table->text('login_for_enroll_en')->nullable();
            $table->text('first_tab_en')->nullable();
            $table->text('second_tab_en')->nullable();
            $table->text('third_tab_en')->nullable();
            $table->text('fourth_tab_en')->nullable();
            $table->text('first_language_en')->nullable();
            $table->text('second_language_en')->nullable();
            $table->text('third_language_en')->nullable();
            $table->text('instagram_en')->nullable();
            $table->text('twitter_en')->nullable();
            $table->text('linkedin_en')->nullable();
            $table->text('youtube_en')->nullable();
            $table->text('facebook_en')->nullable();
            $table->text('rated_en')->nullable();
            $table->text('stars_en')->nullable();

            $table->text('course_duration_zh')->nullable();
            $table->text('language_zh')->nullable();
            $table->text('course_type_zh')->nullable();
            $table->text('no_of_modules_zh')->nullable();
            $table->text('no_of_students_enrolled_zh')->nullable();
            $table->text('by_zh')->nullable();
            $table->text('already_purchased_zh')->nullable();
            $table->text('enroll_now_zh')->nullable();
            $table->text('login_for_enroll_zh')->nullable();
            $table->text('first_tab_zh')->nullable();
            $table->text('second_tab_zh')->nullable();
            $table->text('third_tab_zh')->nullable();
            $table->text('fourth_tab_zh')->nullable();
            $table->text('first_language_zh')->nullable();
            $table->text('second_language_zh')->nullable();
            $table->text('third_language_zh')->nullable();
            $table->text('instagram_zh')->nullable();
            $table->text('twitter_zh')->nullable();
            $table->text('linkedin_zh')->nullable();
            $table->text('youtube_zh')->nullable();
            $table->text('facebook_zh')->nullable();
            $table->text('rated_zh')->nullable();
            $table->text('stars_zh')->nullable();

            $table->text('course_duration_ja')->nullable();
            $table->text('language_ja')->nullable();
            $table->text('course_type_ja')->nullable();
            $table->text('no_of_modules_ja')->nullable();
            $table->text('no_of_students_enrolled_ja')->nullable();
            $table->text('by_ja')->nullable();
            $table->text('already_purchased_ja')->nullable();
            $table->text('enroll_now_ja')->nullable();
            $table->text('login_for_enroll_ja')->nullable();
            $table->text('first_tab_ja')->nullable();
            $table->text('second_tab_ja')->nullable();
            $table->text('third_tab_ja')->nullable();
            $table->text('fourth_tab_ja')->nullable();
            $table->text('first_language_ja')->nullable();
            $table->text('second_language_ja')->nullable();
            $table->text('third_language_ja')->nullable();
            $table->text('instagram_ja')->nullable();
            $table->text('twitter_ja')->nullable();
            $table->text('linkedin_ja')->nullable();
            $table->text('youtube_ja')->nullable();
            $table->text('facebook_ja')->nullable();
            $table->text('rated_ja')->nullable();
            $table->text('stars_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_class_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en', 
                'single_master_class_page_name_en',
                'page_name_zh', 
                'single_master_class_page_name_zh',
                'page_name_ja', 
                'single_master_class_page_name_ja',

                'section_1_search_en', 
                'section_2_first_tab_en', 
                'section_2_second_tab_en', 
                'section_2_learn_en', 
                'section_2_enroll_en', 
                'section_2_no_all_courses_en', 
                'section_2_no_upcoming_courses_en',

                'section_1_search_zh', 
                'section_2_first_tab_zh', 
                'section_2_second_tab_zh', 
                'section_2_learn_zh', 
                'section_2_enroll_zh', 
                'section_2_no_all_courses_zh', 
                'section_2_no_upcoming_courses_zh',

                'section_1_search_ja', 
                'section_2_first_tab_ja', 
                'section_2_second_tab_ja', 
                'section_2_learn_ja', 
                'section_2_enroll_ja', 
                'section_2_no_all_courses_ja', 
                'section_2_no_upcoming_courses_ja',

                'course_duration_en',
                'language_en',
                'course_type_en',
                'no_of_modules_en',
                'no_of_students_enrolled_en',
                'by_en',
                'already_purchased_en',
                'enroll_now_en',
                'login_for_enroll_en',
                'first_tab_en',
                'second_tab_en',
                'third_tab_en',
                'fourth_tab_en',
                'first_language_en',
                'second_language_en',
                'third_language_en',
                'instagram_en',
                'twitter_en',
                'linkedin_en',
                'youtube_en',
                'facebook_en',

                'course_duration_zh',
                'language_zh',
                'course_type_zh',
                'no_of_modules_zh',
                'no_of_students_enrolled_zh',
                'by_zh',
                'already_purchased_zh',
                'enroll_now_zh',
                'login_for_enroll_zh',
                'first_tab_zh',
                'second_tab_zh',
                'third_tab_zh',
                'fourth_tab_zh',
                'first_language_zh',
                'second_language_zh',
                'third_language_zh',
                'instagram_zh',
                'twitter_zh',
                'linkedin_zh',
                'youtube_zh',
                'facebook_zh',

                'course_duration_ja',
                'language_ja',
                'course_type_ja',
                'no_of_modules_ja',
                'no_of_students_enrolled_ja',
                'by_ja',
                'already_purchased_ja',
                'enroll_now_ja',
                'login_for_enroll_ja',
                'first_tab_ja',
                'second_tab_ja',
                'third_tab_ja',
                'fourth_tab_ja',
                'first_language_ja',
                'second_language_ja',
                'third_language_ja',
                'instagram_ja',
                'twitter_ja',
                'linkedin_ja',
                'youtube_ja',
                'facebook_ja',
            ]);

            $table->dropTimestamps();
        });

        Schema::table('master_class_contents', function (Blueprint $table) {
            $table->timestamps();
        });
    }
};