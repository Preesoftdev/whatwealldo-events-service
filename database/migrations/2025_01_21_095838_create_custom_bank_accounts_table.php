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
        Schema::create('custom_bank_accounts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('bank_account_id'); // Foreign key to bank_accounts table
            $table->string('name'); // Name of the custom field
            $table->text('value')->nullable(); // Value for the custom field
            $table->timestamps(); // Created at and updated at timestamps

            // Add an index for bank_account_id
            $table->index('bank_account_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_bank_accounts');
    }
};
