<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

//Register dan Login
// Route::apiResource('registers', RegisterController::class)->only('store');
// Route::post('/login', [LoginController::class,'login']);

//TemplateController
Route::apiResource('stocks', StockController::class)->only(['index', 'show', 'destroy']);
Route::post('/stocks/update/{id}', [StockController::class, 'update'] );
