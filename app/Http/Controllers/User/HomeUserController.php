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
        return view('user.main');
    }

    public function userMarkets()
    {
        return view('user.markets');
    }

    public function userCharity()
    {
        return view('user.charity');
    }

    public function userAnalytics()
    {
        return view('user.analytics');
    }
}
