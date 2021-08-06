<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function main()
    {
        return view('main');
    }

    public function markets()
    {
        return view('markets');
    }

    public function trading()
    {
        return view('trading');
    }

    public function analytics()
    {
        $user_money = Auth::user()->check;
        $random_percent = random_int(1, 2);
        $random_sign = random_int(1, 20);
        $bonus = ($user_money/100) * $random_percent;
        if ($random_sign > 15) {
            $user_money += -$bonus;
            $random_sign = '-';
        } else {
            $user_money += $bonus;
            $random_sign = '+';
        }
        Auth::user()->check = $user_money;
        Auth::user()->save();

        return view('analytics' , compact('user_money', 'random_percent', 'bonus', 'random_sign'));
    }
}
