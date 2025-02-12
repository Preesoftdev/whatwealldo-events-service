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
        Schema::create('tax_payment_processing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table

            $table->string('payment_method')->nullable(); // Bank Transfer, Credit Card, etc.
            $table->string('bank_account_details')->nullable(); // Account Details for Tax Payments
            $table->string('payment_schedule')->nullable(); // One-time or Installment
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_payment_processing');
    }
};
