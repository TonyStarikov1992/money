<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'user_id',
        'rate',
        'admin_status',
        'payment_status',
        'time',
        'status',
        'processing',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
