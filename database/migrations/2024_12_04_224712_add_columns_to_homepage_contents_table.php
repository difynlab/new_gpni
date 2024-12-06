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
        Schema::table('homepage_contents', function (Blueprint $table) {
            $table->text('page_name_en')->after('id');
            $table->text('page_name_zh')->after('page_name_en');
            $table->text('page_name_ja')->after('page_name_zh');

            $table->text('section_3_first_tab_en')->nullable()->after('section_3_description_en');
            $table->text('section_3_second_tab_en')->nullable()->after('section_3_first_tab_en');
            $table->text('section_3_third_tab_en')->nullable()->after('section_3_second_tab_en');
            $table->text('section_3_apply_en')->nullable()->after('section_3_third_tab_en');
            $table->text('section_8_placeholder_en')->nullable()->after('section_8_description_en');
            $table->text('section_8_button_en')->nullable()->after('section_8_placeholder_en');

            $table->text('section_3_first_tab_zh')->nullable()->after('section_3_description_zh');
            $table->text('section_3_second_tab_zh')->nullable()->after('section_3_first_tab_zh');
            $table->text('section_3_third_tab_zh')->nullable()->after('section_3_second_tab_zh');
            $table->text('section_3_apply_zh')->nullable()->after('section_3_third_tab_zh');
            $table->text('section_8_placeholder_zh')->nullable()->after('section_8_description_zh');
            $table->text('section_8_button_zh')->nullable()->after('section_8_placeholder_zh');

            $table->text('section_3_first_tab_ja')->nullable()->after('section_3_description_ja');
            $table->text('section_3_second_tab_ja')->nullable()->after('section_3_first_tab_ja');
            $table->text('section_3_third_tab_ja')->nullable()->after('section_3_second_tab_ja');
            $table->text('section_3_apply_ja')->nullable()->after('section_3_third_tab_ja');
            $table->text('section_8_placeholder_ja')->nullable()->after('section_8_description_ja');
            $table->text('section_8_button_ja')->nullable()->after('section_8_placeholder_ja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en', 'page_name_zh', 'page_name_ja',
                'section_3_first_tab_en', 'section_3_second_tab_en', 'section_3_third_tab_en', 'section_3_apply_en', 'section_8_placeholder_en', 'section_8_button_en', 'section_3_first_tab_zh', 'section_3_second_tab_zh', 'section_3_third_tab_zh', 'section_3_apply_zh', 'section_8_placeholder_zh', 'section_8_button_zh', 'section_3_first_tab_ja', 'section_3_second_tab_ja', 'section_3_third_tab_ja', 'section_3_apply_ja', 'section_8_placeholder_ja', 'section_8_button_ja'
            ]);
        });
    }
};
