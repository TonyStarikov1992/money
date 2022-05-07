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

        $user = Auth::user();

        $current_session = null;

        if ($user->current_session_id != null) {
            $current_session = Session::find($user->current_session_id);
            $deals = $current_session->deals;

            foreach ($deals as $deal) {
                if ($deal->stop_time <= time() and $deal->status != 1) {

                    $current_session->rate += $deal->bonus;
                    $deal->status = 1;
                    $deal->save();

                    $current_session->save();
                }

            }

            if ($current_session->stop_time <= time()) {
                $user->check += $current_session->rate;
                $current_session->stop_rate = $current_session->rate;
                $current_session->rate = 0;
                $current_session->status = 0;
                $current_session->save();

                $user->current_session_id = null;
                $user->save();
            }
        }

        $sessions = $user->sessions;

        $current_session_id = null;
        $session = null;
        $session_stop_time = null;
        $deals = null;

        if ($user->current_session_id) {
            $current_session_id = $user->current_session_id;
            $session = Session::find($current_session_id);
            $session_stop_time = $session->stop_time;

            $current_session = $session;

            $deals = $current_session->deals;
        }

        return view('user.session.index', compact('allTickers', 'user', 'current_session_id', 'session', 'session_stop_time', 'sessions', 'deals'));
    }

    /**
     * Display a listing of user sessions.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {

        $user = Auth::user();

        $sessions = $user->sessions;

        return view('user.session.history', compact('user', 'sessions'));
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

        $rate = null;
        $hour = null;
        $tickers = null;

        $rate = $request->rate;
        $hour = $request->hour;
        $tickers = $request->tickers;

        $user = Auth::user();

        if ($user->check < 1 or ($user->check - $rate) < 0) {
            $request->session()->flash('message', 'Not enough money to start new session! Rate to height.');
            return redirect()->route('sessions.index');
        }

        if ($rate == null or !is_numeric($rate)) {
            $request->session()->flash('message', 'Enter the rate!');
            return redirect()->route('sessions.index');
        }

        if ($tickers == null) {
            $request->session()->flash('message', 'You must leave at least one ticker!');
            return redirect()->route('sessions.index');
        }

        if ($user) {

            if ($rate < 200 and $hour <= 0 and ($user->check - $rate) < 0) {

                return redirect()->route('sessions.index');

            }

            if ($user->current_session_id == null) {

                $time = time();

                $session_parameters['user_id'] = $user->id;
                $session_parameters['start_time'] = $time;

                $session_stop_time = $time + (3600 * $hour);

                $session_parameters['stop_time'] = $session_stop_time;
                $session_parameters['start_rate'] = $rate;
                $session_parameters['rate'] = $rate;

                $session = Session::create($session_parameters);

                $user->check -= $rate;

                $user->current_session_id = $session->id;
                $user->save();

                while ($time <= $session_stop_time) {

                    $deal_parameters['session_id'] = $session->id;
                    $deal_parameters['start_time'] = $time;

                    $duration = random_int(1200, 1800);

                    $deal_parameters['duration'] = $duration;
                    $deal_parameters['duration_min'] = (int)($duration/60);
                    $deal_parameters['stop_time'] = $time + $duration;
                    $deal_parameters['ticker'] = $tickers[array_rand($tickers)];

                    $random_percent = random_int(6, 7);

                    $deal_parameters['percent'] = $random_percent;

                    $random_sign = random_int(1, 10);

                    $bonus = (int)($rate/100) * $random_percent;

                    if ($random_sign >= 8) {
                        $bonus = -$bonus;
                    }

                    $deal_parameters['bonus'] = $bonus;

                    if ($random_sign > 5) {
                        $sell_or_buy = 'sell';
                    } else {
                        $sell_or_buy = 'buy';
                    }

                    $deal_parameters['sell_or_buy'] = $sell_or_buy;

                    $rate += $bonus;

                    $time += $duration;

                    $deal_parameters['current_session_rate'] = $rate;

                    if ($rate <= 0 or $time >= $session_stop_time) {
                        break;
                    }

                    Deal::create($deal_parameters);
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
        $user = Auth::user();

        if ($user) {
            if ($user->current_session_id != null) {
                $session = Session::find($user->current_session_id);
                $session->status = 0;
                $user->check += $session->rate;
                $session->stop_rate = $session->rate;
                $session->rate = 0;
                $session->stop_time = time();
                $session->save();

                $user->current_session_id = null;
                $user->save();
            }
        }

        return redirect()->route('sessions.index');
    }
}
