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
        Schema::create('people_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');// Reference to User
            $table->string('name'); // Group name
            $table->enum('privacy', ['public', 'private'])->default('public'); // Privacy settings
            $table->timestamps();
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_groups');
    }
};
