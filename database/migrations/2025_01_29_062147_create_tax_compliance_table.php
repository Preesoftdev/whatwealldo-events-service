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
        Schema::create('tax_compliances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table

            $table->string('tax_jurisdiction')->nullable(); // Country, State, Local Jurisdiction
            $table->date('tax_deadline')->nullable(); // Filing Deadlines
            $table->string('filing_requirements')->nullable(); // Local & Federal
            $table->decimal('outstanding_tax_liabilities', 15, 2)->nullable(); // Amount Due
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_compliances');
    }
};
