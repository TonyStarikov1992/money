<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'user_id',
        'order_amount',
        'order_id',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
