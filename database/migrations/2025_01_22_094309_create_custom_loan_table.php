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
        Schema::create('custom_loan', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('loan_id'); // Foreign key to the loans table
            $table->string('name'); // Custom field name
            $table->text('value')->nullable(); // Custom field value (can store any type of data)
            $table->timestamps(); // Created_at and updated_at

            // Define foreign key constraint to the loans table
            $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_loan');
    }
};
