<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SubCategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/get-sub-category-by-category-id', [HomeController::class, 'getSubCategoryByCategory'])->name('getSubCategoryByCategory');
Route::get('/get-product-by-sub-category-id', [HomeController::class, 'getproductBySubCategory'])->name('getproductBySubCategory');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('stocks', StockController::class);
        Route::resource('stores', StoreController::class);
        Route::resource('sub-categories', SubCategoryController::class);
        Route::resource('products', ProductController::class);
    });

    Route::post('/abc', function () {
        return view('welcome');
    });
    