<?php

use App\Http\Controllers\API\Customers\AuthController;
use App\Http\Controllers\API\Customers\CustomersController;
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

Route::get('/login-customer', function (){
    return view('customer.login.loginCustomer');
});
Route::post('/login-customer',[AuthController::class,'login'])->name("postLoginCustomer");

Route::middleware('auth:customer')->group(function () {
    Route::get('/customers', [CustomersController::class,'index']);
});
