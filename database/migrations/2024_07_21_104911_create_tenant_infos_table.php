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
        Schema::create('tenant_infos', function (Blueprint $table) {
            $table->id(); // Primary key

            // Tenant ID as foreign key
            $table->unsignedBigInteger('tenant_id');

            // Property and rent details
            $table->string('property_address');
            $table->date('start_date'); // Renamed from startDay
            $table->decimal('rent', 10, 2); // Adjust precision as needed
            $table->date('due_date'); // Renamed from dueDay

            // Applicant 1 details
            $table->string('applicant_name'); // Renamed from applicant1Name
            $table->date('applicant_dob'); // Renamed from applicant1Dob
            $table->string('applicant_sin'); // Renamed from applicant1Sin
            $table->string('applicant_license'); // Renamed from applicant1License
            $table->string('applicant_occupation'); // Renamed from applicant1Occupation

            // Signature and date
            $table->text('dec_signature'); // Renamed from signature1
            $table->date('dec_date'); // Retained as date1

            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint
            $table->foreign('tenant_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_infos');
    }
};
