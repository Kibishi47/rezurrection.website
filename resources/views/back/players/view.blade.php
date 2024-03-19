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

                    <h1>{{ $player->username }}</h1>

                    <table>
                        <thead>
                            <th>Date</th>
                            <th>Event</th>
                            <th>Description</th>
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
