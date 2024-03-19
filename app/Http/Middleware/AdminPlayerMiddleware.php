<?php

namespace App\Http\Middleware;

use App\Models\PlayerRole;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPlayerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()) {
            $player = Auth::user();
            $adminRole = PlayerRole::where('name', "Admin")->first();
            if ($player->roles->contains($adminRole)) {
                return $next($request);
            }
        }
        return redirect()->back()->withErrors(['error' => "Vous n'avez pas l'autorisation d'accéder à cette page !"]);
    }
}
