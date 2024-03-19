<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Log;
use App\Models\Player;

class PlayerController extends Controller
{
    public function list()
    {
        $players = Player::all();
        return view('back.players.list', [
            'players' => $players
        ]);
    }

    public function view($id)
    {
        $player = Player::findOrFail($id);
        return view('back.players.view', [
            'player' => $player
        ]);
    }

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
        $player = Player::create([
            'username' => Str::Title($request->username),
            'password' => Hash::make($request->password),
        ]);

        $logData = [
            'event' => "Création d'un joueur",
            'description' => "Création du joueur : " . $player->username,
            'modelable_id' => $player->id,
            'modelable_type' => get_class($player),
        ];

        Log::createLog($logData);

        // Rediriger avec un message de succès
        return redirect()->route('back.players.create')->with('success', 'Joueur créé avec succès.');
    }
}
