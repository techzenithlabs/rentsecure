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
        Schema::create('tenant_info', function (Blueprint $table) {
            $table->id();
            $table->string('property_address');
            $table->string('start_date');
            $table->string('month');
            $table->string('year');
            $table->decimal('monthly_rent',10,2);
            $table->timestamps();
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
