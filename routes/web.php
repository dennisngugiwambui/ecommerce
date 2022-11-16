<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Home page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');


// Category routes
Route::get('/view_category', [App\Http\Controllers\AdminController::class, 'view_category'])->name('view_category');

Route::post('/category', [App\Http\Controllers\AdminController::class, 'category'])->name('category');

Route::post('/updatecategory/{id}', [App\Http\Controllers\AdminController::class, 'CategoryUpdate'])->name('category.update');


Route::post('/categorydestroy/{id}', [App\Http\Controllers\AdminController::class, 'DestroyCategory'])->name('category.destroy');

//Product Routes

Route::get('/view_products', [App\Http\Controllers\AdminController::class, 'view_products'])->name('view_products');

Route::post('/products', [App\Http\Controllers\AdminController::class, 'products'])->name('products');

Route::post('/productsupdate/{id}', [App\Http\Controllers\AdminController::class, 'UpdateProducts'])->name('product.update');

Route::post('/productdelete/{id}', [App\Http\Controllers\AdminController::class, 'DeleteProducts'])->name('product.delete');

Route::get('/product_details/{title}', [App\Http\Controllers\HomeController::class, 'product_details'])->name('product_details');

// Cart
Route::post('/add_cart/{id}', [App\Http\Controllers\HomeController::class, 'add_cart'])->name('add_cart');
Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
Route::get('/remove_cart/{id}', [App\Http\Controllers\HomeController::class, 'remove_cart'])->name('remove_cart');

// Payment routes
Route::get('/CashPay', [App\Http\Controllers\HomeController::class, 'cashPay'])->name('cashPay');
// stripe
Route::get('/stripe/{totalprice}', [App\Http\Controllers\HomeController::class, 'stripe'])->name('stripe');

Route::get('/stripe_pay', [App\Http\Controllers\HomeController::class, 'stripePost'])->name('stripe.post');


//Orders route

Route::get('/orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('orders');

Route::get('/decline_order', [App\Http\Controllers\AdminController::class, 'decline_orders'])->name('orders_decline');
Route::post('/orders_delete/{id}', [App\Http\Controllers\AdminController::class, 'delete_orders'])->name('orders_delete');

Route::get('/confirmed_order', [App\Http\Controllers\AdminController::class, 'confirmed_orders'])->name('orders_confirmed');
Route::post('/orders_confirm/{id}', [App\Http\Controllers\AdminController::class, 'confirm_orders'])->name('confirm_orders');
Route::get('/confirmed_orders/', [App\Http\Controllers\AdminController::class, 'Orders_confirming'])->name('Orders_confirming');
Route::get('/delivery_status', [App\Http\Controllers\AdminController::class, 'delivery_status'])->name('delivery_status');
Route::post('/delivered_orders/{id}', [App\Http\Controllers\AdminController::class, 'delivered_orders'])->name('delivered_orders');

Route::get('/all_delivered', [App\Http\Controllers\AdminController::class, 'all_delivered'])->name('all_delivered');

// Receipts
Route::get('/print_receipt/{id}', [App\Http\Controllers\AdminController::class, 'print_receipts'])->name('print_receipt');


// Email
Route::post('/send_user_mail/{id}', [App\Http\Controllers\AdminController::class, 'send_email'])->name('send_user_mail');


Route::get('/make_user_mail/{id}', [App\Http\Controllers\AdminController::class, 'sending_emails'])->name('sending_emails');

// User orders
Route::get('/my_orders', [App\Http\Controllers\HomeController::class, 'show_orders'])->name('show_orders');

//contact page
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);

Route::post('/cancel_order/{id}', [App\Http\Controllers\HomeController::class, 'cancel_orders'])->name('cancel_orders');
