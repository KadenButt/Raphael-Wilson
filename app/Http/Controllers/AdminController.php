<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Customer;

class AdminController extends Controller
{
    public function registerAdmin(Request $request)
    {
        //validate data
        $vd = $request->validate([
            'admin_fname' => 'required|max:255|alpha',
            'admin_sname' => 'required|max:255|alpha',
            'admin_email' => 'required|email|max:255',
            'admin_number' => 'required|integer|digits_between:1, 255',

            'admin_password' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,255}$/',
            'admin_password_confirmation' => 'required'
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
            'payment_number.digits' => 'A valid payment number must be 11 characters.',

            'password.required' => 'Password is required.',
            'password.regex' => 'The password must be longer then 8 characters contain at least one uppercase letter, one number, and one special character.',

        ]);

        //check for pre-existing email in the database of admin and customer
        $admin = Admin::where('admin_email', $request->input('admin_email'))->first();
        $customer = Customer::where('customer_email', $request->input('customer_email'))->first();




        if($admin != null && $customer != null)
        {
            $error = new MessageBag;
            $error->add('email', 'email is already in use');
            return redirect()->back()->withErrors($error);
        }


        //adds admin customer to data base
        $customer = Customer::create([
            'admin_email' => $vd['customer_email'],
            'admin_password' => bcrypt($vd['customer_password']),
            'admin_fname' => $vd['customer_fname'],
            'admin_sname' => $vd['customer_sname'],

        ]);

        Auth::login($customer);
        return redirect(route('home'));
    }

}
