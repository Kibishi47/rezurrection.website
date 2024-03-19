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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Créer un joueur</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('back.players.insert') }}" autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required >
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select class="form-control" name="roles[]" id="roles" multiple>
                                @foreach ($playerRoles as $playerRole)
                                    <option value="{{ $playerRole->id }}">{{ $playerRole->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
