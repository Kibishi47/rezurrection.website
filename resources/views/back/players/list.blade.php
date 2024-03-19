@extends('layouts.back')

@section('title', 'Liste de joueurs')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Liste de joueurs</h3>
                    <a href="{{ route('back.players.create') }}" class="btn btn-success">Ajouter un joueur</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Rôles</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)    
                            <tr>
                                <td>{{ $player->id }}</td>
                                <td>{{ $player->username }}</td>
                                <td>{{ $player->roles->pluck('name')->implode(', ') }}</td>
                                <td>
                                    <a href="{{ route('back.players.view', $player->id) }}" class="btn btn-sm btn-danger">Détails</a>
                                </td>
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
