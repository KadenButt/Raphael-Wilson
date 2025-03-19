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

<<<<<<< Updated upstream
Route::post('/register/user', [App\Http\Controllers\UserRegisterController::class, 'registerUser'])->name('user.register');
=======
//user
Route::post('/register/user', [App\Http\Controllers\CustomerController::class, 'registerCustomer'])->name('customer.register');

//admin
Route::post('/admin/user', [App\Http\Controllers\AdminController::class, 'registerAdmin'])->name('admin.register');

// wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

//Login
Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('/login/user', [App\Http\Controllers\CustomerController::class, 'loginCustomer'])->name('customer.login');

//logout
Route::get('/logout', function(){
    Auth::logout();
    return redirect(route('home'));
})->name('logout');

//wishlistcontroller
use App\Http\Controllers\WishlistController;

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

//Basket

Route::get('/basket', [App\Http\Controllers\BasketController::class, 'listBasket'])->middleware('auth')->name('basket');

Route::post('/basket/delete', [App\Http\Controllers\BasketController::class, 'deleteBasket'])->middleware('auth')->name('basket.delete');

Route::post('/basket/change', [App\Http\Controllers\BasketController::class, 'updateQuantity'])->middleware('auth')->name('basket.change_quantity');

Route::post('/basket/add', [App\Http\Controllers\BasketController::class, 'addBasket'])->middleware(ValidateUserBasket::class)->name('basket.add');

//Order

Route::get('/order', [App\Http\Controllers\OrderController::class, 'listOrder'])->middleware('auth')->name('order');

Route::post('/order', [App\Http\Controllers\OrderController::class, 'createOrder'])->middleware('auth')->name('order.create');

Route::post('/order/delete', [App\Http\Controllers\OrderController::class, 'deleteOrder'])->middleware('auth')->name('order.delete');


////////////////temp

//populate

Route::get('/populate', [App\Http\Controllers\ProductController::class, 'populateProducts']);
Route::get('/addbaskett', [App\Http\Controllers\BasketController::class, 'addBasketTemp'])->middleware('auth');

Route::get('/check', function(){
    dd(Auth::guard('admin')->check());

})->middleware('auth:admin');;
>>>>>>> Stashed changes

//POST routes
