<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\StoreCustomerController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\VendorMetricController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminController;

// Authentication
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    // Stores
    Route::apiResource('stores', StoreController::class);
    // Products
    Route::apiResource('products', ProductController::class);
    // Orders
    Route::apiResource('orders', OrderController::class);
    // Payments
    Route::apiResource('payments', PaymentController::class);
    // Store Customers
    Route::apiResource('store-customers', StoreCustomerController::class);
    // Subscriptions
    Route::apiResource('subscriptions', SubscriptionController::class);
    // Vendor Metrics
    Route::apiResource('vendor-metrics', VendorMetricController::class);
    // Admin (example: metrics, dashboard, etc.)
    Route::get('admin/metrics', [AdminController::class, 'metrics']);
});
