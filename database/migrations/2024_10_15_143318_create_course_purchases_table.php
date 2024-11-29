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
        Schema::create('course_purchases', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('course_id');
            $table->date('date')->nullable();
            $table->date('completion_date')->nullable();
            $table->time('time')->nullable();
            $table->string('mode')->nullable();
            $table->string('transaction_id')->nullable()->unique();
            $table->string('currency');
            $table->decimal('amount_paid', 8, 2)->nullable();
            $table->string('discount_applied')->nullable();
            $table->enum('payment_status', ['Completed', 'Pending', 'Failed'])->nullable()->default('Pending');
            $table->enum('course_access_status', ['Active', 'Revoked'])->default('Active');
            $table->timestamp('expiration_date')->nullable();
            $table->string('receipt_url')->nullable();
            $table->enum('refund_status', ['Refunded', 'Not Refunded'])->nullable()->default('Not Refunded');
            $table->enum('material_logistic', ['Yes', 'No'])->default('No');

            $table->enum('status', [0, 1])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_purchases');
    }
};
