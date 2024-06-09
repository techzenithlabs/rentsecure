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
        Schema::table('properties', function (Blueprint $table) {
            $table->enum('screening_status', ['0', '1', '2', '3'])
                ->default('0')
                ->after('is_verified')
                ->comment('0: Not Screening, 1: Under Screening, 2: Approved, 3: Rejected');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('screening_status');
        });
    }
};
