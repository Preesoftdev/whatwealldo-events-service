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
        Schema::create('tax_deductions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table

            $table->decimal('standard_deduction', 15, 2)->nullable();
            $table->json('itemized_deductions')->nullable(); 
            $table->decimal('education_expense', 15, 2)->nullable();
            $table->decimal('business_expense', 15, 2)->nullable();
            $table->decimal('ira_contributions', 15, 2)->nullable();
            $table->decimal('401k_contributions', 15, 2)->nullable();
            $table->decimal('childcare_expense', 15, 2)->nullable();
            $table->decimal('dependent_expense', 15, 2)->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_deductions');
    }
};
