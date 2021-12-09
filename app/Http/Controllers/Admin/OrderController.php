<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'asc')->get();

        return  view('admin.orders.index', compact('orders'));
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return  view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return  view('admin.orders.edit', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function editPayment(Order $order)
    {
        return  view('admin.orders.edit_payment', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function editAdmin(Order $order)
    {
        return  view('admin.orders.edit_admin', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function editType(Order $order)
    {
        return  view('admin.orders.edit_type', compact('order'));
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
        $parameters = $request->all();

        $parameters['expires_time'] = strtotime($parameters['expires_time']);

        $order->update($parameters);

        return redirect()->route('orders.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(Request $request, Order $order)
    {
        $parameters = $request->all();

        if (array_key_exists('admin_status', $parameters)) {

            $parameters['admin_status'] = 1;

        } else {

            $parameters['admin_status'] = 0;

        }

        $order->update($parameters);

        return redirect()->route('orders.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function updatePayment(Request $request, Order $order)
    {
        $parameters = $request->all();

        if (array_key_exists('payment_status', $parameters)) {

            $parameters['payment_status'] = 1;

            if ($order->type == 1) {

                $user = User::find($order->user->id);

                $user_parameters['check'] = $user->check + 2000;

                $user_parameters['license_type'] = $order->type;

                $user_parameters['license_expires_time'] = time() + ($order->type * 2592000);

                $user->update($user_parameters);

                $order->update($parameters);

            } elseif ($order->type == 2) {

                $user =  User::find($order->user->id);

                $user_parameters['check'] = $user->check + 3800;

                $user_parameters['license_type'] = $order->type;

                $user_parameters['license_expires_time'] = time() + ($order->type * 2592000);

                $user->update($user_parameters);

                $order->update($parameters);

            } elseif ($order->type == 3) {

                $user =  User::find($order->user->id);

                $user_parameters['check'] = $user->check + 5400;

                $user_parameters['license_type'] = $order->type;

                $user_parameters['license_expires_time'] = time() + ($order->type * 2592000);

                $user->update($user_parameters);

                $order->update($parameters);
            }
        }

        return redirect()->route('orders.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function updateType(Request $request, Order $order)
    {
        $parameters = $request->all();

        if ($order->type - $parameters['type'] == -1) {
            $parameters['expires_time'] = $order->expires_time + (1 * 2592000);
        } elseif ($order->type - $parameters['type'] == -2) {
            $parameters['expires_time'] = $order->expires_time + (2 * 2592000);
        } elseif ($order->type - $parameters['type'] == 1) {
            $parameters['expires_time'] = $order->expires_time - (1 * 2592000);
        } elseif ($order->type - $parameters['type'] == 2) {
            $parameters['expires_time'] = $order->expires_time - (2 * 2592000);
        } else {
            $parameters['expires_time'] = $order->expires_time;
        }

        $order->update($parameters);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
