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

    public function analytics()
    {
        return view('analytics');
    }

    public function charity()
    {
        return view('charity');
    }

    public function charityPayCovid()
    {
        return view('charity_covid');
    }

    public function charityPayFood()
    {
        return view('charity_food');
    }

    public function charityPayEarth()
    {
        return view('charity_earth');
    }

    public function conditions()
    {
        return view('conditions');
    }

    public function agreement()
    {
        return view('agreement');
    }

    public function listing()
    {
        return view('listing');
    }

    public function about()
    {
        return view('about');
    }

    public function heatmap()
    {
        return view('heatmap');
    }

    public function faq()
    {
        return view('faq');
    }

    public function policy()
    {
        return view('policy');
    }

    public function risk()
    {
        return view('risk');
    }

    public function commissions()
    {
        return view('commissions');
    }
}
