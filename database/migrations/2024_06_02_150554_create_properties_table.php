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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('landlord_id')->constrained('users')->onDelete('cascade');
            $table->string('street_address');
            $table->string('apartment')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('province');
            $table->date('date_available');
            $table->string('zipcode');
            $table->string('uploaded_documents')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('status')->default(false); // New field
            $table->boolean('is_deleted')->default(false); // New field
            $table->unsignedBigInteger('deleted_by')->nullable(); // New field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
