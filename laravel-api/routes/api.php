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
Route::apiResources([
    'categories' => CategoryController::class,
    'products' => ProductController::class,
]);

/** Protected routes */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/athenticated', function () {
    return true;
});
Route::middleware('auth:api')->group(function () {
    // Show auth user associated cart
    Route::get('cart', [CartController::class, 'show']);
    // Create a new cart item (a new cart if does not exists)
    Route::post('cart', [CartController::class, 'store']);
    // Show auth user associated customer
    Route::get('customer', [CustomerController::class, 'show']);
    //
    Route::post('purchase', [PurchaseController::class, 'store']);
});
