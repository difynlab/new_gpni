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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable()->unique();
            $table->string('country')->nullable();
            $table->enum('language', ['English', 'Chinese', 'Japanese']);
            $table->string('image')->nullable();
            $table->enum('role', ['admin', 'student']);
            $table->enum('member', ['Yes', 'No'])->default('No');
            $table->enum('member_type', ['Lifetime', 'Annual'])->nullable();
            $table->date('member_annual_expiry_date')->nullable();
            $table->enum('status', [0, 1, 2])->index();

            $table->string('business_name')->nullable();
            $table->string('business_address')->nullable();
            $table->string('unit_suite')->nullable();
            $table->string('city')->nullable();
            $table->string('state_province')->nullable();
            $table->string('zip_postal')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('fax')->nullable();
            $table->string('business_email')->nullable();
            $table->string('business_secondary_email')->nullable();
            $table->string('website')->nullable();

            $table->enum('age', ['29 or younger', '30-39', '40-49', '50-59', '60 plus'])->nullable();
            $table->enum('area_of_interest', ['Basic and Applied Sciences', 'Medicine', 'Dietetics', 'Research and Development', 'Health/ Fitness', 'Other'])->nullable();
            $table->enum('occupation', ['Registered Dietitian/ Sport Dietitian', 'Academic Professor/ Researcher', 'Industry Product Development/ Sales', 'Personal Trainer/ Nutritionist', 'Private Researcher', 'Other'])->nullable();
            $table->enum('messenger_app', ['Skype', 'WeChat', 'WhatsApp'])->nullable();
            $table->string('messenger_app_id')->nullable();
            $table->enum('ad_platform', ['Google', 'Friend', 'Social Media', 'Other'])->nullable();
            $table->text('self_introduction')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email');
            $table->string('token')->unique();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
