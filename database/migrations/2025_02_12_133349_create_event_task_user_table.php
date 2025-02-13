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
        Schema::create('event_task_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_task_id');
            $table->unsignedBigInteger('user_id'); // Assigned user
            $table->timestamps();
            
            $table->foreign('event_task_id')->references('id')->on('event_tasks')->onDelete('cascade');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_task_user');
    }
};
