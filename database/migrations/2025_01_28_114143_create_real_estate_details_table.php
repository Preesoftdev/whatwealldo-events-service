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
        Schema::create('real_estate_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id'); // Foreign key to assets table
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('owner_name');
            $table->decimal('purchase_price', 10, 2);
            $table->date('purchased_on');
            $table->boolean('primary_residence');
            $table->timestamps();
            
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate_details');
    }
};
