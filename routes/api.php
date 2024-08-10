<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ProductController;

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
/**
 * @OA\Info(
 *     title="Your API Title",
 *     version="1.0.0"
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="API Server"
 * )
 */


 Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    // Route::post('refresh', 'AuthController');
    Route::post('me', [AuthController::class, 'me']);

});

// product categories
Route::get('/category-products', [CategoryProductController::class, 'showAll']);
Route::get('/category-products/{id}', [CategoryProductController::class, 'showOne']);
Route::post('/category-products', [CategoryProductController::class, 'create']);
Route::put('/category-products/{id}', [CategoryProductController::class, 'update']);

// products
Route::get('/products', [ProductController::class, 'showAll']);
Route::get('/products/{id}', [ProductController::class, 'showOne']);
Route::post('/products', [ProductController::class, 'create']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);