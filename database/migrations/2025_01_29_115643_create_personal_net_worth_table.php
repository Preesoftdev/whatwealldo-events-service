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
        Schema::create('personal_net_worths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            
            
            $table->string('cash')->nullable();
            $table->decimal('certificates_of_deposit', 15, 2)->nullable();
            $table->decimal('securities', 15, 2)->nullable();
            $table->decimal('notes_contracts_receivable', 15, 2)->nullable();
            $table->decimal('life_insurance', 15, 2)->nullable();
            $table->decimal('personal_property', 15, 2)->nullable();
            $table->decimal('retirement_funds', 15, 2)->nullable();
            $table->decimal('real_estate', 15, 2)->nullable();
            $table->decimal('other_assets', 15, 2)->nullable();
            $table->decimal('total_assets', 15, 2)->nullable(); // Auto-calculated

           
            $table->decimal('current_debt', 15, 2)->nullable();
            $table->decimal('notes_payable', 15, 2)->nullable();
            $table->decimal('taxes_payable', 15, 2)->nullable();
            $table->decimal('real_estate_mortgages', 15, 2)->nullable();
            $table->decimal('other_liabilities', 15, 2)->nullable();
            $table->decimal('total_liabilities', 15, 2)->nullable(); // Auto-calculated

            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_net_worths');
    }
};
