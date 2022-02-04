@extends('user.master')

@section('title', 'DEPOSITS')

@section('main')
    <div class="container">

        <a href="{{ route('payment.success') }}">success</a>
        <a href="{{ route('payment.deny') }}">deny</a>
        <a href="{{ route('payment.result') }}">result</a>

        <div class="row">

            <div class="col-6 ">

                <p class="text-center">TO MAKE A DEPOSIT BY CREDIT CARD, PLEASE FEEL THE CARD INFO BELOW.</p>

{{--                <form method='get' action='https://www.free-kassa.ru/merchant/cash.php'>--}}
{{--                    <input type='hidden' name='m' value='{{ $merchant_id }}'>--}}
{{--                    <input type='hidden' name='oa' value='{{ $order_amount }}'>--}}
{{--                    <input type='hidden' name='o' value='{{ $order_id }}'>--}}
{{--                    <input type='hidden' name='s' value='{{ $sign }}'>--}}
{{--                    <input type='hidden' name='i' value='1'>--}}
{{--                    <input type='hidden' name='lang' value='ru'>--}}
{{--                    <input type='hidden' name='us_login' value='{{ $user_login }}'>--}}
{{--                    <input type='submit' name='pay' value='Оплатить'>--}}
{{--                </form>--}}

            </div>

            <div class="col-6">
                <p class="text-center">TO MAKE A DEPOSIT IN CRYPTO, PLEASE SCAN QR CODE OR COPY THE WALLET BELOW AND CONNECT TO SUPPORT, TO CONFIRM YOUR PAYMENT.</p>

                <p class="text-center">
                    <img src="/images/qr.png" class="img-fluid w-50 mx-auto text-center" alt="image1" loading="lazy">
                </p>

                <p class="text-center">
                    CRYPTO WALLET
                </p>


                <input class="form-control w-75 mx-auto mb-3" type="text" value="bc1qhvze5wadwdrmcjy4nqdd6mfnyzy7ar9jhs300d" id="myInput">

                <p class="text-center">
                    <button onclick="myFunction()" type="button" class="btn btn-primary">COPY CRYPTO WALLET</button>
                </p>

                <script>
                    function myFunction() {
                        /* Get the text field */
                        var copyText = document.getElementById("myInput");

                        /* Select the text field */
                        copyText.select();
                        copyText.setSelectionRange(0, 99999); /* For mobile devices */

                        /* Copy the text inside the text field */
                        navigator.clipboard.writeText(copyText.value);
                    }
                </script>




            </div>

{{--            <div class="col">--}}

{{--                <h2>DEPOSITS LIST</h2>--}}

{{--                @if(count($deposits) != 0)--}}

{{--                    <table class="table">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th scope="col">Deposit id</th>--}}
{{--                            <th scope="col">Rate</th>--}}
{{--                            <th scope="col">Time</th>--}}
{{--                            <th scope="col">Status</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}

{{--                        <tbody>--}}

{{--                        @foreach($deposits as $deposit)--}}

{{--                            <tr>--}}
{{--                                <th scope="row">{{ $deposit->id }}</th>--}}
{{--                                <td>{{ $deposit->rate }}$</td>--}}
{{--                                <td>{{ date("Y-m-d G:i:s", $deposit->time)  }}</td>--}}
{{--                                <td>--}}
{{--                                    @if($deposit->status == 0) processing @else done @endif--}}
{{--                                </td>--}}
{{--                            </tr>--}}

{{--                        @endforeach--}}

{{--                        </tbody>--}}
{{--                    </table>--}}

{{--                @else--}}

{{--                    <h2>YOU HAVE NO DEPOSITS YET</h2>--}}

{{--                @endif--}}

{{--                <a class="btn btn-success" type="button" href="{{ route('deposit.create') }}">MAKE DEPOSIT</a>--}}

{{--            </div>--}}

        </div>
    </div> <!-- /container -->
@endsection
