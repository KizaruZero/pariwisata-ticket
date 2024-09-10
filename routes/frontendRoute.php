<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\auth\RegisteredUserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use Inertia\Inertia;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/destinations', [FrontendController::class, 'destinations'])->name('destinations');
Route::get('/destination/{id}', [FrontendController::class, 'destinationsDetail'])->name('destination.detail');


// review
Route::get('/user/can-review/{id}', [RegisteredUserController::class, 'canReview'])->middleware('auth');
Route::post('/api/review', [ReviewController::class, 'store'])->middleware('auth');


require __DIR__ . '/auth.php';
