<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order($month)
    {
        if (1 * $month < 4) {

            if ($month == 1) {
                $money = 2000;
            } elseif ($month == 2) {
                $money = 3800;
            } elseif ($month == 3) {
                $money = 5400;
            } else {
                return redirect()->route('analytics');
            }

            return view('user.order.main', compact('month', 'money'));

        } else {
            return redirect()->route('analytics');
        }
    }

    public function orderCreate($month)
    {
        if ($month) {

            $parameters = [];

            if ((int)$month < 4) {

                $parameters['type'] = $month;

                $parameters['expires_time'] = time() + (2592000 * $month);

            } else {

                return redirect()->route('analytics');

            }

            $userId = Auth::id();

            $parameters['user_id'] = $userId;

            Order::create($parameters);

            return redirect()->route('userOrderCreated');

        } else {

            return redirect()->route('analytics');

        }
    }

    public function orderCreated()
    {
        if (Auth::user()->order) {
            $month = Auth::user()->order->type;
            $expires_time = date('d-m-Y', Auth::user()->order->expires_time) ;

            if ($month == 1) {
                $money = 2000;
            } elseif ($month == 2) {
                $money = 3800;
            } elseif ($month == 3) {
                $money = 5400;
            } else {
                return redirect()->route('analytics');
            }

        } else {
            return redirect()->route('analytics');
        }

        return view('user.order.order_created', compact('month', 'money', 'expires_time'));
    }
}
