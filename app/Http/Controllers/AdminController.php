<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{


    public function registerAdmin(Request $request)
    {
        //validate data
        $vd = $request->validate([
            'admin_fname' => 'required|max:255|alpha',
            'admin_sname' => 'required|max:255|alpha',
            'admin_email' => 'required|email|max:255',

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

            'password.required' => 'Password is required.',
            'password.regex' => 'The password must be longer then 8 characters contain at least one uppercase letter, one number, and one special character.',

        ]);

        //check for pre-existing email in the database of admin and customer
        $admin = Admin::where('admin_email', $request->input('admin_email'))->first();
        $customer = Customer::where('customer_email', $request->input('customer_email'))->first();




        if($admin != null || $customer != null)
        {
            $error = new MessageBag;
            $error->add('email', 'email is already in use');
            return redirect()->back()->withErrors($error);
        }


        //adds admin customer to data base
        $admin = Admin::create([
            'admin_email' => $vd['admin_email'],
            'admin_password' => bcrypt($vd['admin_password']),
            'admin_fname' => $vd['admin_fname'],
            'admin_sname' => $vd['admin_sname'],

        ]);

        Auth::guard('admin')->login($admin);
        return redirect(route('home'));
    }

    public function loginAdmin(Request $request)
    {

    }

}
