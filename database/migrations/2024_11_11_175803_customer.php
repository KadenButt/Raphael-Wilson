<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Psy\Shell;
use App\Models\Customer; 
use App\Models\Address;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer', function(Blueprint $table){
            $table->id('customer_id')->primary();
            $table->string('customer_email');
            $table->string('customer_password');
            $table->string('customer_fname');  
            $table->string('customer_sname');
            $table->string('customer_question');
            $table->boolean('admin');
            $table->foreignId('address_id')->references('address_id')->on('address');
            $table->foreignId('payment_id')->references('payment_id')->on('payment');

        });

        //creates defualt admin account
        
        $payment = Payment::create([
            'account_number' => '12345678',
        ]);

        $address = Address::create([
            'address_number' => 0,
            'address_street' => 'root',
            'address_postcode' => 'GH38JH',
        ]);

        Customer::create([
            'customer_email' => 'admin@email.com',
            'customer_password' => Hash::make('admin123'),
            'customer_fname' => 'root',
            'customer_sname' => 'root',
            'address_id' => $address->address_id,
            'payment_id' => $payment->payment_id,
            'customer_question' => 'toor',
            'admin' => true,    
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
