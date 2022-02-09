<?php

namespace App\Http\Controllers\User;

use App\Deposit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fk_merchant_id = '10000000000'; //merchant_id ID магазина в freekassa.ru https://merchant.freekassa.ru/settings
        $fk_merchant_key = 'secret'; //Секретное слово https://merchant.freekassa.ru/settings
        $fk_currency = 'USD'; // Валюта платежа (RUB,USD,EUR,UAH,KZT)

        $user = Auth::user();
        $deposits = $user->deposits->all();

        return view('user.deposit.index', compact('deposits', 'user', 'fk_merchant_id', 'fk_merchant_key', 'fk_currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('user.deposit.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $parameters = $request->all();
        $parameters['user_id'] = $user->id;
        $parameters['time'] = time();

        Deposit::create($parameters);

        return redirect()->route('deposit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
