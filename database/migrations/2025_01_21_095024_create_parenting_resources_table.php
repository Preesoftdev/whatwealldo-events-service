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
        Schema::create('parenting_resources', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('type')->nullable(); // Type of Parenting Resource (e.g., School Information)
            $table->string('child_name')->nullable(); // Name of the child
            $table->date('dob')->nullable(); // Date of Birth of the child
            $table->string('school_name')->nullable(); // School Name
            $table->string('school_address')->nullable(); // School Address
            $table->string('grade_level')->nullable(); // Grade Level (Dropdown options)
            $table->string('teacher_name')->nullable(); // Teacher's Name
            $table->string('subject')->nullable(); // Subject taught by the teacher
            $table->string('contact_information')->nullable(); // Contact Information
            $table->string('school_calendar')->nullable(); // School Calendar (e.g., URL or file path)
            $table->timestamps(); // Created at and updated at timestamps

            // Index for faster queries
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parenting_resources');
    }
};
