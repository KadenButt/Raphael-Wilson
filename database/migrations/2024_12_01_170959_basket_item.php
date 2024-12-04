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
        Schema::create('basket_item', function(Blueprint $table){
            $table->id('basket_item_id')->primary();
            $table->integer('quantity');
            $table->foreignId('size_item_id')->references('size_item_id')->on('size_item');
            $table->foreignId('customer_id')->references('customer_id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basket_item');
    }
};
