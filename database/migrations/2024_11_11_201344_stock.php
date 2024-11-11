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
        Schema::create('stock', function(Blueprint $table){
            $table->id('stock_id')->primary();
            $table->integer('stock_number');
            $table->date('stock_last_updated');
            $table->foreignId('size_item_id')->references('size_item_id')->on('size_item');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
