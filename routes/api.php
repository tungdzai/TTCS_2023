<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customers\CustomersController;
use App\Http\Controllers\Customers\AuthController;

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
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/login-customer',[AuthController::class,'index'])->name("loginCustomer");
Route::post('/login-customer',[AuthController::class,'login'])->name("postLoginCustomer");


Route::middleware('auth:customer')->group(function () {
    Route::get('/customers', [CustomersController::class,'index']);
});
