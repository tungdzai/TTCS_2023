<?php

use App\Http\Controllers\API\Customers\AuthController;
use App\Http\Controllers\API\Customers\CustomersController;
use App\Http\Controllers\API\Customers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\AuthCustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/login-customer',[AuthCustomerController::class,'login']);

Route::post('/login-customer',[AuthController::class,'login'])->name("postLoginCustomer");
Route::post('/register-customer',[AuthController::class,'register'])->name("postRegisterCustomer");

Route::prefix('auth/customer')->middleware('auth:customer')->name('customer.')->group(function () {

    Route::get('/', [CustomersController::class,'getCustomer'])->name('getCustomer');
    Route::get('show',[CustomersController::class,'showCustomer'])->name('showCustomer');
    Route::put('/update',[CustomersController::class,'updateCustomer'])->name('updateCustomer');
    Route::get('/product/all',[ProductController::class,'getProductAll'])->name('getProductAll');
    Route::get('/product/{product_id}',[ProductController::class,'getProductByID'])->name('getProductByID');

    Route::post('/purchase',[CustomersController::class,'purchase'])->name('customer.purchase');
});
