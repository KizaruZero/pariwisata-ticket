<?php
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PackageController;  
use App\Http\Controllers\OrderController;  

Route::get('/api/destinations', [DestinationController::class, 'getDestination']);
Route::get('/api/destination/{id}', [DestinationController::class, 'getDestinationDetail']);
Route::get('/api/packages/{id}', [PackageController::class, 'getPackageDetail']);
Route::post('api/orders', [OrderController::class, 'store']);