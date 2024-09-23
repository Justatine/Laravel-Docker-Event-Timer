<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('pages.home');
});

route::middleware(['auth', 'is_authenticated'])->group(function () {    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/sign-in', [AuthController::class, 'signin'])->name('login');
Route::get('/sign-up', [AuthController::class, 'signup']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');