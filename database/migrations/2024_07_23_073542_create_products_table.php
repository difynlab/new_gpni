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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('language', ['English', 'Chinese', 'Japanese']);
            $table->enum('type', ['Own', 'Affiliate']);
            $table->string('affiliate_link')->nullable();
            $table->string('product_category_id');
            $table->decimal('price', 10, 2);
            $table->decimal('membership_price', 10, 2)->nullable();
            $table->decimal('shipping_cost', 10, 2)->nullable();
            $table->text('shipping_cost_reason')->nullable();
            $table->text('description')->nullable();
            $table->text('available_sizes')->nullable();
            $table->text('colors')->nullable();
            $table->string('thumbnail');
            $table->string('images')->nullable();
            $table->string('downloadable_content')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
