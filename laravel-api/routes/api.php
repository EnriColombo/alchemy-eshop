<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PurchaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/** Public routes */
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);

/** Protected routes */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/authenticated', function () {
    return true;
});
Route::middleware('auth:api')->group(function () {
    // Show auth user associated cart
    Route::get('cart', [CartController::class, 'show']);
    // Create a new cart item (a new cart if does not exists)
    Route::post('cart', [CartController::class, 'store']);
    // Show auth user associated customer
    Route::get('customer', [CustomerController::class, 'show']);
    // Purchase
    Route::post('purchase', [PurchaseController::class, 'store']);
});

/** Protected routes with admin role */
Route::middleware(['auth:api', 'api.admin'])->get('/authenticated/isadmin', function () {
    return true;
});
Route::middleware(['auth:api', 'api.admin'])->group(function () {
    // Products
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{product}', [ProductController::class, 'update']);
    Route::delete('products/{product}', [ProductController::class, 'destroy']);
});
