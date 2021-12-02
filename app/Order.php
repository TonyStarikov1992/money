<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'admin_status',
        'payment_status',
        'type',
        'expires_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
