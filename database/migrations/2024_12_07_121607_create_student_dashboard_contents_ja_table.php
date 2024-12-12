<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_dashboard_contents_ja', function (Blueprint $table) {
            $table->id();

            $columns = [
                'sidebar_dashboard',
                'sidebar_student_profile',
                'sidebar_courses',
                'sidebar_qualifications',
                'sidebar_my_storage',
                'sidebar_buy_study_material',
                'sidebar_member_corner',
                'sidebar_ask_the_experts',
                'sidebar_technical_supports',
                'sidebar_refer_friends',

                'dashboard_welcome',
                'dashboard_profile',
                'dashboard_profile_description',
                'dashboard_change_password',
                'dashboard_change_password_description',
                'dashboard_courses',
                'dashboard_courses_description',
                'dashboard_billing_centre',
                'dashboard_billing_centre_description',

                'change_password_title',
                'change_password_sub_title',
                'change_password_rule_title',
                'change_password_rule_1_title',
                'change_password_rule_1_description',
                'change_password_rule_2_title',
                'change_password_rule_2_description',
                'change_password_rule_3_title',
                'change_password_rule_3_description',
                'change_password_rule_4_title',
                'change_password_rule_4_description',
                'change_password_rule_5_title',
                'change_password_rule_5_description',
                'change_password_new_password',
                'change_password_confirm_password',
                'change_password_button',

                'my_orders_title',
                'my_orders_first_tab',
                'my_orders_second_tab',
                'my_orders_third_tab',
                'my_orders_fourth_tab',
                'my_orders_fifth_tab',
                'my_orders_no_records',

                'student_profile_title',
                'student_profile_sub_title',
                'student_profile_personal_details',
                'student_profile_personal_first_name',
                'student_profile_personal_last_name',
                'student_profile_personal_email',
                'student_profile_personal_language',
                'student_profile_personal_first_language',
                'student_profile_personal_second_language',
                'student_profile_personal_third_language',
                'student_profile_personal_phone',
                'student_profile_personal_subscribe',
                'student_profile_primary_details',
                'student_profile_primary_name',
                'student_profile_primary_address',
                'student_profile_primary_unit_suite',
                'student_profile_primary_city',
                'student_profile_primary_country',
                'student_profile_primary_state_province',
                'student_profile_primary_zip_postal',
                'student_profile_primary_contact_number',
                'student_profile_primary_fax',
                'student_profile_primary_email',
                'student_profile_primary_secondary_email',
                'student_profile_primary_website',
                'student_profile_member_stats',
                'student_profile_member_age',
                'student_profile_member_select_age',
                'student_profile_member_first_age',
                'student_profile_member_second_age',
                'student_profile_member_third_age',
                'student_profile_member_fourth_age',
                'student_profile_member_fifth_age',
                'student_profile_member_area',
                'student_profile_member_select_area',
                'student_profile_member_first_area',
                'student_profile_member_second_area',
                'student_profile_member_third_area',
                'student_profile_member_fourth_area',
                'student_profile_member_fifth_area',
                'student_profile_member_sixth_area',
                'student_profile_member_occupation',
                'student_profile_member_select_occupation',
                'student_profile_member_first_occupation',
                'student_profile_member_second_occupation',
                'student_profile_member_third_occupation',
                'student_profile_member_fourth_occupation',
                'student_profile_member_fifth_occupation',
                'student_profile_member_sixth_occupation',
                'student_profile_member_messenger',
                'student_profile_member_select_messenger',
                'student_profile_member_first_messenger',
                'student_profile_member_second_messenger',
                'student_profile_member_third_messenger',
                'student_profile_member_messenger_app',
                'student_profile_member_hear',
                'student_profile_member_select_hear',
                'student_profile_member_first_hear',
                'student_profile_member_second_hear',
                'student_profile_member_third_hear',
                'student_profile_member_fourth_hear',
                'student_profile_self',
                'student_profile_self_placeholder',
                'student_profile_image',
                'student_profile_button',

                'courses_title',
                'courses_started',
                'courses_completed',
                'courses_not_yet',
                'courses_inprogress',
                'courses_view_details',
                'courses_no_courses',
                'courses_pending',
                'courses_view_results',
                'courses_module_exam_completed',
                'courses_module_exam_completed_tooltip',
                'courses_module_take_again',
                'courses_module_take_again_tooltip',
                'courses_module_take_module_exam',
                'courses_module_take_module_exam_tooltip',
                'courses_module_exam_locked',
                'courses_module_exam_locked_tooltip',
                'courses_module_chapters',
                'courses_final_exam_completed',
                'courses_final_exam_completed_tooltip',
                'courses_final_take_again',
                'courses_final_take_again_tooltip',
                'courses_final_take_final_exam',
                'courses_final_take_final_exam_tooltip',
                'courses_final_exam_locked',
                'courses_final_exam_locked_tooltip',
                'courses_no_modules',
                'courses_return',
                'courses_about',
                'courses_content',
                'courses_guides',
                'courses_download',
                'courses_course_book',
                'courses_course_video',
                'courses_video_links',
                'courses_no_guides',
                'courses_additional_resources',
                'courses_additional_videos',
                'courses_additional_video_links',
                'courses_additional_presentation_medias',
                'courses_additional_download_resources',
                'courses_no_additional_resources',
                'courses_exam_start_modal_title',
                'courses_exam_start_modal_description',
                'courses_exam_start_modal_instructions',
                'courses_exam_start_modal_start_exam',
                'courses_exam_instructions',
                'courses_exam_remaining_time',
                'courses_exam_previous',
                'courses_exam_next',
                'courses_exam_remaining_questions',
                'courses_exam_attempted',
                'courses_exam_not_attempted',
                'courses_exam_incomplete',
                'courses_exam_finish_exam',
                'courses_exam_submit_modal_title',
                'courses_exam_submit_modal_description',
                'courses_exam_time_modal_title',
                'courses_exam_time_modal_description',
                'courses_exam_success_modal_title',
                'courses_exam_success_modal_description',
                'courses_exam_modal_close',
                'courses_exam_modal_confirm',
                'courses_exam_result_title',
                'courses_exam_result_total_questions',
                'courses_exam_result_total_correct_answers',
                'courses_exam_result_total_unattended_answers',
                'courses_exam_result_marks',
                'courses_exam_result_result',
                'courses_exam_result_pass',
                'courses_exam_result_fail',
                'courses_exam_result_correct_answer',
                'courses_exam_result_incorrect_answer',
                'courses_exam_result_un_attempted',

                'qualifications_title',
                'qualifications_search',
                'qualifications_download',
                'qualifications_issued',
                'qualifications_no_certificates',

                'my_storage_title',
                'member_corner_title',
                'my_storage_corner_first_tab',
                'my_storage_corner_second_tab',
                'my_storage_corner_third_tab',
                'my_storage_corner_fourth_tab',
                'my_storage_corner_fifth_tab',
                'my_storage_corner_sixth_tab',
                'my_storage_corner_seventh_tab',
                'my_storage_corner_eighth_tab',
                'my_storage_corner_ninth_tab',
                'my_storage_corner_first_column',
                'my_storage_corner_second_column',
                'my_storage_corner_third_column',
                'my_storage_corner_watch_on_vimeo',
                'my_storage_corner_download',

                'buy_study_material_title',
                'buy_study_material_select',
                'buy_study_material_choose',
                'buy_study_material_button',

                'ask_the_experts_title',
                'ask_the_experts_sub_title',
                'ask_the_experts_subject',
                'ask_the_experts_subject_placeholder',
                'ask_the_experts_initial_message',
                'ask_the_experts_initial_message_placeholder',
                'ask_the_experts_button',
                'ask_the_experts_history_title',
                'ask_the_experts_history_sub_title',
                'ask_the_experts_history_answered',
                'ask_the_experts_history_unanswered',
                'ask_the_experts_chat_title',
                'ask_the_experts_chat_sub_title',
                'ask_the_experts_chat_leave_message',
                'ask_the_experts_chat_leave_message_placeholder',
                'ask_the_experts_chat_button',

                'technical_supports_title',
                'technical_supports_subject',
                'technical_supports_message',
                'technical_supports_button',

                'refer_friends_title',
                'refer_friends_email',
                'refer_friends_email_placeholder',
                'refer_friends_button',
                'refer_friends_view_history',
                'refer_friends_first_column',
                'refer_friends_second_column',
                'refer_friends_no_data',
            ];

            foreach($columns as $column) {
                $table->text("{$column}")->nullable();
            }

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_dashboard_contents_ja');
    }
};
