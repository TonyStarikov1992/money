@extends('user.master')

@section('title', 'PAYMENT REQUESTS')

@section('main')
    <div class="container">

        <h1>PAYMENT REQUESTS</h1>

        <a class="btn btn-success" type="button" href="{{ route('payments.create') }}">MAKE PAYMENT</a>

        <hr>

                <div class="row d-flex justify-content-center">
                    <div class="col">

                            <h2>PAYMENTS LIST</h2>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Payment id</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Get / Pay</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($payments as $payment)

                                    <tr>
                                        <th scope="row">{{ $payment->id }}</th>
                                        <td>{{ $payment->rate }}$</td>
                                        <td>{{ $payment->type }}</td>
                                        <td>{{ date("Y-m-d G:i:s", $payment->time)  }}</td>
                                        <td>
                                            @if($payment->status == 0) processing @else done @endif
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>


                    </div>

                </div>
    </div> <!-- /container -->
@endsection
