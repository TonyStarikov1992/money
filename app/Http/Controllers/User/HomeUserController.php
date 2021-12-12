<?php

namespace App\Http\Controllers\User;

use App\Deal;
use App\Http\Controllers\Controller;
use App\Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        if (!$user->order) {
            return view('user.make_order');
        } elseif ($user->order->payment_status == 0) {
            return view('user.pay_order');
        }

        $current_session = null;

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
        }

        if ($user->current_session_id !== null) {
            $session = Session::find($user->current_session_id);
            if ($session->stop_time <= time()) {
                $user->check += $session->rate;
                $session->stop_rate = $session->rate;
                $session->rate = 0;
                $session->status = 0;
                $session->save();

                $user->current_session_id = null;
                $user->save();
            }
        }

        $sessions = $user->sessions()->orderBy('id', 'desc')->get();

        return view('user.main', compact('user', 'current_session', 'sessions'));
    }
}
