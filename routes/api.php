<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\WarehouseController;

//Register dan Login
// Route::apiResource('registers', RegisterController::class)->only('store');
Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logout', LogoutController::class)->name('logout');

Route::apiResource('stocks', StockController::class)->only(['index', 'show', 'destroy', 'store']);
Route::post('/stocks/update/{id}', [StockController::class, 'update']);
Route::get('/stocks/edit/{id}', [StockController::class, 'edit']);

Route::get('records', [RecordController::class, 'index']);
Route::get('records/{id}', [RecordController::class, 'show']);

Route::get('warehouses', [WarehouseController::class, 'index']);
Route::get('warehouses/{id}', [WarehouseController::class, 'show']);
