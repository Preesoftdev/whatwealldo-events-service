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
        Schema::create('sub_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id'); // Reference to the main event
            $table->string('sub_event_name');
            $table->date('date');
            $table->time('start_time');
            $table->time('finish_time');
            $table->string('dress_code')->nullable();
            $table->string('color_theme')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_events');
    }
};
