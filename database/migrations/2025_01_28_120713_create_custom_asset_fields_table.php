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
        Schema::create('custom_asset_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id'); // Foreign key to assets table
            $table->string('name');
            $table->string('value');
            $table->timestamps();
            
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_asset_fields');
    }
};
