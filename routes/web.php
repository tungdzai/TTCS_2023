<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//test view
Route::get('/home', function () {
    return view('admin.users');
});

// Route admin
Route::prefix('auth/admin')->name('auth.')->group(function (){
   Route::get('',[AdminController::class,'getLogin'])->name("getLogin") ;
   Route::post('',[AdminController::class,'postLogin'])->name("postLogin") ;
});
// Route user
Route::prefix('/')->name('user.')->group(function (){
    Route::get('',[UserController::class,'getLogin'])->name("getLogin") ;
    Route::post('',[UserController::class,'postLogin'])->name("postLogin") ;
    Route::get('/register',[UserController::class,'getRegister'])->name("getRegister") ;


});
