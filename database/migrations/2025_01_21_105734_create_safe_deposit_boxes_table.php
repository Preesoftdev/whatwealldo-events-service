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
        Schema::create('safe_deposit_boxes', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('bank_name'); // Bank Name
            $table->json('account_holders')->nullable(); // Account Holders (Multiple)
            $table->json('nominees')->nullable(); // Nominees (Multiple)
            $table->string('account_number')->nullable(); // Account Number
            $table->decimal('amount_to_pay', 10, 2)->nullable(); // Amount to Pay
            $table->string('frequency')->nullable(); // Frequency
            $table->string('key_location')->nullable(); // Key Location
            $table->text('bank_address')->nullable(); // Bank Address
            $table->json('uploaded_documents')->nullable(); // Upload Documents
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
        Schema::dropIfExists('safe_deposit_boxes');
    }
};
