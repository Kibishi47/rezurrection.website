<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Log;
use App\Models\Player;
use App\Models\PlayerRole;

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
        $playerRoles = PlayerRole::all();
        return view('back.players.create', [
            'playerRoles' => $playerRoles
        ]);
    }

    public function insert(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'username' => 'required|unique:players|max:255',
            'password' => 'required|min:8',
            'roles' => 'array',
        ]);

        // Créer un nouveau joueur
        $player = Player::create([
            'username' => Str::title($validatedData['username']),
            'password' => Hash::make($validatedData['password']),
            'roles_id' => isset($validatedData['roles']) ? json_encode($validatedData['roles']) : null,
        ]);

        // Créer un log pour la création du joueur
        $logData = [
            'event' => "Création d'un joueur",
            'description' => "Création du joueur : " . $player->username,
            'modelable_id' => $player->id,
            'modelable_type' => Player::class,
        ];
        Log::createLog($logData);

        // Rediriger avec un message de succès
        return redirect()->route('back.players.create')->with('success', 'Joueur créé avec succès.');
    }

    public function edit($id) {
        $player = Player::findOrFail($id);
        $playerRoles = PlayerRole::all();
        return view('back.players.edit', [
            'player' => $player,
            'playerRoles' => $playerRoles
        ]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'username' => 'required|unique:players,username,' . $id . '|max:255',
            'roles' => 'array',
        ]);

        // Récupérer le joueur à mettre à jour
        $player = Player::findOrFail($id);

        // Mettre à jour les attributs du joueur
        $player->update([
            'username' => Str::title($validatedData['username']),
            'roles_id' => isset($validatedData['roles']) ? json_encode($validatedData['roles']) : null,
        ]);

        // Créer un log pour la mise à jour du joueur
        $logData = [
            'event' => "Mise à jour d'un joueur",
            'description' => "Mise à jour du joueur : " . $player->username,
            'modelable_id' => $player->id,
            'modelable_type' => Player::class,
        ];
        Log::createLog($logData);

        // Rediriger avec un message de succès
        return redirect()->route('back.players.edit', $id)->with('success', 'Joueur mis à jour avec succès.');
    }

    public function delete($id) {
        $player = Player::findOrFail($id);
        $player->delete();

        // Créer un log pour la suppression du joueur
        $logData = [
            'event' => "Suppression d'un joueur",
            'description' => "Suppression du joueur : " . $player->username,
            'modelable_id' => $player->id,
            'modelable_type' => Player::class,
        ];
        Log::createLog($logData);
        return redirect()->back()->with(['success' => "Joueur a été supprimé avec succès."]);
    }

}
