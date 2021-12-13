@extends('user.master')

@section('title', 'PAYMENT REQUESTS')

@section('main')
    <div class="container">

        <h1>PAYMENT REQUESTS</h1>

        <a class="btn btn-success" type="button" href="{{ route('requests.create') }}">MAKE REQUEST</a>

        <hr>

                <div class="row d-flex justify-content-center">
                    <div class="col">

                            <h2>REQUESTS LIST</h2>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Request id</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Get / Pay</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($paymentRequests as $paymentRequest)

                                    <tr>
                                        <th scope="row">{{ $paymentRequest->id }}</th>
                                        <td>{{ $paymentRequest->rate }}$</td>
                                        <td>{{ $paymentRequest->type }}</td>
                                        <td>{{ date("Y-m-d G:i:s", $paymentRequest->time)  }}</td>
                                        <td>
                                            @if($paymentRequest->status == 0) processing @endif
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>


                    </div>

                </div>
    </div> <!-- /container -->
@endsection
