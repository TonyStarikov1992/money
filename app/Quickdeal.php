<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quickdeal extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'ticker',
        'bonus',
        'start_time',
        'stop_time',
        'time',
        'sell_or_buy',
        'sign',
        'rate',
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
