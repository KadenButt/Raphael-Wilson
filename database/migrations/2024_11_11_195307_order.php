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
        Schema::create('order', function(Blueprint $table){
            $table->id('order_id')->primary();
            $table->date('order_date');
            $table->enum('order_status', ['Processing', 'Shipped', 'Delivered', 'Cancelled']);
            $table->float('order_total_price');
            $table->foreignId('customer_id')->references('customer_id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
