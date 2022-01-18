<?php

use Illuminate\Support\Facades\Route;
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


/*
| Index
*/
Route::get('/', function () {return view('welcome');});

/*
| Auth
*/
Auth::routes();

/*
| PDF
*/

/*
|-------------------------------------------------------------------------
| Admin
|-------------------------------------------------------------------------
*/

/*
| Admin - Dashboard
*/
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

/*
| Admin - Account
*/
/* **** Route::get('/admin/account/view', [App\Http\Controllers\UserController::class, 'adminView'])->name('admin.account.view')->middleware('is_admin'); 
        Route::post('/admin/account/edit', [App\Http\Controllers\UserController::class, 'adminEdit'])->name('admin.account.edit')->middleware('is_admin'); */

/*
| Admin - Category
*/
Route::get('/admin/category', [App\Http\Controllers\CategoryController::class, 'view'])->name('admin.category')->middleware('is_admin');
Route::post('/admin/category/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('admin.category.add')->middleware('is_admin');
Route::get('/admin/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('admin.category.delete')->middleware('is_admin');

/*
| Admin - Product
*/
Route::get('/admin/product/add', [App\Http\Controllers\ProductController::class, 'adminAdd'])->name('admin.product.add')->middleware('is_admin');
Route::post('/admin/product/add/new', [App\Http\Controllers\ProductController::class, 'adminCreate'])->name('admin.product.create')->middleware('is_admin');
Route::get('/admin/product/view', [App\Http\Controllers\ProductController::class, 'adminView'])->name('admin.product.view')->middleware('is_admin');
Route::get('/admin/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'adminEdit'])->name('admin.product.edit')->middleware('is_admin');
Route::post('/admin/product/update', [App\Http\Controllers\ProductController::class, 'adminUpdate'])->name('admin.product.update')->middleware('is_admin');
Route::get('/admin/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'adminDelete'])->name('admin.product.delete')->middleware('is_admin');

/*
| Admin - Order
*/
Route::get('/admin/order/add', [App\Http\Controllers\OrderController::class, 'adminAdd'])->name('admin.order.add')->middleware('is_admin');
Route::post('/admin/order/add/new', [App\Http\Controllers\OrderController::class, 'adminCreate'])->name('admin.order.create')->middleware('is_admin');
Route::get('/admin/order/view', [App\Http\Controllers\OrderController::class, 'adminView'])->name('admin.order.view')->middleware('is_admin');
Route::get('/admin/order/edit/{id}', [App\Http\Controllers\OrderController::class, 'adminEdit'])->name('admin.order.edit')->middleware('is_admin');
Route::post('/admin/order/update', [App\Http\Controllers\OrderController::class, 'adminUpdate'])->name('admin.order.update')->middleware('is_admin');
Route::get('/admin/order/delete/{id}', [App\Http\Controllers\OrderController::class, 'adminDelete'])->name('admin.order.delete')->middleware('is_admin');

/*
| Admin - Warranty
*/
Route::get('/admin/warranty/add', [App\Http\Controllers\WarrantyController::class, 'adminAdd'])->name('admin.warranty.add')->middleware('is_admin');
Route::post('/admin/warranty/add/new', [App\Http\Controllers\WarrantyController::class, 'adminCreate'])->name('admin.warranty.create')->middleware('is_admin');
Route::get('/admin/warranty/view', [App\Http\Controllers\WarrantyController::class, 'adminView'])->name('admin.warranty.view')->middleware('is_admin');
Route::get('/admin/warranty/edit/{id}', [App\Http\Controllers\WarrantyController::class, 'adminEdit'])->name('admin.warranty.edit')->middleware('is_admin');
Route::post('/admin/warranty/update', [App\Http\Controllers\WarrantyController::class, 'adminUpdate'])->name('admin.warranty.update')->middleware('is_admin');
Route::get('/admin/warranty/delete/{id}', [App\Http\Controllers\WarrantyController::class, 'adminDelete'])->name('admin.warranty.delete')->middleware('is_admin');

/*
|-------------------------------------------------------------------------
| User
|-------------------------------------------------------------------------
*/

/*
| User - Dashboard
*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
| User - Account
*/
Route::get('/account/view', [App\Http\Controllers\UserController::class, 'userView'])->name('user.account.view');
/* **** Route::post('/account/edit', [App\Http\Controllers\UserController::class, 'userEdit'])->name('user.account.edit'); */

/*
| User - Order
*/
Route::get('/order/view', [App\Http\Controllers\OrderController::class, 'userView'])->name('user.order.view');
Route::get('/order/delete/{id}', [App\Http\Controllers\OrderController::class, 'userDelete'])->name('user.order.delete');
/* ***** Route::get('/order/view/{id}', [App\Http\Controllers\OrderController::class, 'userViewDetail'])->name('user.order.view.detail');*/

/*
| User - checkout
*/
Route::get('/checkout/view', [App\Http\Controllers\PaymentController::class, 'userView'])->name('user.checkout.view'); 
Route::get('/checkout/view/{id}', [App\Http\Controllers\PaymentController::class, 'userViewID'])->name('user.checkout.view.id'); 
Route::post('/checkout/add', [App\Http\Controllers\PaymentController::class, 'userAdd'])->name('user.checkout.add');
Route::post('/checkout', [App\Http\Controllers\PaymentController::class, 'userPayment'])->name('user.checkout.payment'); 

/*
| User - Cart
*/
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'userAdd'])->name('user.cart.add');
Route::get('/cart/view', [App\Http\Controllers\CartController::class, 'userView'])->name('user.cart.view');
/* ***** Route::post('/cart/edit', [App\Http\Controllers\CartController::class, 'userEdit'])->name('user.cart.edit'); */
/* ***** Route::post('/cart/delete', [App\Http\Controllers\CartController::class, 'userEdit'])->name('user.cart.delete'); */

/*
| User - Product
*/
Route::get('/product/view', [App\Http\Controllers\ProductController::class, 'userView'])->name('user.product.view');
Route::get('/product/view/{id}', [App\Http\Controllers\ProductController::class, 'userViewDetail'])->name('user.product.view.detail');

/*
| User - Warranty
*/
Route::get('/warranty/view', [App\Http\Controllers\WarrantyController::class, 'userView'])->name('user.warranty.view');

