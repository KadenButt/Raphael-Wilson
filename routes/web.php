<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

//products
Route::get('/products', function(){
    return 'WIP';
})->name('products');

//contact 
Route::get('/contact', function(){
    return 'WIP';
})->name('contact');

//About Us
Route::get('/aboutus', function(){
    return 'WIP';
})->name('aboutUs');

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

//Basket

Route::get('/basket', [App\Http\Controllers\BasketController::class, 'listBasket'])->middleware('auth')->name('basket');

Route::post('/basket/delete', [App\Http\Controllers\BasketController::class, 'deleteBasket'])->middleware('auth')->name('basket.delete');

Route::post('/basket/change', [App\Http\Controllers\BasketController::class, 'updateQuantity'])->middleware('auth')->name('basket.change_quantity');

//Order History 

Route::post('/order', [App\Http\Controllers\BasketController::class, 'createOrder'])->middleware('auth')->name('order.create');

////////////////temp 

//populate 

//Route::get('/populate', [App\Http\Controllers\ProductController::class, 'populateProducts']);
Route::get('/addbasket', [App\Http\Controllers\BasketController::class, 'addBasket'])->middleware('auth');