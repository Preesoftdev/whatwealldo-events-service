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
        Schema::create('calendar_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('event_name');
            $table->date('date');
            $table->time('time');
            $table->string('location')->nullable();
            $table->text('activities')->nullable();
            $table->string('reminders')->nullable();
            $table->string('participants')->nullable();
            $table->string('recurring')->nullable();
            $table->timestamps();
            
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_schedules');
    }
};
