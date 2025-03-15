<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\BasketController;
use App\Models\Customer;
use App\Models\Admin;
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
            'password_confirmation' => 'required',
            'security_question' => 'required'
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

            'security_question' => 'Pasword is required. ',

            'password.required' => 'Password is required.',
            'password.regex' => 'The password must be longer then 8 characters contain at least one uppercase letter, one number, and one special character.',

        ]);

        //check for pre-existing email in the database
        $customer = Customer::where('customer_email', $request->input('customer_email'))->first();
        $admin = Admin::where('admin_email', $request->input('admin_email'))->first();


        if($admin != null || $customer != null)
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

        // encrypt sensitive data
        $payment = Payment::create([
            'account_number' => $vd['account_number'],
        ]);

        //adds  to data base
        $customer = Customer::create([
            'customer_email' => $vd['customer_email'],
            'customer_password' => bcrypt($vd['customer_password']),
            'customer_fname' => $vd['customer_fname'],
            'customer_sname' => $vd['customer_sname'],
            'address_id' => $address->address_id,
            'payment_id' => $payment->payment_id,
            'customer_question' => $vd['security_question'],
            'admin' => false,
        ]);

        Auth::login($customer);
        session(['id' => $customer->id]);
        return redirect(route('home'));
    }

    public function loginCustomer(Request $request)
    {
        //validates data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        //Checks to see if email is in the database
        $customer = Customer::where('customer_email', $credentials['email'])->first();

 
        //checks password
        if ($customer && Hash::check($credentials['password'], $customer->customer_password)) {
            //logins in the users and add their detials
            Auth::login($customer);

            $request->session()->regenerate();
            $previousPostUrl = session('prev_route');

            //return to basket if redirected from there
            if ($previousPostUrl == 'basket.add') {
                $previousRequestData = session('previous_post_data', []);
                $previousRequest = new Request($previousRequestData);
                BasketController::addBasket($previousRequest);
                return redirect(route('product', [$previousRequest->input('product_id')]));
            }
            return redirect(route('home'));
        }

        return redirect()->back();
    }

    public function showDetails()
    {
        $customer = Customer::where('customer_id', Auth::id())->first();
        $address = Address::where('address_id', $customer->address_id)->first();
        $payment = Payment::where('payment_id', $customer->payment_id)->first();
        return view('updateDetails', [
            'customer' => $customer,
            'address' => $address,
            'payment' => $payment,
        ]);
        
    }

    public function updateCustomer(Request $request)
    {
        $vd = $request->validate([
            'customer_fname' => 'required|max:255|alpha',
            'customer_sname' => 'required|max:255|alpha',
            'customer_email' => 'required|email|max:255',
            'address_number' => 'required|integer|digits_between:1, 255',
            'address_street' => 'required|max:255',
            'address_postcode' => 'required|max:6',
            'account_number' => 'required|digits:11|integer',
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


        ]);

    $customer = Customer::where('customer_id', Auth::id())->first();
    $address = Address::where('address_id', $customer->address_id)->first();
    $payment = Payment::where('payment_id', $customer->payment_id)->first();

    $address->update([
        'address_number' => $vd['address_number'],
        'address_street' => $vd['address_street'],
        'address_postcode' => $vd['address_postcode'],
    ]);

    $payment->update([
        'account_number' => $vd['account_number'],
    ]);

    $customer->update([
        'customer_email' => $vd['customer_email'],
        'customer_fname' => $vd['customer_fname'],
        'customer_sname' => $vd['customer_sname'],
        'address_id' => $address->address_id,
        'payment_id' => $payment->payment_id,
    ]);

    return redirect()->back();


    }
}
