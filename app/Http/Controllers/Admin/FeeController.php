<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use App\User;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = Payment::all();

        return view('admin.fees.index', compact('fees'));
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $fee)
    {
        $user = $fee->user;
        return view('admin.fees.edit', compact('fee', 'user'));
    }

    public function editPayment(Payment $fee)
    {
        $user = $fee->user;
        return view('admin.fees.edit_payment', compact('fee', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $fee)
    {

        $parameters = $request->all();

        if (array_key_exists('payment_status', $parameters)) {

            $parameters['payment_status'] = 1;

            $parameters['status'] = 1;

            $user = User::find($fee->user->id);

            if ($fee->type == 'get') {
                $rate = -$fee->rate;
            } else {
                $rate = $fee->rate;
            }

            $user_parameters['check'] = $user->check + $rate;

            $user->update($user_parameters);

        }

        $fee->update($parameters);

        return redirect()->route('fees.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $fee)
    {
        $fee->delete();

        return redirect()->route('fees.index');
    }
}
