@extends('layouts.back')

@section('title', 'Créer un joueur')

@section('js')
<script>
    $(document).ready(function (){
        $("#roles").select2();
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <form method="POST" action="{{ route('back.players.insert') }}" autocomplete="off">
                    @csrf
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Créer un joueur</h3>
                        <a href="{{ route('back.players.list') }}" class="btn btn-light">Retour</a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="roles">Rôles</label>
                            <select class="form-control" name="roles[]" id="roles" multiple>
                                @foreach ($playerRoles as $playerRole)
                                    <option value="{{ $playerRole->id }}">{{ $playerRole->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
