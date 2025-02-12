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
        Schema::create('mortgage_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id'); // Foreign key to assets table
            $table->string('bank_name');
            $table->decimal('loan_amount', 15, 2);
            $table->string('monthly_payment');
            $table->date('payment_date');
            $table->decimal('balance_loan', 15, 2);
            $table->timestamps();
            
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgage_details');
    }
};
