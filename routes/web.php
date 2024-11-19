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
>>>>>>> e1f59447e19c883779a0789df0c0e2eecdd4d261
});

Route::post('/register/user', [App\Http\Controllers\UserRegisterController::class, 'registerUser'])->name('user.register');

//POST routes
