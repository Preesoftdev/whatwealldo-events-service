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
        Schema::create('tax_credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table

            $table->decimal('earn_income_tax_credit', 15, 2)->nullable();
            $table->decimal('child_tax_credit', 15, 2)->nullable();
            $table->string('education_tax_credit')->nullable();
            $table->decimal('renewable_energy_credit', 15, 2)->nullable();
            $table->text('other_credits')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_credits');
    }
};
