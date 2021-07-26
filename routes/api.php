<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\StoreProductsController;
use App\Http\Controllers\Api\SubCategoryStocksController;
use App\Http\Controllers\Api\SubCategoryProductsController;
use App\Http\Controllers\Api\CategorySubCategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource('categories', CategoryController::class);

        // Category Sub Categories
        Route::get('/categories/{category}/sub-categories', [
            CategorySubCategoriesController::class,
            'index',
        ])->name('categories.sub-categories.index');
        Route::post('/categories/{category}/sub-categories', [
            CategorySubCategoriesController::class,
            'store',
        ])->name('categories.sub-categories.store');

        Route::apiResource('stocks', StockController::class);

        Route::apiResource('stores', StoreController::class);

        // Store Products
        Route::get('/stores/{store}/products', [
            StoreProductsController::class,
            'index',
        ])->name('stores.products.index');
        Route::post('/stores/{store}/products', [
            StoreProductsController::class,
            'store',
        ])->name('stores.products.store');

        Route::apiResource('sub-categories', SubCategoryController::class);

        // SubCategory Products
        Route::get('/sub-categories/{subCategory}/products', [
            SubCategoryProductsController::class,
            'index',
        ])->name('sub-categories.products.index');
        Route::post('/sub-categories/{subCategory}/products', [
            SubCategoryProductsController::class,
            'store',
        ])->name('sub-categories.products.store');

        // SubCategory Stocks
        Route::get('/sub-categories/{subCategory}/stocks', [
            SubCategoryStocksController::class,
            'index',
        ])->name('sub-categories.stocks.index');
        Route::post('/sub-categories/{subCategory}/stocks', [
            SubCategoryStocksController::class,
            'store',
        ])->name('sub-categories.stocks.store');

        Route::apiResource('products', ProductController::class);
    });
