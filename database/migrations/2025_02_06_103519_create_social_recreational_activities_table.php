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
        Schema::create('social_recreational_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('type')->default('Clubs & Societies'); // Dropdown selection
            $table->string('club_name');
            $table->string('membership_status')->nullable();
            $table->date('meeting_schedule')->nullable();
            $table->string('location')->nullable();
            $table->text('activities')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_recreational_activities');
    }
};
