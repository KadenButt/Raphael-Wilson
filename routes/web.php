<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function(){
    return view('login');
});

Route::get('/register', function(){
    return view('register');
});

Route::post('/register/user', [App\Http\Controllers\UserRegisterController::class, 'registerUser'])->name('user.register');

//POST routes
