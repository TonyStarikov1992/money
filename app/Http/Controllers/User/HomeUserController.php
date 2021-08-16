<?php

namespace App\Http\Controllers\User;

use App\Deal;
use App\Http\Controllers\Controller;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{
    public function index()
    {
        $deals = null;
        $sessions = null;
        $current_session_rate = null;

        $user = Auth::user();

        $user_check = $user->check;

        if ($user->current_session_id !== null) {
            $current_session = Session::find($user->current_session_id);
            $deals = $current_session->deals;

            foreach ($deals as $deal) {
                if ($deal->time <= time() and $deal->status != 1) {
                    $this_deal = Deal::find($deal->id);
                    $this_deal->status = 1;
                    $this_deal->save();

                    $current_session->rate += $this_deal->bonus;
                    $current_session->save();
                }

            }

            $current_session_rate = $current_session->rate;
        }

        if ($user->current_session_id !== null) {
            $session = Session::find($user->current_session_id);
            if ($session->stop_time <= time()) {
                Auth::user()->check += $session->rate;
                $session->rate = 0;
                $session->status = 0;
                $session->save();

                Auth::user()->current_session_id = null;
                Auth::user()->save();
            }
        }

        $sessions = $user->sessions()->orderBy('id', 'DESC')->get();
        return view('user.main', compact('sessions', 'deals', 'user_check', 'current_session_rate'));
    }
}
