@extends('layouts.back')

@section('title', 'Créer un joueur')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Détails du joueur : {{ $player->username }}</h3>
                    <div>
                        <a href="{{ route('back.players.edit', $player->id) }}" class="btn btn-warning">Modifier</a>
                        <button type="button" class="btn btn-danger">Supprimer</button>
                        <a href="{{ route('back.players.list') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <h2>Nom d'utilisateur : {{ $player->username }}</h2>
                    <h3>Rôles :</h3>
                    <ul>
                        @foreach ($player->roles as $role)
                            <li>{{ $role->name }}</li>
                        @endforeach
                    </ul>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Event</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($player->logs as $log)
                                <tr>
                                    <td>{{ $log->created_at }}</td>
                                    <td>{{ $log->event }}</td>
                                    <td>{{ $log->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
