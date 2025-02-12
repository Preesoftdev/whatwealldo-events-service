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
        Schema::create('tax_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
 
            $table->string('full_name');
            $table->string('profile_id')->nullable();
            $table->string('business_name')->nullable();
            $table->string('tin')->nullable();
            $table->string('employer_id')->nullable();
            $table->string('ssn')->nullable();
            $table->string('country');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_users');
    }
};
