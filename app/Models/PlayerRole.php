<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerRole extends Model
{
    use HasFactory;

    protected $table = 'player_roles';

    protected $fillable = [
        'name'
    ];
}
