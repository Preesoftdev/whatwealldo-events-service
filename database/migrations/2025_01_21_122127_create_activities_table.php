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
        Schema::create('activities', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('type')->nullable(); // Type of activity (e.g., Clubs & Societies)
            $table->string('club_name')->nullable(); // Club name
            $table->string('membership_status')->nullable(); // Membership status
            $table->date('meeting_schedule')->nullable(); // Meeting schedule
            $table->string('location')->nullable(); // Location of the activity
            $table->text('activities')->nullable(); // Details about activities
            $table->timestamps(); // Created at and updated at timestamps

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
