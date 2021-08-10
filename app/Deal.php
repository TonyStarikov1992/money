<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ['session_id', 'bonus', 'status', 'time'];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
