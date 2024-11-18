<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRegisterController extends Controller
{
    public function registerUser(Request $request)
    {

        //validate data (alpha = only letters)
        $vd = $request->validate([
            'fname' => 'required|max:255|alpha',
            'sname' => 'required|max:255|alpha',
            'email' => 'required|email|max:255',
            'address_number' => 'required|integer|max:255',
            'street' => 'required|max:255|alpha',
            'postcode' => 'required|max:6',
            'payment_number' => 'required|integer|max:11',
            'password' => 'required',
            'confirm-password' => 'required'
        ]);

        
        //creates address table and returns ID
        $addressId = DB::table('address')->insertGetId([
            'address_number' => $request->input('address_number'),
            'address_street' => $request->input('street'),
            'address_postcode' => $request->input('postcode'),
        ]);

        //does the same 
        $paymentId = DB::table('payment')->insertGetId([
            'account_number' => $request->input('payment_number'),
        ]);

        DB::table('customer')->insert([
            'customer_email' => $request->input('email'),
            'customer_password' => bcrypt($request->input('password')),
            'customer_fname' => $request->input('fname'),
            'customer_sname' => $request->input('sname'),
            'address_id' => $addressId,  
            'payment_id' => $paymentId,  
        ]);


    }
}
