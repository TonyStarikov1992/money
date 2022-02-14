<?php

namespace App\Http\Controllers\User;

use App\Deposit;
use App\Http\Controllers\Controller;
use App\User;
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
        return view('user.deposit.success');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deny()
    {
        return view('user.deposit.deny');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function result(Request $request)
    {
        $parameters = $request->all();

        if ($parameters['MERCHANT_ID'] == '10866'){
            $deposit = Deposit::where('order_id', $parameters['MERCHANT_ORDER_ID'])->first();

            $user = User::where('id', $deposit->user_id)->first();

            $user->check += $parameters['AMOUNT'];
            $user->save();

            $deposit->status = 1;
            $deposit->save();
        }

    }

    public function payment(Request $request)
    {
        $parameters = $request->all();

        if ((int)$parameters['oa'] > 0) {
            $merchant_id = '10866';
            $secret_word = 'xpSXe0iNCx4!b0[';

            $us_id = Auth::user()->id;

            $order_id = md5($us_id.':'.$secret_word);

            $order_amount = $parameters['oa'];

            $currency = 'USD';

            $sign = md5($merchant_id.':'.$order_amount.':'.$secret_word.':'.$currency.':'.$order_id);

            $deposit_parameters['user_id'] = $us_id;
            $deposit_parameters['order_amount'] = $order_amount;
            $deposit_parameters['order_id'] = $order_id;
            $deposit_parameters['time'] = time();

            Deposit::create($deposit_parameters);

            $url = 'https://pay.freekassa.ru/?m='.$merchant_id.'&oa='.$order_amount.'&i=&currency='.$currency.'&em=&phone=&o='.$order_id.'&pay=PAY&s='.$sign.'&us_id='.$us_id;

            return redirect()->away($url);
        }

        return redirect()->route('deposit.index');
    }
}
