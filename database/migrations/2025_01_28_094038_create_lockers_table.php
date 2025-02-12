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
        Schema::create('lockers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('bank_name');
            $table->string('account_holders');
            $table->json('nominees')->nullable(); // Nominees (Multiple)
            $table->string('account_number');
            $table->decimal('amount_to_pay', 10, 2);
            $table->string('frequency');
            $table->string('key_location');
            $table->string('bank_address');
            $table->text('upload_documents')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lockers');
    }
};
