<?php

use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\AuthRedirectMiddleware;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Logout;
use App\Livewire\Users;
use App\Livewire\Cart;
use Illuminate\Support\Facades\Route;


Route::middleware([AuthRedirectMiddleware::class])->group(function () {
Route::get('/login', Login::class);
}); 

Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/dashboard', Dashboard::class);
    Route::get('/logout', Logout::class);
    Route::get('/users', Users::class);
    Route::get('/cart', Cart::class);
});