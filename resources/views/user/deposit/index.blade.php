@extends('user.master')

@section('title', 'DEPOSITS')

@section('main')
    <div class="container">

        <div class="row">

            <div class="col-6 ">
                <p class="text-center">TO MAKE A DEPOSIT BY CREDIT CARD, PLEASE FEEL THE CARD INFO BELOW.</p>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">CARD NUMBER</span>
                    <input type="text" class="form-control" placeholder="5167 2235 4148 3579" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="row">

                    <div class="col-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">MONTH</span>
                            <input type="text" class="form-control" placeholder="07" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">YEAR</span>
                            <input type="text" class="form-control" placeholder="2020" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">OWNER NAME</span>
                    <input type="text" class="form-control" placeholder="John Smith" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">CVV</span>
                    <input type="text" class="form-control" placeholder="325" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">DEPOSIT</span>
                    <input type="text" class="form-control" placeholder="500" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">$</span>
                </div>

                <a class="btn btn-success" type="button"
{{--                   href="{{ route('deposit.create') }}"--}}
                   href="#"
                >MAKE DEPOSIT</a>



            </div>

            <div class="col-6">
                <p class="text-center">TO MAKE A DEPOSIT IN CRYPTO, PLEASE SCAN QR CODE OR COPY THE WALLET BELOW AND CONNECT TO SUPPORT, TO CONFIRM YOUR PAYMENT.</p>

                <p class="text-center">
                    <img src="/images/qr.png" class="img-fluid w-50 mx-auto text-center" alt="image1" loading="lazy">
                </p>

                <p class="text-center">
                    CRYPTO WALLET
                </p>

                <p class="text-center">
                    bc1qhvze5wadwdrmcjy4nqdd6mfnyzy7ar9jhs300d
                </p>



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
