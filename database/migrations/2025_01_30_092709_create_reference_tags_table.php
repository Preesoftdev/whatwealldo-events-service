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
        Schema::create('reference_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('remote')->nullable();
            $table->string('location')->nullable();
            $table->string('companies')->nullable();
            $table->string('pay_range')->nullable();
            $table->string('skill_sets')->nullable();
            $table->string('job_titles')->nullable();
            $table->string('partner')->nullable();
            $table->string('investor')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_tags');
    }
};
