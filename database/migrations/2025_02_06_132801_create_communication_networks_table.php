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
        Schema::create('communication_networks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('business_networking')->nullable();
            $table->string('community_service')->nullable();
            $table->string('hobby_groups')->nullable();
            $table->string('religious_groups')->nullable();
            $table->integer('zip_code_radius')->nullable();
            $table->string('community_affiliations')->nullable();
            $table->string('friends_family_affiliation')->nullable();
            $table->string('regional_affiliations')->nullable();
            $table->timestamps();
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communication_networks');
    }
};
