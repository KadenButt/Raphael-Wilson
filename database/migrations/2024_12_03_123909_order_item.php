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
        Schema::create('order_item', function(Blueprint $table)
        {
            $table->id('order_item_id')->primary();
            $table->integer('order_item_quantity');
            $table->float('order_item_price');
            $table->foreignId('size_item_id')->references('size_item_id')->on('size_item');
            $table->foreignId('order_id')->references('order_id')->on('order');
            $table->foreignId('product_id')->references('product_id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item');
    }
};
