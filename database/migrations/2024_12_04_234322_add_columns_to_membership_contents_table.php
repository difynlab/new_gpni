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
        Schema::table('membership_contents', function (Blueprint $table) {
            $table->text('page_name_en')->after('id');
            $table->text('page_name_zh')->after('page_name_en');
            $table->text('page_name_ja')->after('page_name_zh');

            $table->text('section_3_already_purchased_en')->nullable()->after('section_3_description_en');
            $table->text('section_3_membership_disabled_en')->nullable()->after('section_3_already_purchased_en');
            $table->text('section_3_change_language_en')->nullable()->after('section_3_membership_disabled_en');
            $table->text('section_3_login_for_purchase_en')->nullable()->after('section_3_change_language_en');

            $table->text('section_3_already_purchased_zh')->nullable()->after('section_3_description_zh');
            $table->text('section_3_membership_disabled_zh')->nullable()->after('section_3_already_purchased_zh');
            $table->text('section_3_change_language_zh')->nullable()->after('section_3_membership_disabled_zh');
            $table->text('section_3_login_for_purchase_zh')->nullable()->after('section_3_change_language_zh');

            $table->text('section_3_already_purchased_ja')->nullable()->after('section_3_description_ja');
            $table->text('section_3_membership_disabled_ja')->nullable()->after('section_3_already_purchased_ja');
            $table->text('section_3_change_language_ja')->nullable()->after('section_3_membership_disabled_ja');
            $table->text('section_3_login_for_purchase_ja')->nullable()->after('section_3_change_language_ja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('membership_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en', 'page_name_zh', 'page_name_ja',
                'section_3_already_purchased_en',
                'section_3_membership_disabled_en',
                'section_3_change_language_en',
                'section_3_login_for_purchase_en',
                'section_3_already_purchased_zh',
                'section_3_membership_disabled_zh',
                'section_3_change_language_zh',
                'section_3_login_for_purchase_zh',
                'section_3_already_purchased_ja',
                'section_3_membership_disabled_ja',
                'section_3_change_language_ja',
                'section_3_login_for_purchase_ja',
            ]);
        });
    }
};
