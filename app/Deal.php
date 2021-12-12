<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
        'session_id',
        'bonus',
        'status',
        'time',
        'start_time',
        'duration',
        'sell_or_buy',
        'ticker'
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
