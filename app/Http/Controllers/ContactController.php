<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        $vd = $request->validate([
            'name' => 'required|max:255|alpha',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ], [
            'name.required' => 'Inorder to submit this contact form you must enter your name',
            'name.alpha' => 'Your name must contain no number of symbols',
            'email.required' => 'Inorder to submit this contact form you must enter your email',
            'message.required' => 'Inorder to submit this contact form you must write a message'
        ]);
    }
}
