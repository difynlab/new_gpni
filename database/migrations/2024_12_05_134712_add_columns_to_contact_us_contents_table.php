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
        Schema::table('contact_us_contents', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });

        Schema::table('contact_us_contents', function (Blueprint $table) {
            $table->text('page_name_en')->after('id');
            $table->text('page_name_zh')->after('page_name_en');
            $table->text('page_name_ja')->after('page_name_zh');

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
        Schema::table('contact_us_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en', 'page_name_zh', 'page_name_ja',
                
                'first_name_en', 'last_name_en', 'email_en', 'phone_en',
                'question_en', 'comments_en', 'button_en', 'contact_email_en',
                'contact_phone_en', 'contact_fax_en',

                'first_name_zh', 'last_name_zh', 'email_zh', 'phone_zh',
                'question_zh', 'comments_zh', 'button_zh', 'contact_email_zh',
                'contact_phone_zh', 'contact_fax_zh',
                
                'first_name_ja', 'last_name_ja', 'email_ja', 'phone_ja',
                'question_ja', 'comments_ja', 'button_ja', 'contact_email_ja',
                'contact_phone_ja', 'contact_fax_ja'
            ]);

            $table->dropTimestamps();
        });

        Schema::table('contact_us_contents', function (Blueprint $table) {
            $table->timestamps();
        });
    }
};
