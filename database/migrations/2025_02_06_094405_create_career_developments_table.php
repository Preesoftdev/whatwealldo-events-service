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
        Schema::create('career_developments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
 
            $table->string('type')->default('Mentorship Programs'); // Career Development Type
            $table->string('mentor_name'); // Mentor Name
            $table->string('field_of_expertise'); // Field of Expertise
            $table->string('contact_information'); // Contact Information
            $table->date('availability'); // Availability Date
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_developments');
    }
};
