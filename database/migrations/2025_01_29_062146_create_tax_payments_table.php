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
        Schema::create('tax_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table

            $table->decimal('total_taxes_withheld', 15, 2)->nullable();
            $table->decimal('quarterly_estimated_payments', 15, 2)->nullable();
            $table->decimal('state_local_taxes', 15, 2)->nullable();
            $table->decimal('foreign_income_taxes', 15, 2)->nullable();
            $table->decimal('tax_refunds_previous_years', 15, 2)->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_payments');
    }
};
