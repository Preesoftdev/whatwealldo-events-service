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
        Schema::create('custom_business_information', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('business_information_id'); // Foreign key to business_information table
            $table->string('name'); // Name of the custom field (e.g., Additional Contact Info)
            $table->text('value')->nullable(); // Value of the custom field (e.g., Phone Number: +123456789)
            $table->timestamps(); // Created at and updated at timestamps

            // Add an index for business_information_id
            $table->index('business_information_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_business_information');
    }
};
