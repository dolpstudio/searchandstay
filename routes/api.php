<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\BookStoreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::get('user', 'user');
});


Route::apiResource('books', BookController::class);
Route::apiResource('stores', StoreController::class);
Route::controller(BookStoreController::class)->prefix('bookstore')->group(function () {
    Route::post('/{book}/{store}', 'store');
    Route::delete('/{book}/{store}', 'destroy');
});