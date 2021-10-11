<?php

namespace App\Http\Controllers\Admin;

use App\Deal;
use App\Http\Controllers\Controller;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.main');
    }
}
