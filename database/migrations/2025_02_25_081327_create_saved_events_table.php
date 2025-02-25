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
        Schema::create('saved_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // The user who saved the event
            $table->unsignedBigInteger('event_id'); // The event being saved
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            // Unique constraint to prevent duplicates
            $table->unique(['user_id', 'event_id']);
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved_events');
    }
};
