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
        Schema::create('communication_preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('social_media')->nullable();
            $table->string('primary_contact_time')->nullable();
            $table->string('language_preferences')->nullable();
            $table->string('video_communication_options')->nullable();
            $table->string('communication')->nullable();
            $table->string('communication_preferences')->nullable();
            $table->string('preferred_communication_method')->nullable();
            $table->string('networking_groups')->nullable();
            $table->string('zip_code_radius_for_networking')->nullable();
            $table->string('feeds')->nullable();
            $table->string('groups')->nullable();
            $table->string('videos')->nullable();
            $table->string('memories')->nullable();
            $table->string('pages')->nullable();
            $table->string('finds')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('ai_chats')->nullable();
            $table->string('reels')->nullable();
            $table->string('teams')->nullable();
            $table->string('fax')->nullable();
            $table->string('monetization')->nullable();
            $table->string('purchases')->nullable();
            $table->string('live')->nullable();
            $table->string('reviews')->nullable();
            $table->string('scan')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communication_preferences');
    }
};
