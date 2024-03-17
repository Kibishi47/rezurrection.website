<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Player;

class PlayerController extends Controller
{
    public function create()
    {
        return view('back.players.create');
    }

    public function insert(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'username' => 'required|unique:players|max:255',
            'password' => 'required|min:8',
        ]);

        // Créer un nouveau joueur
        Player::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            // Ajoutez d'autres champs si nécessaire
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('back.players.create')->with('success', 'Joueur créé avec succès.');
    }
}
