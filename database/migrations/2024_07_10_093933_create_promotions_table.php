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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Course Discount', 'Coupon Code']);
            $table->string('title')->nullable();
            $table->string('old_course_id')->nullable();
            $table->string('new_course_id')->nullable();

            $table->string('coupon_code')->nullable();
            $table->enum('coupon_code_type', ['Percentage', 'Amount'])->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->decimal('value', 10, 2);
            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
