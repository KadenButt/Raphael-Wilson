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
            $table->enum('size_number', ['4','5','6','7','8','9','10']);
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
