<?php

namespace App\Http\Controllers;

use App\Order;
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

    public function conditions()
    {
        return view('terms_and_conditions');
    }

    public function analytics()
    {
        if (Auth::user()) {

            if (Auth::user()->license_type) {
                return redirect()->route('userOrderPayed');
            }

            if (Auth::user()->order) {

                if (Auth::user()->order->admin_status == 1) {

                    return redirect()->route('userOrderChecked');

                }

                return redirect()->route('userOrderCreated');

            }
        }

        return view('analytics');
    }
}
