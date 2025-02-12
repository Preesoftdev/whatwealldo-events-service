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
        Schema::create('business_information', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('name'); // Business name
            $table->string('phone_number')->nullable(); // Phone number
            $table->string('fax')->nullable(); // Fax number
            $table->string('email')->nullable(); // Email address
            $table->text('address')->nullable(); // Address
            $table->string('tax_id')->nullable(); // Tax ID
            $table->string('type_of_business')->nullable(); // Type of business
            $table->string('type_of_ownership')->nullable(); // Type of ownership
            $table->decimal('estimated_value', 15, 2)->nullable(); // Estimated value of the business
            $table->string('upload_document')->nullable(); // Path to uploaded document
            $table->text('description')->nullable(); // Description of the business
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
        Schema::dropIfExists('business_information');
    }
};
