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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('type_of_investment'); // Type of Investment
            $table->string('name_of_entity'); // Name of Entity
            $table->string('account_name')->nullable(); // Account Name
            $table->string('account_type')->nullable(); // Account Type
            $table->string('account_number')->nullable(); // Account Number
            $table->string('account_owner')->nullable(); // Account Owner
            $table->json('nominees')->nullable(); // Nominees (Multiple)
            $table->string('kyc_details')->nullable(); // KYC Details
            $table->date('update_date')->nullable(); // Update Date
            $table->decimal('investment_purchase_value', 15, 2)->nullable(); // Investment/Purchase Value
            $table->date('investment_date')->nullable(); // Investment Date
            $table->date('maturity_date')->nullable(); // Maturity Date
            $table->decimal('current_balance', 15, 2)->nullable(); // Current Balance
            $table->decimal('current_value', 15, 2)->nullable(); // Current Value
            $table->enum('frequency_of_investment', ['One-time', 'Monthly', 'Quarterly', 'Bi-Annually', 'Annually'])->nullable(); // Frequency of Investment
            $table->string('location_of_statement')->nullable(); // Location of Statement
            $table->string('website')->nullable(); // Website
            $table->timestamps(); // Created at and updated at

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
