<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ValidateUserBasket;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


//homepage
Route::get('/', [App\Http\Controllers\HomePageController::class, 'homePage'])->name('home');

//products
Route::get('/products', [App\Http\Controllers\ProductController::class, 'showProducts'])->name('products');

Route::get('/products/{category_id}', [App\Http\Controllers\ProductController::class, 'showCategory'])->name('category');

Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'showProduct'])->name('product');

Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');


Route::post('/product/search', [App\Http\Controllers\ProductController::class, 'searchProduct'])->name('product.search');

//Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/submit', [App\Http\Controllers\ContactController::class, 'submitForm'])->name('contact.submit');

//About Us
Route::get('/aboutus', function () {
    return view('about');
})->name('aboutUs');

////Register
Route::get('/register', function () {
    return view('register');
})->name('register');

//register customer
Route::post('/register/customer', [App\Http\Controllers\CustomerController::class, 'registerCustomer'])->name('customer.register');

//Login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login/customer', [App\Http\Controllers\CustomerController::class, 'loginCustomer'])->name('customer.login');




//customer routes
Route::middleware('auth')->group(function () {

    //Basket

    Route::get('/basket', [App\Http\Controllers\BasketController::class, 'listBasket'])->name('basket');

    Route::post('/basket/delete', [App\Http\Controllers\BasketController::class, 'deleteBasket'])->name('basket.delete');

    Route::post('/basket/change', [App\Http\Controllers\BasketController::class, 'updateQuantity'])->name('basket.change_quantity');

    Route::post('/basket/add', [App\Http\Controllers\BasketController::class, 'addBasket'])->middleware(ValidateUserBasket::class)->name('basket.add');

    //Order

    Route::get('/order', [App\Http\Controllers\OrderController::class, 'listOrder'])->name('order');

    Route::post('/order', [App\Http\Controllers\OrderController::class, 'createOrder'])->name('order.create');

    Route::post('/order/delete', [App\Http\Controllers\OrderController::class, 'deleteOrder'])->name('order.delete');


    //display for to change user details
    Route::get('/customer/details', [App\Http\Controllers\CustomerController::class, 'showDetails'])->name('customer.details');

    // Update user details
    Route::post('/customer/details/change', [App\Http\Controllers\CustomerController::class, 'updateCustomer'])->name('customer.update');


    //change password
    Route::post('/customer/changepassword', [App\Http\Controllers\CustomerController::class, 'changePassword'])->name('customer.changePassword');

    Route::get("/customer/forgotpassword", function () {
        return view('forgotPword');
    })->name('customer.forgotpw');

    //delete account
    Route::get("/customer/delete/check", [App\Http\Controllers\CustomerController::class, 'deleteCustomerCheck'])->name('customer.delete.check');
    Route::post('/customer/delete', [App\Http\Controllers\CustomerController::class, 'deleteCustomer'])->name('customer.delete');


    //logout
    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('home'));
    })->name('logout');
});


//adming routes
Route::middleware('admin')->group(function () {

    Route::get('/admin/home', function () {
        return view('admin-home');
    })->name('admin.home');


    Route::get('/admin/stock', function () {
        return dd('to-do');
    })->name('stock');

    Route::get('/admin/orders', function () {
        return dd('to-do');
    })->name('orders');

    //admin customer controls
    Route::get('/admin/customers', [App\Http\Controllers\AdminController::class, 'listCustomer'])->name('admin.customers');
    Route::post('/admin/customers/add', [App\Http\Controllers\AdminController::class, 'addAdmin'])->name('admin.add');
    Route::post('/admin/customers/remove', [App\Http\Controllers\AdminController::class, 'removeAdmin'])->name('admin.remove');
    Route::get('/admin/customers/edit/{customer_id}', [App\Http\Controllers\AdminController::class, 'editCustomer'])->name('admin.edit');
    Route::post('/admin/customers/update', [App\Http\Controllers\AdminController::class, 'updateCustomer'])->name('admin.update');
    Route::get('/admin/orders/{customer_id}', [App\Http\Controllers\AdminController::class, 'customerOrders'])->name('admin.orders');
    Route::get('/admin/delete/check/{customer_id}', [App\Http\Controllers\AdminController::class, 'deleteCustomerCheck'])->name('admin.delete.check');
    Route::post('/admin/delete/{customer_id}', [App\Http\Controllers\AdminController::class, 'deleteCustomer'])->name('admin.delete');


    //addmin product controlls
    Route::get('/admin/product/new', [App\Http\Controllers\AdminController::class, 'newProduct'])->name('admin.product.new');
    Route::post('/admin/product/create', [App\Http\Controllers\AdminController::class, 'createProduct'])->name('admin.product.create');
    Route::get('/admin/product/edit/{product_id}', [App\Http\Controllers\AdminController::class, 'editProduct'])->name('admin.product.edit');
    Route::post('/admin/product/udpate/{product_id}', [App\Http\Controllers\AdminController::class, 'udpateProduct'])->name('admin.product.udpate');

    //admin ordres
    Route::get ('/admin/orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('admin.ordersAll');
    Route::get('/admin/orders/items/{order_id}', [App\Http\Controllers\AdminController::class, 'ordersItems'])->name('admin.orderItems');
    Route::post('/admin/orders/status/change', [App\Http\Controllers\AdminController::class, 'statusChange'])->name('admin.status.change');


    //admin stock
    Route::get('/admin/stock', [App\Http\Controllers\AdminController::class, 'stock'] )->name('admin.stock');
    Route::get('/admin/stock/category/{category_id}', [App\Http\Controllers\AdminController::class, 'stockCategories'])->name('admin.stock.category');
    Route::get('/admin/stock/{size}', [App\Http\Controllers\AdminController::class, 'stockItems'])->name('admin.stock.items');
    Route::post('/admin/stock/{item_id}/change', [App\Http\Controllers\AdminController::class, 'stockItemChange'])->name('admin.stock.items.change');

    //admin categories 
    Route::get('/admin/category/new', function(){
        return view('admin-category');
    } )->name('admin.category.new');

    Route::post('/admin/category/create', [App\Http\Controllers\AdminController::class, 'createCategory'])->name('admin.category.create');

});





// Admin Stock Page
Route::get('/adminstock', function() {
    return view('adminstock'); // or your own controller method
})->name('adminstock');


////////////////temp

//populate

Route::get('/populate', [App\Http\Controllers\ProductController::class, 'populateProducts']);
Route::get('/addbaskett', [App\Http\Controllers\BasketController::class, 'addBasketTemp'])->middleware('auth');

Route::get('/check', function () {
    dd(Auth::guard('admin')->check());
})->middleware('auth:admin');;
