<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ValidateUserBasket;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\HomePageController::class, 'homePage'])->name('home');

//products
Route::get('/products', [App\Http\Controllers\ProductController::class, 'showProducts'] )->name('products');

Route::get('/products/{category_id}', [App\Http\Controllers\ProductController::class, 'showCategory'] )->name('category');

Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'showProduct'] )->name('product');

Route::post('/product/search', [App\Http\Controllers\ProductController::class, 'searchProduct'] )->name('product.search');


//Contact
Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::post('/contact/submit', [App\Http\Controllers\ContactController::class, 'submitForm'])->name('contact.submit');

//About Us
Route::get('/aboutus', function(){
    return view('about');
})->name('aboutUs');

////Register

Route::get('/register', function(){
    return view('register');
})->name('register');

//register customer
Route::post('/register/customer', [App\Http\Controllers\CustomerController::class, 'registerCustomer'])->name('customer.register');

//admin

Route::get('/admin/test', function(){dd('todo');})->middleware(AdminMiddleware::class);


//Login
Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('/login/customer', [App\Http\Controllers\CustomerController::class, 'loginCustomer'])->name('customer.login');

//forgot password
Route::get("/customer/forgotpassword", function(){
    return view('forgotPword');
})->middleware('auth')->name('customer.forgotpw');

//change password
Route::post('/customer/changepassword', [App\Http\Controllers\CustomerController::class, 'changePassword'])->middleware('auth')->name('customer.changePassword');

//logout
Route::get('/logout', function(){

    Auth::logout();
    return redirect(route('home'));
})->name('logout');

//Basket

Route::get('/basket', [App\Http\Controllers\BasketController::class, 'listBasket'])->middleware('auth')->name('basket');

Route::post('/basket/delete', [App\Http\Controllers\BasketController::class, 'deleteBasket'])->middleware('auth')->name('basket.delete');

Route::post('/basket/change', [App\Http\Controllers\BasketController::class, 'updateQuantity'])->middleware('auth')->name('basket.change_quantity');

Route::post('/basket/add', [App\Http\Controllers\BasketController::class, 'addBasket'])->middleware(ValidateUserBasket::class)->name('basket.add');

//Order

Route::get('/order', [App\Http\Controllers\OrderController::class, 'listOrder'])->middleware('auth')->name('order');

Route::post('/order', [App\Http\Controllers\OrderController::class, 'createOrder'])->middleware('auth')->name('order.create');

Route::post('/order/delete', [App\Http\Controllers\OrderController::class, 'deleteOrder'])->middleware('auth')->name('order.delete');


//admin
Route::get('/admin/home', function()
{
    return view('admin-home');
});

Route::get('/admin/stock', function()
{
    return dd('to-do');
})->name('stock');

Route::get('/admin/orders', function()
{
    return dd('to-do');
})->name('orders');

Route::get('/admin/customers', function()
{
    return dd('to-do');
})->name('customers');


//display for to change user details
Route::get('/user/details', [App\Http\Controllers\CustomerController::class, 'showDetails'])->middleware("auth")->name('customer.details');

//udpates user details
Route::post('/user/details/change', [App\Http\Controllers\CustomerController::class, 'updateCustomer'])->middleware("auth")->name('customer.update');

>>>>>>> development


////////////////temp

//populate

Route::get('/populate', [App\Http\Controllers\ProductController::class, 'populateProducts']);
Route::get('/addbaskett', [App\Http\Controllers\BasketController::class, 'addBasketTemp'])->middleware('auth');

Route::get('/check', function(){
    dd(Auth::guard('admin')->check());

})->middleware('auth:admin');;

