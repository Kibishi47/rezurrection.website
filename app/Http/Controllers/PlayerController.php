<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Log;
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
        $player = Player::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            // Ajoutez d'autres champs si nécessaire
        ]);

        $logData = [
            'event' => "Création",
            'description' => "Création d'un joueur",
            'modelable_id' => $player->id,
            'modelable_type' => get_class($player),
        ];

        $this->createLog($logData);

        // Rediriger avec un message de succès
        return redirect()->route('back.players.create')->with('success', 'Joueur créé avec succès.');
    }





    

    private function createLog($logData)
    {
        Log::create([
            'author_id' => Auth::id(),
            'event' => $logData['event'],
            'description' => $logData['description'],
            'modelable_id' => $logData['modelable_id'],
            'modelable_type' => $logData['modelable_type']
        ]);
    }
}
