<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('player')->check()) {
            return $next($request);
        }

        return redirect()->route('front.login'); // Adapt to your login route
    }
}
