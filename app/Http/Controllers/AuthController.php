<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Player;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            // Authentification réussie
            return redirect()->intended('/');
        }

        // Authentification échouée
        return back()->withErrors(['username' => 'Nom d\'utilisateur ou mot de passe incorrect']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
