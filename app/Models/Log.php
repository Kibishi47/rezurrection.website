<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Log extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'event', 'description', 'modelable_id', 'modelable_type'];

    const UPDATED_AT = null;

    public static function createLog($logData)
    {
        Log::create([
            'author_id' => Auth::id(),
            'event' => $logData['event'],
            'description' => $logData['description'],
            'modelable_id' => $logData['modelable_id'],
            'modelable_type' => $logData['modelable_type']
        ]);
    }
}
