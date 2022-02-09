<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        echo 'success';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deny()
    {
        echo 'deny';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function result()
    {
        echo 'result';
    }

    public function payment(Request $request)
    {
        $parameters = $request->all();

        $merchant_id = '10866';
        $secret_word = 'яейпермне якнбн 1';
        $order_id = Auth::user()->id;
        $order_amount = $parameters['oa'];

        $sign = md5($merchant_id.':'.$order_amount.':'.$secret_word.':'.$order_id);

        $url = 'https://www.free-kassa.ru/merchant/cash.php?oa='.$order_amount.'&'.'m='.$merchant_id.'&'.'o='.$order_id.'&'.'s='.$sign.'&'.'i=94';
        return redirect()->away($url);
    }
}
