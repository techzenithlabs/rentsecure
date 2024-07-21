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
        Schema::create('tenant_properties', function (Blueprint $table) {
            $table->id();
            $table->integer('landlord_id');
            $table->integer('tenant_id');
            $table->integer('property_id');
            $table->string('tenant_first_name');
            $table->string('tenant_middle_name');
            $table->string('tenant_last_name');
            $table->string('sin');
            $table->date('dob');
            $table->text('address');
            $table->string('city');
            $table->string('postalcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_properties');
    }
};
