<?php

namespace App\Http\Controllers;

use App\Deal;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function start(Request $request)
    {
        $hour = $request->hour;
        if (Auth::user()) {
            if (Auth::user()->current_session_id === null) {
                $session = Session::create();
                $session->user_id = Auth::user()->id;
                $session->start_time = time();
                $session_stop_time = time() + 3600 * $hour;
                $session->stop_time = $session_stop_time;
                $session->save();

                Auth::user()->current_session_id = $session->id;
                Auth::user()->save();

                $time = time();

                while ($time <= $session_stop_time) {

                    $deal = Deal::create(['session_id' => $session->id]);

                    $random_percent = random_int(1, 2);

                    $random_sign = random_int(1, 20);

                    $bonus = 1 * $random_percent;

                    if ($random_sign > 15) {
                        $bonus = -$bonus;
                    }

                    $deal->bonus = $bonus;

                    $random_time = random_int(1200, 1800);

                    $deal_time = $time + $random_time;

                    $deal->time = $deal_time;

                    $time += $random_time;

                    $deal->save();
                }

            }

        }

        return redirect()->route('analytics');
    }

    public function stop()
    {
        if (Auth::user()) {
            if (Auth::user()->current_session_id !== null) {
                $session = Session::find(Auth::user()->current_session_id);
                $session->status = 0;
                $session->save();

                Auth::user()->current_session_id = null;
                Auth::user()->save();
            }

        }

        return redirect()->route('analytics');
    }

    public function show($id)
    {
        $sessions = Session::get();
        $session = $sessions->where('id', $id)->first();

        $deals = $session->deals;

        return view('user.session', compact('session', 'deals'));
    }
}
