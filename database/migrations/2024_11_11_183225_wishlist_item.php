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
        Schema::create('wishlist_item', function(Blueprint $table){
            $table->id('wishlist_item_id')->primary();
            $table->foreignId('wishlist_id')->references('wishlist_id')->on('wishlist');
            $table->foreignId('product_id')->references('product_id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist_item');
    }
};
