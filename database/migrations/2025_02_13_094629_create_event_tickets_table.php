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
        Schema::create('event_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id'); // Event reference
            $table->string('ticket_type'); // Paid, Free, Donation, Guest Pass
            $table->string('name'); // Ticket name
            $table->decimal('price', 8, 2)->nullable(); // Price (nullable for free tickets)
            $table->integer('quantity')->nullable(); // Max available tickets
            $table->integer('sold')->default(0); // Number of sold tickets
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->dateTime('sale_end_date')->nullable();
            $table->enum('sale_status', ['active', 'ended', 'cancelled'])->default('active');
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_tickets');
    }
};
