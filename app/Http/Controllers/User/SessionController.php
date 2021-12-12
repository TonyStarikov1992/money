<?php

namespace App\Http\Controllers\User;

use App\Deal;
use App\Http\Controllers\Controller;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $sessions = $user->sessions;

        $current_session_id = null;
        $session = null;
        $session_stop_time = null;

        if ($user->current_session_id) {
            $current_session_id = $user->current_session_id;
            $session = Session::find($current_session_id);
            $session_stop_time = $session->stop_time;
        }

        return view('user.session.index', compact('user', 'current_session_id', 'session', 'session_stop_time', 'sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        if ($tickers === null) {
            $res = $allTickers;
        } else {
            $res = array_diff($allTickers, $tickers);
        }

        if (Auth::user()) {
            if ($rate < 200 and (Auth::user()->check - $rate) < 0) {
                return redirect()->route('sessions.index');
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

                    $num = array_rand($res);

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

                    $deal->duration = $duration;

                    $deal_time = $time + $duration;

                    $deal->time = $deal_time;

                    $time += $duration;

                    $deal->save();
                }

            }

        }

        return redirect()->route('sessions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        return view('user.session.show', compact('session'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        if (Auth::user()) {
            if (Auth::user()->current_session_id !== null) {
                $session = Session::find(Auth::user()->current_session_id);
                $session->status = 0;
                Auth::user()->check += $session->rate;
                $session->stop_rate = $session->rate;
                $session->rate = 0;
                $session->save();

                Auth::user()->current_session_id = null;
                Auth::user()->save();
            }
        }

        return redirect()->route('sessions.index');
    }
}
