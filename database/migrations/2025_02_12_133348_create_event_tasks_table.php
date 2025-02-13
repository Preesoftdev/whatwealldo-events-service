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
        Schema::create('event_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id'); // Event reference
            $table->string('task_name');
            $table->integer('sequence')->nullable(); // Task order
            $table->time('start_time');
            $table->time('finish_time');
            $table->string('responsible')->nullable();
            $table->string('priority')->nullable();
            $table->text('resources')->nullable();
            $table->text('upload')->nullable(); // File upload path
            $table->text('note')->nullable();
            $table->string('status_update')->nullable(); // Status like "In Progress", "Completed"
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_tasks');
    }
};
