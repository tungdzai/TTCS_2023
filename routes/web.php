<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\User\Categories\CategoriesController;
use  App\Http\Controllers\User\Products\ProductsController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Products\DownloadController;
use App\Http\Controllers\User\Products\SearchController;
use App\Http\Controllers\Admin\SearchUserController;
use App\Http\Controllers\Admin\SendMailController;
use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\User\Orders\OrderController;


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
Route::prefix('auth/admin')->name('auth.')->group(function () {
    Route::get('', [AdminController::class, 'getLogin'])->name("getLogin");
    Route::post('', [AdminController::class, 'postLogin'])->name("postLogin");
});

Route::prefix("/admin/user")->middleware("auth:admin")->name("admin.")->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/add', [HomeController::class, 'getAdd'])->name('addUser');
    Route::post('/add', [HomeController::class, 'postAdd'])->name("postUser");
    Route::get('/edit', [HomeController::class, 'getEdit'])->name('getEdit');
    Route::post('/edit', [HomeController::class, 'postEdit'])->name('postEdit');
    Route::get('/delete', [HomeController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/search', [SearchUserController::class, 'search'])->name("search");

    Route::get('/provinces', [AccommodationController::class, 'getProvinces'])->name("getProvinces");
    Route::get('/districts/{province_id}', [AccommodationController::class, 'getDistricts']);
    Route::get('/communes/{district_id}', [AccommodationController::class, 'getCommunes']);

    Route::get('language/{locale}',[LanguageController::class,'index'])->name('language');

});

// Route user
Route::prefix('/')->name('user.')->group(function () {
    Route::get('', [UserController::class, 'getLogin'])->name("getLogin");
    Route::post('', [UserController::class, 'postLogin'])->name("postLogin");
    Route::get('/register', [UserController::class, 'getRegister'])->name("getRegister");
});


//Route Category Product Order
Route::prefix('user/')->middleware('auth:user')->name('user.')->group(function () {
    Route::get('/category', [CategoriesController::class, 'index'])->name('category');
    Route::get('/add-category', [CategoriesController::class, 'addCategory'])->name('addCategory');
    Route::post('/add-category', [CategoriesController::class, 'handleAddCategory'])->name('handleAddCategory');
    Route::get('/edit-category', [CategoriesController::class, 'getEditCategory'])->name('getEditCategory');
    Route::post('/edit-category', [CategoriesController::class, 'handleEditCategory'])->name('handleEditCategory');
    Route::get('/delete-Category', [CategoriesController::class, 'deleteCategory'])->name('deleteCategory');

    Route::get('/product', [ProductsController::class, 'index'])->name('product');
    Route::get('/add-product', [ProductsController::class, 'addProduct'])->name("addProduct");
    Route::post('/add-product', [ProductsController::class, 'handleAddProduct'])->name("handleAddProduct");
    Route::get('/edit-product', [ProductsController::class, 'getEditProduct'])->name("getEditProduct");
    Route::post('/edit-product', [ProductsController::class, 'handleEditProduct'])->name("handleEditProduct");
    Route::get("/delete-product/{id}", [ProductsController::class, 'deleteProduct'])->name("deleteProduct");

    Route::post('/search', [SearchController::class, 'search'])->name("search");

    Route::get('order',[OrderController::class,'getAllOrder'])->name('getAllOrder');
    Route::get('detail/{id}',[OrderController::class,'detail'])->name('getDetail');
    Route::get("/billPDF", [OrderController::class, 'billPDF'])->name("billPDF");

});
// Download
Route::prefix('/download')->name("download.")->group(function () {
    Route::get("/CSV", [DownloadController::class, 'downloadCSV'])->name("CSV");
    Route::get("/PDF", [DownloadController::class, 'downloadPDF'])->name("PDF");
});


