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
        Schema::create('social_media_integrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('facebook')->nullable();
            $table->string('facebook_username')->nullable();
            $table->string('facebook_password')->nullable();
            $table->string('twitter')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('twitter_password')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('linkedin_username')->nullable();
            $table->string('linkedin_password')->nullable();
            $table->string('instagram')->nullable();
            $table->string('instagram_username')->nullable();
            $table->string('instagram_password')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media_integrations');
    }
};
