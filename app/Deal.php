<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
        'session_id',
        'status',
        'start_time',
        'duration',
        'duration_min',
        'stop_time',
        'ticker',
        'percent',
        'bonus',
        'sell_or_buy',
        'current_session_rate',
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
