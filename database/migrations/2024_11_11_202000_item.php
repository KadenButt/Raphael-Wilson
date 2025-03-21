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
        Schema::create('item', function(Blueprint $table){
            $table->id('item_id')->primary();
            $table->enum('size_number', ['4','5','6','7','8','9','10','11','12','13']);
            $table->integer('stock_number');
            $table->date('stock_changes_date');
            $table->integer('stock_changes_number');
            $table->foreignId('customer_id')->references('customer_id')->on('customer');
            $table->foreignId('product_id')->references('product_id')->on('product');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size_item');
    }
};
