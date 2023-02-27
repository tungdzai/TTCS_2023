<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
//Route auth
Route::prefix('auth/admin')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
    Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');
    Route::get('/logout', [AuthController::class, 'logouts']);
});
