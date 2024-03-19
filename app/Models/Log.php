<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'event', 'description', 'modelable_id', 'modelable_type'];

    const UPDATED_AT = null;
}
