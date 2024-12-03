<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Psy\Shell;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer', function(Blueprint $table){
            $table->id('customer_id')->primary();
            $table->string('customer_email');
            $table->string('customer_password');
            $table->string('customer_fname');  
            $table->string('customer_sname');
            $table->foreignId('address_id')->references('address_id')->on('address');
            $table->foreignId('payment_id')->references('payment_id')->on('payment');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
