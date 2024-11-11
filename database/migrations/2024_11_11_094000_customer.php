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
        Schema::create('customer', function(Blueprint $table)
        {
            $table->integer('id');
            $table->string('email');
            $table->string('password');
            $table->unsignedBigInteger('payment_id');

            //FK
            $table->foreign('payment_id')->references('payment_id')->on('payment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
