<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;

//Register dan Login
// Route::apiResource('registers', RegisterController::class)->only('store');
Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::apiResource('stocks', StockController::class)->only(['index', 'show', 'destroy', 'store']);
Route::post('/stocks/update/{id}', [StockController::class, 'update']);
Route::get('/stocks/edit/{id}', [StockController::class, 'edit']);
