<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use Illuminate\Support\Facades\Auth;


// Web authentication routes
Route::get('/', [WebAuthController::class, 'showLogin']);
Route::get('/login', [WebAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [WebAuthController::class, 'login'])->name('login.post');
Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
