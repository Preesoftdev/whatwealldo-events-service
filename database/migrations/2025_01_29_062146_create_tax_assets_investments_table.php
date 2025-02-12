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
        Schema::create('tax_assets_investments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('stocks')->nullable();
            $table->decimal('bonds', 15, 2)->nullable();
            $table->decimal('mutual_funds', 15, 2)->nullable();
            $table->decimal('crypto_transactions', 15, 2)->nullable();
            $table->decimal('real_estate_investments', 15, 2)->nullable();
            $table->decimal('retirement_accounts', 15, 2)->nullable();
            $table->string('other_investments')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_assets_investments');
    }
};
