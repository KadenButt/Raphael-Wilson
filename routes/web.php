<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

//Register 

Route::get('/register', function(){
    return view('register');
})->name('register');

Route::post('/register/user', [App\Http\Controllers\CustomerController::class, 'registerCustomer'])->name('customer.register');
 
//Login
Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('/login/user', [App\Http\Controllers\CustomerController::class, 'loginCustomer'])->name('customer.login');

