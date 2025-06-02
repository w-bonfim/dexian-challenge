<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::patch('/user/{user}', [AuthController::class, 'update']);
    Route::delete('/user/{user}', [AuthController::class, 'delete']);

    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('products', ProductController::class);
});
