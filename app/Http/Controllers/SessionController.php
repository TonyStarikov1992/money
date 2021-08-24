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
        $allTickers = [
            'BTC',
            'SHIB',
            'ETH',
            'DOGE',
            'XRP',
            'MATIC',
            'ADA',
            'SOL',
            'DATA',
            'BNB',
            'BTTN',
            'PZM',
            'pDOTn',
            'XLM',
            'TRX',
            'HT',
            'DOT',
            'LINK',
            'BCH',
            'LTC',
        ];

        $rate = null;
        $hour = null;
        $tickers = null;

        $rate = $request->rate;
        $hour = $request->hour;
        $tickers = $request->tickers;

        $res = array_diff($allTickers, $tickers);

        $num = array_rand($res, 1);

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

                    $deal->ticker = $res[$num];

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
