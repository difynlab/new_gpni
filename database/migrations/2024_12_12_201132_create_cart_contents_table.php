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
        Schema::create('cart_contents', function (Blueprint $table) {
            $table->id();

            $table->text('page_name_en')->nullable();
            $table->text('page_items_en')->nullable();
            $table->text('page_order_summary_en')->nullable();
            $table->text('page_no_of_items_en')->nullable();
            $table->text('page_sub_total_en')->nullable();
            $table->text('page_shipping_fee_en')->nullable();
            $table->text('page_gift_amount_en')->nullable();
            $table->text('page_total_en')->nullable();
            $table->text('page_button_en')->nullable();
            $table->text('page_we_accept_en')->nullable();

            $table->text('page_name_zh')->nullable();
            $table->text('page_items_zh')->nullable();
            $table->text('page_order_summary_zh')->nullable();
            $table->text('page_no_of_items_zh')->nullable();
            $table->text('page_sub_total_zh')->nullable();
            $table->text('page_shipping_fee_zh')->nullable();
            $table->text('page_gift_amount_zh')->nullable();
            $table->text('page_total_zh')->nullable();
            $table->text('page_button_zh')->nullable();
            $table->text('page_we_accept_zh')->nullable();

            $table->text('page_name_ja')->nullable();
            $table->text('page_items_ja')->nullable();
            $table->text('page_order_summary_ja')->nullable();
            $table->text('page_no_of_items_ja')->nullable();
            $table->text('page_sub_total_ja')->nullable();
            $table->text('page_shipping_fee_ja')->nullable();
            $table->text('page_gift_amount_ja')->nullable();
            $table->text('page_total_ja')->nullable();
            $table->text('page_button_ja')->nullable();
            $table->text('page_we_accept_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_contents');
    }
};
