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
        Schema::create('insurance_policies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->string('insurance_type');
            $table->string('location_of_documents')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_phone')->nullable();
            $table->date('date_issued')->nullable();
            $table->decimal('annual_premium', 10, 2)->nullable();
            $table->decimal('deductibles', 10, 2)->nullable();
            $table->string('vehicle_insured')->nullable();
            $table->timestamps();
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_policies');
    }
};
