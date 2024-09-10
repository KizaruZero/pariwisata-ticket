<?php
use App\Http\Controllers\DestinationController;

Route::get('/api/destinations', [DestinationController::class, 'getDestination']);
Route::get('/api/destination/{id}', [DestinationController::class, 'getDestinationDetail']);