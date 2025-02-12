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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('fax')->nullable();
            $table->string('email');
            $table->text('address');
            $table->string('tax_id');
            $table->string('type_of_business');
            $table->string('type_of_ownership');
            $table->decimal('estimated_value', 15, 2)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
