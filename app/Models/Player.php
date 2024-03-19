<?php

namespace App\Models;

use App\Models\PlayerRole;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class Player extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'players';

    protected $fillable = [
        'username',
        'password',
        'roles_id',
        'remember_token'
    ];

    public function logs()
    {
        return $this->hasMany(Log::class, 'author_id');
    }

    public function roles()
    {
        return PlayerRole::whereIn('id', json_decode($this->roles_id ?? "[]"))->get();
    }

}
