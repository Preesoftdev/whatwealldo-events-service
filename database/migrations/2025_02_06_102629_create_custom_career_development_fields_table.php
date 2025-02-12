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
        Schema::create('custom_career_development_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_development_id')->constrained('career_developments')->onDelete('cascade'); // Foreign key
            $table->string('name'); // Custom Field Name
            $table->text('value'); // Custom Field Value
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_career_development_fields');
    }
};
