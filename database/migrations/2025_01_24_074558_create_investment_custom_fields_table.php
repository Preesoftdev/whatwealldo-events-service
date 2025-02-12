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
        Schema::create('custom_investment_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investment_id') // Foreign key to investments table
            ->constrained('investments')
            ->onDelete('cascade'); // Delete custom fields if the investment is deleted
            $table->string('name'); // Name of the custom field
            $table->text('value')->nullable(); // Value of the custom field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_investment_fields');
    }
};
