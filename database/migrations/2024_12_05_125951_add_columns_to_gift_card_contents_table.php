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
        Schema::table('gift_card_contents', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });

        Schema::table('gift_card_contents', function (Blueprint $table) {
            $table->text('page_name_en')->after('id');
            $table->text('page_name_zh')->after('page_name_en');
            $table->text('page_name_ja')->after('page_name_zh');

            $table->text('choose_gift_en')->nullable();
            $table->text('receiver_name_en')->nullable();
            $table->text('receiver_email_en')->nullable();
            $table->text('select_amount_en')->nullable();
            $table->text('custom_en')->nullable();
            $table->text('enter_the_amount_en')->nullable();
            $table->text('message_en')->nullable();
            $table->text('button_en')->nullable();

            $table->text('choose_gift_zh')->nullable();
            $table->text('receiver_name_zh')->nullable();
            $table->text('receiver_email_zh')->nullable();
            $table->text('select_amount_zh')->nullable();
            $table->text('custom_zh')->nullable();
            $table->text('enter_the_amount_zh')->nullable();
            $table->text('message_zh')->nullable();
            $table->text('button_zh')->nullable();

            $table->text('choose_gift_ja')->nullable();
            $table->text('receiver_name_ja')->nullable();
            $table->text('receiver_email_ja')->nullable();
            $table->text('select_amount_ja')->nullable();
            $table->text('custom_ja')->nullable();
            $table->text('enter_the_amount_ja')->nullable();
            $table->text('message_ja')->nullable();
            $table->text('button_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gift_card_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en', 'page_name_zh', 'page_name_ja',

                'choose_gift_en', 'receiver_name_en', 'receiver_email_en', 'select_amount_en', 'custom_en', 'enter_the_amount_en', 'message_en', 'button_en',

                'choose_gift_zh', 'receiver_name_zh', 'receiver_email_zh', 'select_amount_zh', 'custom_zh', 'enter_the_amount_zh', 'message_zh', 'button_zh',

                'choose_gift_ja', 'receiver_name_ja', 'receiver_email_ja', 'select_amount_ja', 'custom_ja', 'enter_the_amount_ja', 'message_ja', 'button_ja'
            ]);
        });

        Schema::table('gift_card_contents', function (Blueprint $table) {
            $table->timestamps();
        });
    }
};
