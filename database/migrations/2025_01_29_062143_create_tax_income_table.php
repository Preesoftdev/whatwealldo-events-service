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
        Schema::create('tax_incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table

            $table->string('income_source');
            $table->string('salary_wages');
            $table->decimal('business_revenue', 15, 2)->nullable();
            $table->decimal('business_net_profit', 15, 2)->nullable();
            $table->decimal('rental_revenue', 15, 2)->nullable();
            $table->decimal('rental_net_profit', 15, 2)->nullable();
            $table->decimal('capital_gains', 15, 2)->nullable();
            $table->decimal('capital_losses', 15, 2)->nullable();
            $table->decimal('royalties', 15, 2)->nullable();
            $table->decimal('pensions', 15, 2)->nullable();
            $table->decimal('social_benefits', 15, 2)->nullable();
            $table->decimal('taxable_income', 15, 2)->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_incomes');
    }
};
