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
        Schema::create('authentication_contents', function (Blueprint $table) {
            $table->id();

            $table->text('login_page_name_en');
            $table->text('login_page_title_en')->nullable();
            $table->text('login_page_sub_title_en')->nullable();
            $table->text('login_page_username_en')->nullable();
            $table->text('login_page_password_en')->nullable();
            $table->text('login_page_remember_password_en')->nullable();
            $table->text('login_page_forgot_password_en')->nullable();
            $table->text('login_page_button_en')->nullable();
            $table->text('login_page_no_account_en')->nullable();
            $table->text('login_page_register_en')->nullable();
            $table->text('register_page_name_en');
            $table->text('register_page_title_en')->nullable();
            $table->text('register_page_sub_title_en')->nullable();
            $table->text('register_page_login_en')->nullable();
            $table->text('register_page_first_name_en')->nullable();
            $table->text('register_page_last_name_en')->nullable();
            $table->text('register_page_country_en')->nullable();
            $table->text('register_page_country_select_en')->nullable();
            $table->text('register_page_email_en')->nullable();
            $table->text('register_page_password_en')->nullable();
            $table->text('register_page_confirm_password_en')->nullable();
            $table->text('register_page_language_en')->nullable();
            $table->text('register_page_language_select_en')->nullable();
            $table->text('register_page_first_language_en')->nullable();
            $table->text('register_page_second_language_en')->nullable();
            $table->text('register_page_third_language_en')->nullable();
            $table->text('register_page_button_en')->nullable();
            $table->text('forgot_page_name_en');
            $table->text('forgot_page_title_en')->nullable();
            $table->text('forgot_page_sub_title_en')->nullable();
            $table->text('forgot_page_email_en')->nullable();
            $table->text('forgot_page_button_en')->nullable();
            $table->text('reset_page_name_en');
            $table->text('reset_page_title_en')->nullable();
            $table->text('reset_page_sub_title_en')->nullable();
            $table->text('reset_page_new_password_en')->nullable();
            $table->text('reset_page_confirm_password_en')->nullable();
            $table->text('reset_page_button_en')->nullable();


            $table->text('login_page_name_zh');
            $table->text('login_page_title_zh')->nullable();
            $table->text('login_page_sub_title_zh')->nullable();
            $table->text('login_page_username_zh')->nullable();
            $table->text('login_page_password_zh')->nullable();
            $table->text('login_page_remember_password_zh')->nullable();
            $table->text('login_page_forgot_password_zh')->nullable();
            $table->text('login_page_button_zh')->nullable();
            $table->text('login_page_no_account_zh')->nullable();
            $table->text('login_page_register_zh')->nullable();
            $table->text('register_page_name_zh');
            $table->text('register_page_title_zh')->nullable();
            $table->text('register_page_sub_title_zh')->nullable();
            $table->text('register_page_login_zh')->nullable();
            $table->text('register_page_first_name_zh')->nullable();
            $table->text('register_page_last_name_zh')->nullable();
            $table->text('register_page_country_zh')->nullable();
            $table->text('register_page_country_select_zh')->nullable();
            $table->text('register_page_email_zh')->nullable();
            $table->text('register_page_password_zh')->nullable();
            $table->text('register_page_confirm_password_zh')->nullable();
            $table->text('register_page_language_zh')->nullable();
            $table->text('register_page_language_select_zh')->nullable();
            $table->text('register_page_first_language_zh')->nullable();
            $table->text('register_page_second_language_zh')->nullable();
            $table->text('register_page_third_language_zh')->nullable();
            $table->text('register_page_button_zh')->nullable();
            $table->text('forgot_page_name_zh');
            $table->text('forgot_page_title_zh')->nullable();
            $table->text('forgot_page_sub_title_zh')->nullable();
            $table->text('forgot_page_email_zh')->nullable();
            $table->text('forgot_page_button_zh')->nullable();
            $table->text('reset_page_name_zh');
            $table->text('reset_page_title_zh')->nullable();
            $table->text('reset_page_sub_title_zh')->nullable();
            $table->text('reset_page_new_password_zh')->nullable();
            $table->text('reset_page_confirm_password_zh')->nullable();
            $table->text('reset_page_button_zh')->nullable();


            $table->text('login_page_name_ja');
            $table->text('login_page_title_ja')->nullable();
            $table->text('login_page_sub_title_ja')->nullable();
            $table->text('login_page_username_ja')->nullable();
            $table->text('login_page_password_ja')->nullable();
            $table->text('login_page_remember_password_ja')->nullable();
            $table->text('login_page_forgot_password_ja')->nullable();
            $table->text('login_page_button_ja')->nullable();
            $table->text('login_page_no_account_ja')->nullable();
            $table->text('login_page_register_ja')->nullable();
            $table->text('register_page_name_ja');
            $table->text('register_page_title_ja')->nullable();
            $table->text('register_page_sub_title_ja')->nullable();
            $table->text('register_page_login_ja')->nullable();
            $table->text('register_page_first_name_ja')->nullable();
            $table->text('register_page_last_name_ja')->nullable();
            $table->text('register_page_country_ja')->nullable();
            $table->text('register_page_country_select_ja')->nullable();
            $table->text('register_page_email_ja')->nullable();
            $table->text('register_page_password_ja')->nullable();
            $table->text('register_page_confirm_password_ja')->nullable();
            $table->text('register_page_language_ja')->nullable();
            $table->text('register_page_language_select_ja')->nullable();
            $table->text('register_page_first_language_ja')->nullable();
            $table->text('register_page_second_language_ja')->nullable();
            $table->text('register_page_third_language_ja')->nullable();
            $table->text('register_page_button_ja')->nullable();
            $table->text('forgot_page_name_ja');
            $table->text('forgot_page_title_ja')->nullable();
            $table->text('forgot_page_sub_title_ja')->nullable();
            $table->text('forgot_page_email_ja')->nullable();
            $table->text('forgot_page_button_ja')->nullable();
            $table->text('reset_page_name_ja');
            $table->text('reset_page_title_ja')->nullable();
            $table->text('reset_page_sub_title_ja')->nullable();
            $table->text('reset_page_new_password_ja')->nullable();
            $table->text('reset_page_confirm_password_ja')->nullable();
            $table->text('reset_page_button_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authentication_contents');
    }
};
