<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tenant_screening', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('landlord_id'); // Foreign key column for landlord
            $table->integer('tenant_id')->nullable(); // Nullable foreign key column for tenant
            $table->string('country');
            $table->string('paymentinfo');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('sin');
            $table->date('dob');
            $table->string('address');
            $table->timestamps();

            // Define foreign key constraint for landlord_id
            $table->foreign('landlord_id')->references('id')->on('users')->onDelete('cascade');

            // Add check constraint to ensure landlord_id belongs to users with role_id = 2

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenant_screening', function (Blueprint $table) {

        });

    }
};
