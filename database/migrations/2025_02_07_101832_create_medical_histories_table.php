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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('condition');
            $table->text('treatment_details')->nullable();
            $table->date('diagnosis_date')->nullable();
            $table->string('medications')->nullable();
            $table->string('dosage')->nullable();
            $table->string('frequency')->nullable();
            $table->timestamps();
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
