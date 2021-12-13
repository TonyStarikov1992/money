<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    protected $fillable = [
        'rate',
        'user_id',
        'admin_status',
        'payment_status',
        'type',
        'time',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
