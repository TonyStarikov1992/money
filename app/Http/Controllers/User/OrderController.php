<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $order = Order::find($user->current_order_id);

        if ($order) {
            return redirect()->route('order.show', $order);
        }

        return view('user.order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        if ($type == 1) {
            $money = 2000;
            $expires_time = time() + (2592000 * $type);
        } elseif ($type == 2) {
            $money = 3800;
            $expires_time = time() + (2592000 * $type);
        } elseif ($type == 3) {
            $money = 5400;
            $expires_time = time() + (2592000 * $type);
        } elseif ($type == 4) {
            $money = 0;
            $expires_time = time() + (60*60*24*5);
        } else {
            return redirect()->route('user.order.index');
        }

        return view('user.order.create', compact('type','money', 'expires_time'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = $request->all();

        $type = $parameters['type'];

        if ((int)$type < 5) {

            if ($type == 4) {
                $parameters['expires_time'] = time() + (60*60*24*5);
            } else {
                $parameters['expires_time'] = time() + (2592000 * $type);
            }

            $user = Auth::user();

            $parameters['user_id'] = $user->id;

            $order = Order::create($parameters);

            $user->current_order_id = $order->id;

            $user->save();

        }

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('user.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
