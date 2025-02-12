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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('account_type')->nullable(); // Dropdown for account type
            $table->string('account_holders')->nullable(); // Multiple account holders
            $table->string('nominee')->nullable(); // Nominee name(s)
            $table->string('account_number')->nullable(); // Bank account number
            $table->string('kyc_details')->nullable(); // KYC details
            $table->date('update_date')->nullable(); // Last update date
            $table->string('address')->nullable(); // Address
            $table->string('city')->nullable(); // City
            $table->string('state')->nullable(); // State/region
            $table->string('zip')->nullable(); // ZIP code
            $table->string('online_credentials')->nullable(); // Online credentials
            $table->string('verification_code')->nullable(); // Generated verification code
            $table->string('bank_name')->nullable(); // Bank name
            $table->string('manager_name')->nullable(); // Manager name
            $table->string('bank_phone')->nullable(); // Bank phone number
            $table->string('email')->nullable(); // Bank email
            $table->string('location')->nullable(); // Bank location
            $table->string('website')->nullable(); // Bank website
            $table->text('upload_documents')->nullable(); // Path for uploaded documents
            $table->string('login')->nullable(); // Online credentials - login
            $table->string('password')->nullable(); // Online credentials - password
            $table->timestamps(); // Created at and updated at timestamps

            // Add an index for user_id
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
