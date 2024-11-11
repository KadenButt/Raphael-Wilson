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
        Schema::create('product', function(Blueprint $table)
        {
            $table->id('product_id')->primary();
            $table->string('product_name');
            $table->binary('product_photo');
            $table->string('product_description');
            $table->float('product_price');
            $table->foreignId('category_id')->references('category_id')->on('category');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
