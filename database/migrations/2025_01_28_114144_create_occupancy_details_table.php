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
        Schema::create('occupancy_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id'); // Foreign key to assets table
            $table->string('occupied_by');
            $table->string('tenant_name');
            $table->string('tenant_phone');
            $table->string('tenant_email');
            $table->decimal('tenant_monthly_payment', 10, 2);
            $table->date('rent_receipt_date');
            $table->date('rental_renewal_date');
            $table->string('references');
            $table->text('verification_documents')->nullable();
            $table->timestamps();
            
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupancy_details');
    }
};
