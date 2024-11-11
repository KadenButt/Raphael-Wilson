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
        Schema::create('review', function(Blueprint $table){
            $table->id('review_id')->primary();
            $table->float('review_rating');
            $table->string('review_comment');
            $table->date('review_date');
            $table->foreignId('product_id')->references('product_id')->on('product');
            $table->foreignId('customer_id')->references('customer_id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
