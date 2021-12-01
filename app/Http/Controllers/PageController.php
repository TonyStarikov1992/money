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

    public function charity()
    {
        return view('charity');
    }

    public function charityPay($type)
    {
        if ($type == 'covid') {
            return view('charity_covid');
        } elseif ($type == 'food') {
            return view('charity_food');
        }  elseif ($type == 'earth') {
            return view('charity_earth');
        } else {
            return redirect()->route('charity');
        }
    }

    public function analytics()
    {
        $current_session_id = null;
        $session_stop_time = null;
        $user_money = 0;

        if (Auth::user()) {
            $user_money = Auth::user()->check;
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
        }

        return view('analytics', compact('current_session_id', 'session_stop_time', 'user_money'));
    }
}
