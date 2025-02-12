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
        Schema::create('calendar_and_scheduling', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('event_name')->nullable(); // Name of the event
            $table->text('description')->nullable(); // Description of the event
            $table->date('event_date')->nullable(); // Event date
            $table->string('location')->nullable(); // Location of the event
            $table->timestamps(); // Created at and updated at timestamps

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_and_scheduling');
    }
};
