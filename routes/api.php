<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\QuotationController;
use App\Http\Controllers\Api\MpesaLogController;

Route::get('/health', fn () => ['status' => 'ok', 'app' => 'Coarse Technologies Backend']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::apiResource('products', ProductController::class);
Route::get('/low-stock', [ProductController::class, 'lowStock']);

Route::apiResource('orders', OrderController::class)->only(['index','store','show','update']);
Route::apiResource('quotations', QuotationController::class)->only(['index','store','show','update']);
Route::apiResource('mpesa-logs', MpesaLogController::class)->only(['index','store','show']);
