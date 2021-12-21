<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Quickdeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuickdealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allTickers = [
            'BTC',
            'SHIB',
            'ETH',
            'DOGE',
            'XRP',
            'MATIC',
            'ADA',
            'SOL',
            'DATA',
            'BNB',
            'BTTN',
            'PZM',
            'pDOTn',
            'XLM',
            'TRX',
            'HT',
            'DOT',
            'LINK',
            'BCH',
            'LTC',
        ];

        $user = Auth::user();

        $quickdeals = $user->quickdeals()->orderBy('id', 'DESC')->get();;

        foreach ($quickdeals as $quickdeal) {

            if ($quickdeal->status == 0) {

                if ($quickdeal->stop_time <= time()) {
                    $user->check += $quickdeal->rate + $quickdeal->bonus;
                    $user->quickdeal_id = 0;
                    $quickdeal->status = 1;
                    $quickdeal->processing = 0;
                    $user->save();
                    $quickdeal->save();
                }

            }

        }

        return view('user.quickdeal.index', compact('quickdeals', 'allTickers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $parameters = $request->all();

        $rate = $parameters['rate'];

        if (Auth::user()) {

            if (Auth::user()->check - $rate < 0) {
                return redirect()->route('quickdeals.index');
            }

            if (Auth::user()->quickdeal_id == 0) {

                $parameters['user_id'] = Auth::user()->id;

                $random_percent = random_int(1, 2);

                $random_sign = random_int(1, 20);

                $bonus = $rate/100 * $random_percent;

                if ($random_sign > 5) {
                    $bonus = -$bonus;
                }

                $parameters['bonus'] = $bonus;

                $time = random_int(300, 600);

                $parameters['time'] = $time;

                $parameters['start_time'] = time();

                $parameters['stop_time'] = time() + $time;

//                dd($parameters['rate']);

                $quickdeal = Quickdeal::create($parameters);

                Auth::user()->check -= $rate;

                Auth::user()->quickdeal_id = $quickdeal->id;

                Auth::user()->save();
            }

            return redirect()->route('quickdeals.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quickdeal  $quickdeal
     * @return \Illuminate\Http\Response
     */
    public function show(Quickdeal $quickdeal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quickdeal  $quickdeal
     * @return \Illuminate\Http\Response
     */
    public function edit(Quickdeal $quickdeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quickdeal  $quickdeal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quickdeal $quickdeal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quickdeal  $quickdeal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quickdeal $quickdeal)
    {
        //
    }
}
