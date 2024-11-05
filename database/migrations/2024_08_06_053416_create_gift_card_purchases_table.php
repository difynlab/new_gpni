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
        Schema::create('gift_card_purchases', function (Blueprint $table) {
            $table->id();

            $table->string('receiver_name');
            $table->string('receiver_email');
            $table->decimal('amount', 10, 2);
            $table->string('buyer_name');
            $table->string('buyer_email');
            $table->string('reference_code')->unique();
            $table->date('date');
            $table->enum('payment_status', [0, 1]);
            $table->enum('status', [0, 1])->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_card_purchases');
    }
};
