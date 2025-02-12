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
        Schema::create('activity_scheduling', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('activity_name')->nullable(); // Activity name
            $table->text('description')->nullable(); // Description of the activity
            $table->date('schedule_date')->nullable(); // Schedule date for the activity
            $table->string('location')->nullable(); // Location of the activity
            $table->timestamps(); // Created at and updated at timestamps

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_scheduling');
    }
};
