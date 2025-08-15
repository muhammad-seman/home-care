<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Health check
Route::get('/health', function () {
    return response()->json(['status' => 'OK', 'timestamp' => now()]);
});

// Authentication routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
    });
});

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // User routes
    Route::middleware('role:user')->group(function () {
        // Route::get('/bidans', [BidanController::class, 'index']);
        // Route::post('/orders', [OrderController::class, 'store']);
    });
    
    // Bidan routes
    Route::middleware('role:bidan')->group(function () {
        // Route::get('/bidan/orders', [BidanController::class, 'orders']);
    });
    
    // Admin routes
    Route::middleware('role:admin')->group(function () {
        // Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    });
});