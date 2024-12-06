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
        Schema::table('conference_contents', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });

        Schema::table('conference_contents', function (Blueprint $table) {
            $table->text('page_name_en')->after('id');
            $table->text('single_conference_page_name_en')->nullable()->after('page_name_en');

            $table->text('page_name_zh')->after('single_conference_page_name_en');
            $table->text('single_conference_page_name_zh')->nullable()->after('page_name_zh');

            $table->text('page_name_ja')->after('single_conference_page_name_zh');
            $table->text('single_conference_page_name_ja')->nullable()->after('page_name_ja');

            $table->text('date_en')->nullable();
            $table->text('venue_en')->nullable();
            $table->text('view_en')->nullable();
            $table->text('back_en')->nullable();
            $table->text('where_en')->nullable();
            $table->text('early_registration_deadline_en')->nullable();
            $table->text('price_details_en')->nullable();
            $table->text('member_type_en')->nullable();
            $table->text('early_registration_price_en')->nullable();
            $table->text('regular_registration_price_en')->nullable();
            $table->text('get_in_touch_en')->nullable();
            $table->text('first_name_en')->nullable();
            $table->text('last_name_en')->nullable();
            $table->text('email_en')->nullable();
            $table->text('phone_en')->nullable();
            $table->text('question_en')->nullable();
            $table->text('comments_en')->nullable();
            $table->text('button_en')->nullable();
            $table->text('contact_email_en')->nullable();
            $table->text('contact_phone_en')->nullable();
            $table->text('contact_fax_en')->nullable();

            $table->text('date_zh')->nullable();
            $table->text('venue_zh')->nullable();
            $table->text('view_zh')->nullable();
            $table->text('back_zh')->nullable();
            $table->text('where_zh')->nullable();
            $table->text('early_registration_deadline_zh')->nullable();
            $table->text('price_details_zh')->nullable();
            $table->text('member_type_zh')->nullable();
            $table->text('early_registration_price_zh')->nullable();
            $table->text('regular_registration_price_zh')->nullable();
            $table->text('get_in_touch_zh')->nullable();
            $table->text('first_name_zh')->nullable();
            $table->text('last_name_zh')->nullable();
            $table->text('email_zh')->nullable();
            $table->text('phone_zh')->nullable();
            $table->text('question_zh')->nullable();
            $table->text('comments_zh')->nullable();
            $table->text('button_zh')->nullable();
            $table->text('contact_email_zh')->nullable();
            $table->text('contact_phone_zh')->nullable();
            $table->text('contact_fax_zh')->nullable();

            $table->text('date_ja')->nullable();
            $table->text('venue_ja')->nullable();
            $table->text('view_ja')->nullable();
            $table->text('back_ja')->nullable();
            $table->text('where_ja')->nullable();
            $table->text('early_registration_deadline_ja')->nullable();
            $table->text('price_details_ja')->nullable();
            $table->text('member_type_ja')->nullable();
            $table->text('early_registration_price_ja')->nullable();
            $table->text('regular_registration_price_ja')->nullable();
            $table->text('get_in_touch_ja')->nullable();
            $table->text('first_name_ja')->nullable();
            $table->text('last_name_ja')->nullable();
            $table->text('email_ja')->nullable();
            $table->text('phone_ja')->nullable();
            $table->text('question_ja')->nullable();
            $table->text('comments_ja')->nullable();
            $table->text('button_ja')->nullable();
            $table->text('contact_email_ja')->nullable();
            $table->text('contact_phone_ja')->nullable();
            $table->text('contact_fax_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('conference_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en', 'page_name_zh', 'page_name_ja',
                'single_conference_page_name_en', 'single_conference_page_name_zh', 'single_conference_page_name_ja',
                'date_en', 'venue_en', 'view_en', 'back_en', 'where_en',
                'early_registration_deadline_en', 'price_details_en', 'member_type_en',
                'early_registration_price_en', 'regular_registration_price_en',
                'get_in_touch_en', 'first_name_en', 'last_name_en', 'email_en', 'phone_en',
                'question_en', 'comments_en', 'button_en', 'contact_email_en',
                'contact_phone_en', 'contact_fax_en',
                'date_zh', 'venue_zh', 'view_zh', 'back_zh', 'where_zh',
                'early_registration_deadline_zh', 'price_details_zh', 'member_type_zh',
                'early_registration_price_zh', 'regular_registration_price_zh',
                'get_in_touch_zh', 'first_name_zh', 'last_name_zh', 'email_zh', 'phone_zh',
                'question_zh', 'comments_zh', 'button_zh', 'contact_email_zh',
                'contact_phone_zh', 'contact_fax_zh',
                'date_ja', 'venue_ja', 'view_ja', 'back_ja', 'where_ja',
                'early_registration_deadline_ja', 'price_details_ja', 'member_type_ja',
                'early_registration_price_ja', 'regular_registration_price_ja',
                'get_in_touch_ja', 'first_name_ja', 'last_name_ja', 'email_ja', 'phone_ja',
                'question_ja', 'comments_ja', 'button_ja', 'contact_email_ja',
                'contact_phone_ja', 'contact_fax_ja'
            ]);
        });

        Schema::table('conference_contents', function (Blueprint $table) {
            $table->timestamps();
        });
    }
};
