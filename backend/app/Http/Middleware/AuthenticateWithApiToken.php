<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticateWithApiToken
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->bearerToken() ?? $request->query('api_token') ?? $request->input('api_token');

        if ($header) {
            $user = User::where('api_token', $header)->first();
            if ($user) {
                Auth::login($user);
            }
        }

        if (! Auth::check()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        return $next($request);
    }
}
