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
        Schema::create('certification_course_contents', function (Blueprint $table) {
            $table->id();

            $table->text('page_name_en');
            $table->text('single_page_name_en')->nullable();
            $table->text('single_page_already_purchased_en')->nullable();
            $table->text('single_page_enroll_now_en')->nullable();
            $table->text('single_page_not_available_en')->nullable();
            $table->text('single_page_login_for_enroll_en')->nullable();
            $table->text('single_page_no_of_modules_en')->nullable();
            $table->text('single_page_course_type_en')->nullable();
            $table->text('single_page_course_duration_en')->nullable();
            $table->text('single_page_course_language_en')->nullable();
            $table->text('single_page_first_tab_en')->nullable();
            $table->text('single_page_second_tab_en')->nullable();
            $table->text('single_page_third_tab_en')->nullable();
            $table->text('single_page_fourth_tab_en')->nullable();
            $table->text('single_page_rated_en')->nullable();
            $table->text('single_page_stars_en')->nullable();
            $table->text('payment_page_name_en')->nullable();
            $table->text('payment_page_title_en')->nullable();
            $table->text('payment_page_one_time_payment_en')->nullable();
            $table->text('payment_page_one_time_payment_start_description_en')->nullable();
            $table->text('payment_page_one_time_payment_end_description_en')->nullable();
            $table->text('payment_page_add_material_en')->nullable();
            $table->text('payment_page_monthly_payment_en')->nullable();
            $table->text('payment_page_per_month_en')->nullable();
            $table->text('payment_page_separate_purchase_en')->nullable();
            $table->text('payment_page_info_description_en')->nullable();
            $table->text('payment_page_order_details_en')->nullable();
            $table->text('payment_page_course_name_en')->nullable();
            $table->text('payment_page_amount_en')->nullable();
            $table->text('payment_page_material_logistics_en')->nullable();
            $table->text('payment_page_sub_total_en')->nullable();
            $table->text('payment_page_discount_en')->nullable();
            $table->text('payment_page_gift_amount_en')->nullable();
            $table->text('payment_page_total_en')->nullable();
            $table->text('payment_page_already_purchased_en')->nullable();
            $table->text('payment_page_pay_en')->nullable();
            $table->text('payment_page_login_for_pay_en')->nullable();

            $table->text('page_name_zh');
            $table->text('single_page_name_zh')->nullable();
            $table->text('single_page_already_purchased_zh')->nullable();
            $table->text('single_page_enroll_now_zh')->nullable();
            $table->text('single_page_not_available_zh')->nullable();
            $table->text('single_page_login_for_enroll_zh')->nullable();
            $table->text('single_page_no_of_modules_zh')->nullable();
            $table->text('single_page_course_type_zh')->nullable();
            $table->text('single_page_course_duration_zh')->nullable();
            $table->text('single_page_course_language_zh')->nullable();
            $table->text('single_page_first_tab_zh')->nullable();
            $table->text('single_page_second_tab_zh')->nullable();
            $table->text('single_page_third_tab_zh')->nullable();
            $table->text('single_page_fourth_tab_zh')->nullable();
            $table->text('single_page_rated_zh')->nullable();
            $table->text('single_page_stars_zh')->nullable();
            $table->text('payment_page_name_zh')->nullable();
            $table->text('payment_page_title_zh')->nullable();
            $table->text('payment_page_one_time_payment_zh')->nullable();
            $table->text('payment_page_one_time_payment_start_description_zh')->nullable();
            $table->text('payment_page_one_time_payment_end_description_zh')->nullable();
            $table->text('payment_page_add_material_zh')->nullable();
            $table->text('payment_page_monthly_payment_zh')->nullable();
            $table->text('payment_page_per_month_zh')->nullable();
            $table->text('payment_page_separate_purchase_zh')->nullable();
            $table->text('payment_page_info_description_zh')->nullable();
            $table->text('payment_page_order_details_zh')->nullable();
            $table->text('payment_page_course_name_zh')->nullable();
            $table->text('payment_page_amount_zh')->nullable();
            $table->text('payment_page_material_logistics_zh')->nullable();
            $table->text('payment_page_sub_total_zh')->nullable();
            $table->text('payment_page_discount_zh')->nullable();
            $table->text('payment_page_gift_amount_zh')->nullable();
            $table->text('payment_page_total_zh')->nullable();
            $table->text('payment_page_already_purchased_zh')->nullable();
            $table->text('payment_page_pay_zh')->nullable();
            $table->text('payment_page_login_for_pay_zh')->nullable();

            $table->text('page_name_ja');
            $table->text('single_page_name_ja')->nullable();
            $table->text('single_page_already_purchased_ja')->nullable();
            $table->text('single_page_enroll_now_ja')->nullable();
            $table->text('single_page_not_available_ja')->nullable();
            $table->text('single_page_login_for_enroll_ja')->nullable();
            $table->text('single_page_no_of_modules_ja')->nullable();
            $table->text('single_page_course_type_ja')->nullable();
            $table->text('single_page_course_duration_ja')->nullable();
            $table->text('single_page_course_language_ja')->nullable();
            $table->text('single_page_first_tab_ja')->nullable();
            $table->text('single_page_second_tab_ja')->nullable();
            $table->text('single_page_third_tab_ja')->nullable();
            $table->text('single_page_fourth_tab_ja')->nullable();
            $table->text('single_page_rated_ja')->nullable();
            $table->text('single_page_stars_ja')->nullable();
            $table->text('payment_page_name_ja')->nullable();
            $table->text('payment_page_title_ja')->nullable();
            $table->text('payment_page_one_time_payment_ja')->nullable();
            $table->text('payment_page_one_time_payment_start_description_ja')->nullable();
            $table->text('payment_page_one_time_payment_end_description_ja')->nullable();
            $table->text('payment_page_add_material_ja')->nullable();
            $table->text('payment_page_monthly_payment_ja')->nullable();
            $table->text('payment_page_per_month_ja')->nullable();
            $table->text('payment_page_separate_purchase_ja')->nullable();
            $table->text('payment_page_info_description_ja')->nullable();
            $table->text('payment_page_order_details_ja')->nullable();
            $table->text('payment_page_course_name_ja')->nullable();
            $table->text('payment_page_amount_ja')->nullable();
            $table->text('payment_page_material_logistics_ja')->nullable();
            $table->text('payment_page_sub_total_ja')->nullable();
            $table->text('payment_page_discount_ja')->nullable();
            $table->text('payment_page_gift_amount_ja')->nullable();
            $table->text('payment_page_total_ja')->nullable();
            $table->text('payment_page_already_purchased_ja')->nullable();
            $table->text('payment_page_pay_ja')->nullable();
            $table->text('payment_page_login_for_pay_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certification_course_contents');
    }
};
