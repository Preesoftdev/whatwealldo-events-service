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
        Schema::create('loans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('lender_name'); // Lender Name
            $table->json('debtor_names')->nullable(); // Debtor Names (Multiple)
            $table->string('account_number')->nullable(); // Account Number
            $table->text('kyc_details')->nullable(); // KYC Details
            $table->date('update_date')->nullable(); // Update Date
            $table->string('loan_period')->nullable(); // Loan Period
            $table->json('nominees')->nullable(); // Nominees (Multiple)
            $table->decimal('payment_amount', 10, 2)->nullable(); // Payment Amount
            $table->string('payment_frequency')->nullable(); // Payment Frequency
            $table->date('due_date_of_payment')->nullable(); // Due Date of Payment
            $table->decimal('interest_rate', 5, 2)->nullable(); // Interest Rate
            $table->date('date_of_loan')->nullable(); // Date of Loan
            $table->date('due_date_of_total_loan')->nullable(); // Due Date of Total Loan
            $table->decimal('balance_to_pay', 10, 2)->nullable(); // Balance to Pay
            $table->string('location_of_statements')->nullable(); // Location of Statements
            $table->string('website')->nullable(); // Website
            $table->string('login')->nullable(); // Online Credentials - Login
            $table->string('password')->nullable(); // Online Credentials - Password
            $table->timestamps(); // Created_at and updated_at
              // Add an index for user_id
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
