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
        Schema::table('nutritionist_contents', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });

        Schema::table('nutritionist_contents', function (Blueprint $table) {
            $table->text('page_name_en')->after('id');
            $table->text('page_name_zh')->after('page_name_en');
            $table->text('page_name_ja')->after('page_name_zh');

            $table->text('search_en')->nullable();
            $table->text('contact_coach_en')->nullable();
            $table->text('qualified_coach_en')->nullable();
            $table->text('age_en')->nullable();
            $table->text('credentials_en')->nullable();
            $table->text('cec_status_en')->nullable();
            $table->text('active_en')->nullable();
            $table->text('inactive_en')->nullable();
            $table->text('view_profile_en')->nullable();
            $table->text('country_en')->nullable();
            $table->text('choose_country_en')->nullable();
            $table->text('city_en')->nullable();
            $table->text('phone_en')->nullable();
            $table->text('email_en')->nullable();
            $table->text('app_chat_en')->nullable();
            $table->text('choose_app_chat_en')->nullable();
            $table->text('app_chat_first_en')->nullable();
            $table->text('app_chat_second_en')->nullable();
            $table->text('app_chat_third_en')->nullable();
            $table->text('app_chat_fourth_en')->nullable();
            $table->text('app_chat_id_en')->nullable();
            $table->text('button_en')->nullable();
            $table->text('coach_name_en')->nullable();
            $table->text('certificate_number_en')->nullable();
            $table->text('membership_credential_status_en')->nullable();
            $table->text('area_of_interest_en')->nullable();
            $table->text('self_introduction_en')->nullable();

            $table->text('search_zh')->nullable();
            $table->text('contact_coach_zh')->nullable();
            $table->text('qualified_coach_zh')->nullable();
            $table->text('age_zh')->nullable();
            $table->text('credentials_zh')->nullable();
            $table->text('cec_status_zh')->nullable();
            $table->text('active_zh')->nullable();
            $table->text('inactive_zh')->nullable();
            $table->text('view_profile_zh')->nullable();
            $table->text('country_zh')->nullable();
            $table->text('choose_country_zh')->nullable();
            $table->text('city_zh')->nullable();
            $table->text('phone_zh')->nullable();
            $table->text('email_zh')->nullable();
            $table->text('app_chat_zh')->nullable();
            $table->text('choose_app_chat_zh')->nullable();
            $table->text('app_chat_first_zh')->nullable();
            $table->text('app_chat_second_zh')->nullable();
            $table->text('app_chat_third_zh')->nullable();
            $table->text('app_chat_fourth_zh')->nullable();
            $table->text('app_chat_id_zh')->nullable();
            $table->text('button_zh')->nullable();
            $table->text('coach_name_zh')->nullable();
            $table->text('certificate_number_zh')->nullable();
            $table->text('membership_credential_status_zh')->nullable();
            $table->text('area_of_interest_zh')->nullable();
            $table->text('self_introduction_zh')->nullable();

            $table->text('search_ja')->nullable();
            $table->text('contact_coach_ja')->nullable();
            $table->text('qualified_coach_ja')->nullable();
            $table->text('age_ja')->nullable();
            $table->text('credentials_ja')->nullable();
            $table->text('cec_status_ja')->nullable();
            $table->text('active_ja')->nullable();
            $table->text('inactive_ja')->nullable();
            $table->text('view_profile_ja')->nullable();
            $table->text('country_ja')->nullable();
            $table->text('choose_country_ja')->nullable();
            $table->text('city_ja')->nullable();
            $table->text('phone_ja')->nullable();
            $table->text('email_ja')->nullable();
            $table->text('app_chat_ja')->nullable();
            $table->text('choose_app_chat_ja')->nullable();
            $table->text('app_chat_first_ja')->nullable();
            $table->text('app_chat_second_ja')->nullable();
            $table->text('app_chat_third_ja')->nullable();
            $table->text('app_chat_fourth_ja')->nullable();
            $table->text('app_chat_id_ja')->nullable();
            $table->text('button_ja')->nullable();
            $table->text('coach_name_ja')->nullable();
            $table->text('certificate_number_ja')->nullable();
            $table->text('membership_credential_status_ja')->nullable();
            $table->text('area_of_interest_ja')->nullable();
            $table->text('self_introduction_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nutritionist_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en',
                'page_name_zh',
                'page_name_ja',
                'search_en',
                'contact_coach_en',
                'qualified_coach_en',
                'age_en',
                'credentials_en',
                'cec_status_en',
                'active_en',
                'inactive_en',
                'view_profile_en',
                'country_en',
                'choose_country_en',
                'city_en',
                'phone_en',
                'email_en',
                'app_chat_en',
                'choose_app_chat_en',
                'app_chat_first_en',
                'app_chat_second_en',
                'app_chat_third_en',
                'app_chat_fourth_en',
                'app_chat_id_en',
                'button_en',
                'coach_name_en',
                'certificate_number_en',
                'membership_credential_status_en',
                'area_of_interest_en',
                'self_introduction_en',
                'search_zh',
                'contact_coach_zh',
                'qualified_coach_zh',
                'age_zh',
                'credentials_zh',
                'cec_status_zh',
                'active_zh',
                'inactive_zh',
                'view_profile_zh',
                'country_zh',
                'choose_country_zh',
                'city_zh',
                'phone_zh',
                'email_zh',
                'app_chat_zh',
                'choose_app_chat_zh',
                'app_chat_first_zh',
                'app_chat_second_zh',
                'app_chat_third_zh',
                'app_chat_fourth_zh',
                'app_chat_id_zh',
                'button_zh',
                'coach_name_zh',
                'certificate_number_zh',
                'membership_credential_status_zh',
                'area_of_interest_zh',
                'self_introduction_zh',
                'search_ja',
                'contact_coach_ja',
                'qualified_coach_ja',
                'age_ja',
                'credentials_ja',
                'cec_status_ja',
                'active_ja',
                'inactive_ja',
                'view_profile_ja',
                'country_ja',
                'choose_country_ja',
                'city_ja',
                'phone_ja',
                'email_ja',
                'app_chat_ja',
                'choose_app_chat_ja',
                'app_chat_first_ja',
                'app_chat_second_ja',
                'app_chat_third_ja',
                'app_chat_fourth_ja',
                'app_chat_id_ja',
                'button_ja',
                'coach_name_ja',
                'certificate_number_ja',
                'membership_credential_status_ja',
                'area_of_interest_ja',
                'self_introduction_ja',
            ]);
    
            $table->dropTimestamps();
        });

        Schema::table('nutritionist_contents', function (Blueprint $table) {
            $table->timestamps();
        });
    }
};
