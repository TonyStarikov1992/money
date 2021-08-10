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

                    $user->check += $this_deal->bonus;
                    $user->save();
                }

            }
        }

        if ($user->current_session_id !== null) {
            $session = Session::find($user->current_session_id);
            if ($session->stop_time <= time()) {
                $session->status = 0;
                $session->save();

                Auth::user()->current_session_id = null;
                Auth::user()->save();
            }
        }

        $sessions = $user->sessions;
        return view('user.main', compact('sessions', 'deals', 'user_check'));
    }
}
