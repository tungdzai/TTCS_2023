<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAvatarController;

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

Route::prefix("/admin/user")->middleware("auth:admin")->name("admin.")->group(function (){
   Route::get('/home',[HomeController::class,'index'])->name('home');
   Route::get('/add',[HomeController::class,'getAdd'])->name('addUser');
   Route::post('/add',[HomeController::class,'postAdd'])->name("postUser");
   Route::get('/edit',[HomeController::class,'getEdit'])->name('getEdit');
   Route::post('/edit',[HomeController::class,'postEdit'])->name('postEdit');
   Route::get('/delete',[HomeController::class,'deleteUser'])->name('deleteUser');
});
// Route user
Route::prefix('/')->name('user.')->group(function (){
    Route::get('',[UserController::class,'getLogin'])->name("getLogin") ;
    Route::post('',[UserController::class,'postLogin'])->name("postLogin") ;
    Route::get('/register',[UserController::class,'getRegister'])->name("getRegister") ;
});

// Upload avatar
Route::get('/uploadAvatar',[UserAvatarController::class,'index']);
