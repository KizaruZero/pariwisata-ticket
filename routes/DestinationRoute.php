<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/destination', [DestinationController::class, 'index'])->name('destination');
require __DIR__ . '/auth.php';
