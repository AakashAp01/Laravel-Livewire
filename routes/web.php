<?php

use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\AuthRedirectMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([AuthRedirectMiddleware::class])->group(function () {
    Route::get('/login', function () {
        return view('login-signup');
    })->name('login');
});

Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
