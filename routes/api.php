<?php
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;

// endpoints for frontend
Route::get('/api/destinations', [DestinationController::class, 'index']);
Route::get('/api/destination/recomendation', [DestinationController::class, 'getRecommendedDestination']);
Route::get('/api/regions', [RegionController::class, 'getRegion']);
Route::get('/api/destination/{id}', [DestinationController::class, 'getDestinationDetail']);
Route::get('/api/packages/{id}', [PackageController::class, 'getPackageDetail']);
Route::post('api/orders', [OrderController::class, 'store']);
Route::get('api/orders/history', [OrderController::class, 'orderHistory']);
Route::get('api/categories', [CategoryController::class, 'getCategory']);
Route::get('/api/destinations/{category}', [DestinationController::class, 'filterByCategory']);
Route::get('/api/destination/{id}/lowest-price', [DestinationController::class, 'getLowestPrice']);

// Like
Route::post('/api/destination/{id}/like', action: [FavoriteController::class, 'likeDestination'])->middleware('auth');
Route::get('/api/profile/favorite', [FavoriteController::class, 'getFavoriteDestinations']);

require __DIR__ . '/auth.php';

