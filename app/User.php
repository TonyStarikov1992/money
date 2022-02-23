<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'country',
        'birthday_day',
        'birthday_month',
        'birthday_year',
        'locale',
        'email',
        'phone',
        'password',
        'special_code',
        'user_code',
        'agreement',
        'status',
        'check',
        'current_order_id',
        'current_session_id',
        'quickdeal_id',
        'withdrawals_id',
        'deposit_id',
        'is_admin',
        'is_sub_admin',
        'is_bot',
        'register_time',
        'last_visit',
        'settings_update_time',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->is_admin == 1;
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function quickdeals()
    {
        return $this->hasMany(Quickdeal::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
