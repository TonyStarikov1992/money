<?php

namespace App\Http\Controllers;

use App\Session;
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
        $current_session_id = null;
        $session_stop_time = null;

        if (Auth::user()->current_session_id !== null) {
            $session = Session::find(Auth::user()->current_session_id);
            if ($session->stop_time <= time()) {
                $session->status = 0;
                $session->save();

                Auth::user()->current_session_id = null;
                Auth::user()->save();
            }
        }

        if (Auth::user()->current_session_id) {
            $current_session_id = Auth::user()->current_session_id;
            $current_session = Session::find($current_session_id);
            $session_stop_time = $current_session->stop_time;
        }



//        $user_money = null;
//        $random_percent = null;
//        $random_sign = null;
//        $bonus = null;
//
//        if (Auth::user()) {
//
//            $user_id = Auth::user()->id;
//            dd($user_id);
//
//            $user_money = Auth::user()->check;
//            $random_percent = random_int(1, 2);
//            $random_sign = random_int(1, 20);
//            $bonus = ($user_money/100) * $random_percent;
//            if ($random_sign > 15) {
//                $user_money += -$bonus;
//                $random_sign = '-';
//            } else {
//                $user_money += $bonus;
//                $random_sign = '+';
//            }
//            Auth::user()->check = $user_money;
//            Auth::user()->save();
//
//        }
        return view('analytics', compact('current_session_id', 'session_stop_time'));
    }
}
