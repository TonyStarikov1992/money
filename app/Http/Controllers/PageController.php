<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main()
    {
        return view('main');
    }

    public function trade()
    {
        return view('trade');
    }

    public function markets()
    {
        return view('markets');
    }

    public function charity()
    {
        return view('charity');
    }

    public function analytics()
    {
        return view('analytics');
    }
}
