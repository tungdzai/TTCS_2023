<?php

use App\Http\Controllers\API\Customers\AuthController;
use App\Http\Controllers\API\Customers\CustomersController;
use App\Http\Controllers\API\Customers\ProductController;
use Illuminate\Support\Facades\Route;

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
// Route view login customer
Route::get('/login-customer', function (){
    return view('customer.login.loginCustomer');
});
Route::post('/login-customer',[AuthController::class,'login'])->name("postLoginCustomer");

Route::prefix('auth/customer')->middleware('auth:customer')->name('customer.')->group(function () {
    Route::get('/', [CustomersController::class,'getCustomer'])->name('customer.getCustomer');
    Route::put('/update',[CustomersController::class,'updateCustomer'])->name('customer.updateCustomer');
    Route::get('/product/all',[ProductController::class,'getProductAll'])->name('customer.getProductAll');
    Route::get('/product/{product_id}',[ProductController::class,'getProductByID'])->name('customer.getProductByID');

    Route::post('/purchase',[CustomersController::class,'purchase'])->name('customer.purchase');
});
