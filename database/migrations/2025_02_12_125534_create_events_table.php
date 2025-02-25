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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table // Owner of the event
            $table->string('name');
            $table->string('event_type'); // Corporate, Social, etc.
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('location');
            $table->integer('people_capacity')->nullable();
            $table->text('description')->nullable();
            $table->integer('publish')->default(0);
            $table->integer('is_public')->default(0);
            $table->string('link')->unique();
            $table->timestamps();

            // Index for faster queries
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
