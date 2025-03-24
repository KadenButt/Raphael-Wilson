<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('wishlist', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->after('id'); // Add the column
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
    });
}

public function down()
{
    Schema::table('wishlist', function (Blueprint $table) {
        $table->dropForeign(['user_id']); // Drop foreign key constraint
        $table->dropColumn('user_id'); // Drop the column
    });
}

    /**
     * Reverse the migrations.
     */
    
};
