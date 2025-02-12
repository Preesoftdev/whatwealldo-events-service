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
        Schema::create('custom_skillset_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skillset_detail_id')->constrained('skillset_details')->onDelete('cascade');
            $table->string('name'); // Field name
            $table->string('value'); // Field value
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_skillset_fields');
    }
};
