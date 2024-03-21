@extends('layouts.back')

@section('title', 'Modifier un joueur')

@section('js')
<script>
    $(document).ready(function (){
        $("#roles").select2();
    });
</script>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="card-title">Modifier un joueur</h3>
                <a href="{{ route('back.players.view', $player->id) }}" class="btn btn-secondary">Retour</a>
            </div>
            <form method="POST" action="{{ route('back.players.update', $player->id) }}" autocomplete="off">
                @csrf
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') ?? $player->username }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="roles" class="form-label">Rôles</label>
                        <select class="form-select" name="roles[]" id="roles" multiple aria-label="Sélectionnez les rôles">
                            @foreach ($playerRoles as $playerRole)
                                <option value="{{ $playerRole->id }}"@if($player->roles->contains($playerRole)) selected @endif>{{ $playerRole->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
