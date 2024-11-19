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
            'street' => 'required|max:255',
            'postcode' => 'required|max:6',
            'payment_number' => 'required|integer|max:11',
            'password' => 'required|confirmed',
            'confirm-password' => 'required'
        ], [
            'fname.required' => 'First name is required and cannot be empty.',
            'fname.max' => 'First name cannot exceed 255 characters.',
            'fname.alpha' => 'First name should contain only letters.',
        
            'sname.required' => 'Last name is required and cannot be empty.',
            'sname.max' => 'Last name cannot exceed 255 characters.',
            'sname.alpha' => 'Last name should contain only letters.',
        
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',
        
            'address_number.required' => 'Address number is required.',
            'address_number.integer' => 'Address number must be a number.',
            'address_number.max' => 'Address number cannot exceed 255 characters.',
        
            'street.required' => 'Street name is required.',
            'street.max' => 'Street name cannot exceed 255 characters.',
        
            'postcode.required' => 'Postcode is required.',
            'postcode.max' => 'Postcode cannot exceed 6 characters.',
        
            'payment_number.required' => 'Payment number is required.',
            'payment_number.integer' => 'Payment number must be a number.',
            'payment_number.max' => 'Payment number cannot exceed 11 characters.',
        
            'password.required' => 'Password is required.',
            'password.confirmed' => 'Passwords do not match.',
        
            'confirm-password.required' => 'Please confirm your password.'
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
