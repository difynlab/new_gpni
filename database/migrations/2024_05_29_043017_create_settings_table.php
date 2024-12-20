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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('logo');
            $table->string('footer_logo');
            $table->string('favicon');

            $table->string('fb')->nullable();
            $table->string('instagram')->nullable();
            $table->string('weibo')->nullable();
            $table->string('weixin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();

            $table->string('guest_image');
            $table->string('no_image');
            $table->string('no_profile_image');

            $table->decimal('lifetime_membership_price_en', 10, 2);
            $table->decimal('lifetime_membership_price_zh', 10, 2);
            $table->decimal('lifetime_membership_price_ja', 10, 2);

            $table->decimal('annual_membership_price_en', 10, 2);
            $table->decimal('annual_membership_price_zh', 10, 2);
            $table->decimal('annual_membership_price_ja', 10, 2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
