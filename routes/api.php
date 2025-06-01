<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    // users
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::patch('/user/{user}', [AuthController::class, 'update']);
    Route::delete('/user/{user}', [AuthController::class, 'delete']);

    // customers
    Route::apiResource('customers', CustomerController::class);
});
