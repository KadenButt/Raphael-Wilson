<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Payment;

class CustomerController extends Controller
{
    public function registerCustomer(Request $request)
    {
        //validate data
        $vd = $request->validate([
            'customer_fname' => 'required|max:255|alpha',
            'customer_sname' => 'required|max:255|alpha',
            'customer_email' => 'required|email|max:255',
            'address_number' => 'required|integer|digits_between:1, 255',
            'address_street' => 'required|max:255',
            'address_postcode' => 'required|max:6',
            'account_number' => 'required|digits:11|integer',
            'customer_password' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,255}$/',
            'password_confirmation' => 'required'
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

        //check for pre-existing email in the database
        $customer = Customer::where('customer_email', $request->input('customer_email'))->first();


        if($customer != null)
        {
            $error = new MessageBag;
            $error->add('email', 'email is already in use');
            return redirect()->back()->withErrors($error);
        }

        //creates customer in data base

        $address = Address::create([
            'address_number' => $vd['address_number'],
            'address_street' => $vd['address_street'],
            'address_postcode' => $vd['address_postcode'],
        ]);

        $payment = Payment::create([
            'account_number' => bcrypt($vd['account_number']), // Encrypt sensitive data
        ]);

        $customer = Customer::create([
            'customer_email' => $vd['customer_email'],
            'customer_password' => bcrypt($vd['customer_password']), // Encrypt the password
            'customer_fname' => $vd['customer_fname'],
            'customer_sname' => $vd['customer_sname'],
            'address_id' => $address->address_id,
            'payment_id' => $payment->payment_id,

        ]);

        Auth::login($customer);
        return redirect('home');
    }

    public function loginCustomer(Request $request)
    {
        //validates data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        //Check it see if cutomers email is in the database
        $customer = Customer::where('customer_email', $credentials['email'])->first();
        //checks password
        if ($customer && Hash::check($credentials['password'], $customer->customer_password)) {
            //logins in the users and add their detials
            Auth::login($customer);
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return redirect()->back();
    }

}
