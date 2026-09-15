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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_type_id');
            $table->unsignedBigInteger('address_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('nbvv_number');
            $table->integer('is_active');
            $table->foreign('member_type_id')->references('id')->on('member_types');
            $table->foreign('address_id')->references('id')->on('addresses');
            // $table->foreign('gedetineerde_id')->references('id')->on('gedetineerde');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
