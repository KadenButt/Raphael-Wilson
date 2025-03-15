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
        Schema::create('inventory', function(Blueprint $table){
            $table->id('inventory_id')->primary();
            $table->date('inventory_changes_date');
            $table->integer('inventory_changes_number');
            $table->foreignId('item_id')->references('item_id')->on('item');
            $table->foreignId('admin_id')->references('admin_id')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
