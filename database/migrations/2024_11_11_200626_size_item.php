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
        Schema::create('size_item', function(Blueprint $table){
            $table->id('size_item_id')->primary();
            $table->foreignId('product_id')->references('product_id')->on('product');
            $table->foreignId('size_id')->references('size_id')->on('size');
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
