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
        Schema::create('maintenance_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id'); // Foreign key to assets table
            $table->string('maintenance_type');
            $table->string('maintenance_name');
            $table->string('maintenance_address');
            $table->string('maintenance_city');
            $table->string('maintenance_state');
            $table->string('maintenance_zip');
            $table->string('maintenance_phone');
            $table->string('maintenance_email');
            $table->string('maintenance_website');
            $table->decimal('maintenance_monthly_payment', 10, 2);
            $table->timestamps();
            
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_details');
    }
};
