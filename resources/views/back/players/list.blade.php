@extends('layouts.back')

@section('title', 'Créer un joueur')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste de joueurs</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table>
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Roles</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)    
                            <tr>
                                <td>{{ $player->id }}</td>
                                <td>{{ $player->username }}</td>
                                <td></td>
                                <td>
                                    <a href="{{ route('back.players.view', $player->id) }}" class="btn btn-danger">Details</a>
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
