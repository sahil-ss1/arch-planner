<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Middleware\AuthenticateWithApiToken;

Route::post('/login', [ApiAuthController::class, 'login']);

// Protected route - after login the client should redirect here
Route::middleware(AuthenticateWithApiToken::class)->get('/after-login', function (Request $request) {
    return response()->json([
        'message' => 'Welcome, you are authenticated via API token.',
        'user' => $request->user(),
    ]);
});

Route::middleware(AuthenticateWithApiToken::class)->post('/logout', [ApiAuthController::class, 'logout']);
