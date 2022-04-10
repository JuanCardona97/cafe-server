<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use GuzzleHttp\Promise\Create;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Producto
Route::get('/product', [ProductController::class, 'getProducts']);
Route::post('/product', [ProductController::class, 'createProduct']);
Route::put('/product/{id}', [ProductController::class, 'updateProduct']);
Route::delete('/product/{id}', [ProductController::class, 'deleteProduct']);

//Venta
Route::post('/sale', [SaleController::class, 'createSale']);
Route::get('/sale', [SaleController::class, 'getSales']);
