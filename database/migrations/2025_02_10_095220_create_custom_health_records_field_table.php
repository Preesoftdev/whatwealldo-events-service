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
        Schema::create('custom_health_records_field', function (Blueprint $table) {
            $table->id();
            $table->foreignId('health_record_id')->constrained('health_records')->onDelete('cascade');
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
        Schema::dropIfExists('custom_health_records_field');
    }
};
