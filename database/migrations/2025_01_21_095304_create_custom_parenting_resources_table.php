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
        Schema::create('custom_parenting_resources', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('parenting_resource_id'); // Foreign key to parenting_resources table
            $table->string('name'); // Name of the custom field (e.g., "Extra Activity")
            $table->text('value')->nullable(); // Value for the custom field (e.g., "Sports Day, Cultural Event")
            $table->timestamps(); // Created at and updated at timestamps

            // Index for faster queries
            $table->index('parenting_resource_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_parenting_resources');
    }
};
