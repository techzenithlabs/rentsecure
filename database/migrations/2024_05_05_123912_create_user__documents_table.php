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
        Schema::create('user_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key field
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('document_type', ['doc', 'docx', 'xlxs', 'pdf', 'jpeg', 'png', 'gif'])->nullable()->default(null);
            $table->text('documents')->nullable();
            $table->date('expiry_date')->nullable();
            $table->tinyInteger('is_verified')->nullable()->default(null)->comment('0 for not verified, 1 for verified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__documents');
    }
};
