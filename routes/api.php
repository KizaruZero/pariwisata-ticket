<?php
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CategoryController;

// endpoints for frontend
Route::get('/api/destinations', [DestinationController::class, 'getDestination']);
Route::get('/api/regions', [RegionController::class, 'getRegion']);
Route::get('/api/destination/{id}', [DestinationController::class, 'getDestinationDetail']);
Route::get('/api/packages/{id}', [PackageController::class, 'getPackageDetail']);
Route::post('api/orders', [OrderController::class, 'store']);
Route::get('api/orders/history', [OrderController::class, 'orderHistory']);
Route::get('api/categories', [CategoryController::class, 'getCategory']);
Route::get('/api/destinations/{category}', [DestinationController::class, 'filterByCategory']);

