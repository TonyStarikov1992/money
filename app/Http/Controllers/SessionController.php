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
        $rate = $request->rate;
        $hour = $request->hour;
        if (Auth::user()) {
            if ($rate < 200 or (Auth::user()->check - $rate) < 0) {
                return redirect()->route('analytics');
            }
            if (Auth::user()->current_session_id === null) {
                $session = Session::create();
                $session->user_id = Auth::user()->id;
                $session->start_time = time();
                $session_stop_time = time() + (3600 * $hour);
                $session->stop_time = $session_stop_time;
                $session->rate = $rate;
                $session->start_rate = $rate;
                $session->save();

                Auth::user()->check -= $rate;

                Auth::user()->current_session_id = $session->id;
                Auth::user()->save();

                $time = time();

                while ($time <= $session_stop_time) {

                    $deal = Deal::create(['session_id' => $session->id]);

                    $deal->start_time = $time;

                    $random_percent = random_int(1, 2);

                    $random_sign = random_int(1, 20);

                    if ($random_sign == 1) {
                        $deal->ticker = 'BTC/USD';
                    }

                    if ($random_sign == 2) {
                        $deal->ticker = 'SHIB/USD';
                    }

                    if ($random_sign == 3) {
                        $deal->ticker = 'ETH/USD';
                    }

                    if ($random_sign == 4) {
                        $deal->ticker = 'DOGE/USD';
                    }

                    if ($random_sign == 5) {
                        $deal->ticker = 'XRP/USD';
                    }

                    if ($random_sign == 6) {
                        $deal->ticker = 'MATIC/USD';
                    }

                    if ($random_sign == 7) {
                        $deal->ticker = 'ADA/USD';
                    }

                    if ($random_sign == 8) {
                        $deal->ticker = 'SOL/USD';
                    }

                    if ($random_sign == 9) {
                        $deal->ticker = 'DATA/USD';
                    }

                    if ($random_sign == 10) {
                        $deal->ticker = 'BNB/USD';
                    }

                    if ($random_sign == 11) {
                        $deal->ticker = 'BTTN/USD';
                    }

                    if ($random_sign == 12) {
                        $deal->ticker = 'PZM/USD';
                    }

                    if ($random_sign == 13) {
                        $deal->ticker = 'pDOTn/USD';
                    }

                    if ($random_sign == 14) {
                        $deal->ticker = 'XLM/USD';
                    }

                    if ($random_sign == 15) {
                        $deal->ticker = 'TRX/USD';
                    }

                    if ($random_sign == 16) {
                        $deal->ticker = 'HT/USD';
                    }

                    if ($random_sign == 17) {
                        $deal->ticker = 'DOT/USD';
                    }

                    if ($random_sign == 18) {
                        $deal->ticker = 'LINK/USD';
                    }

                    if ($random_sign == 19) {
                        $deal->ticker = 'BCH/USD';
                    }

                    if ($random_sign == 20) {
                        $deal->ticker = 'LTC/USD';
                    }

                    $bonus = ($rate/100) * $random_percent;

                    if ($random_sign > 15) {
                        $bonus = -$bonus;
                    }

                    if ($random_sign > 10) {
                        $deal->sell_or_buy = 'sell';
                    } else {
                        $deal->sell_or_buy = 'buy';
                    }

                    $deal->bonus = $bonus;

                    $duration = random_int(1200, 1800);

                    $deal->duration = $duration/60;

                    $deal_time = $time + $duration;

                    $deal->time = $deal_time;

                    $time += $duration;

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
                Auth::user()->check += $session->rate;
                $session->rate = 0;
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
