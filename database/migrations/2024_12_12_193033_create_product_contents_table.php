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
        Schema::create('product_contents', function (Blueprint $table) {
            $table->id();

            $table->text('page_name_en')->nullable();
            $table->text('page_title_en')->nullable();
            $table->text('page_first_tab_en')->nullable();
            $table->text('page_added_to_cart_en')->nullable();
            $table->text('page_add_to_cart_en')->nullable();
            $table->text('page_not_available_en')->nullable();
            $table->text('page_login_for_purchase_en')->nullable();
            $table->text('page_no_products_en')->nullable();

            $table->text('page_name_zh')->nullable();
            $table->text('page_title_zh')->nullable();
            $table->text('page_first_tab_zh')->nullable();
            $table->text('page_added_to_cart_zh')->nullable();
            $table->text('page_add_to_cart_zh')->nullable();
            $table->text('page_not_available_zh')->nullable();
            $table->text('page_login_for_purchase_zh')->nullable();
            $table->text('page_no_products_zh')->nullable();

            $table->text('page_name_ja')->nullable();
            $table->text('page_title_ja')->nullable();
            $table->text('page_first_tab_ja')->nullable();
            $table->text('page_added_to_cart_ja')->nullable();
            $table->text('page_add_to_cart_ja')->nullable();
            $table->text('page_not_available_ja')->nullable();
            $table->text('page_login_for_purchase_ja')->nullable();
            $table->text('page_no_products_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_contents');
    }
};
