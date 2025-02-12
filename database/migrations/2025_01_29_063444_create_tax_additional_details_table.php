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
        Schema::create('tax_additional_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table

            $table->string('documentation_upload')->nullable(); // File path for uploaded tax documents
            $table->text('tax_consultant_details')->nullable(); // Tax consultant information
            $table->text('audit_support_details')->nullable(); // Audit support notes
            $table->text('notes_comments')->nullable(); // General comments
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_additional_details');
    }
};
