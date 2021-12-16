@extends('user.master')

@section('title', 'QUICKDEAL REQUESTS')

@section('main')
    <div class="container">

        <h1>QUICKDEAL REQUESTS</h1>

        <a class="btn btn-success" type="button" href="{{ route('trading') }}">MAKE QUICKDEAL</a>

        <hr>

        <div class="row d-flex justify-content-center">
            <div class="col">

                <h2>QUICKDEAL LIST</h2>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Payment id</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Ticker</th>
                        <th scope="col">Bonus</th>
                        <th scope="col">Type</th>
                        <th scope="col">Time</th>
                        <th scope="col">Start time</th>
                        <th scope="col">Stop time</th>
                        <th scope="col">Processing</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($quickdeals as $quickdeal)

                        @if($quickdeal->processing == 1)
                            <tr>
                                <th scope="row">{{ $quickdeal->id }}</th>
                                <th>{{ $quickdeal->rate }}$</th>
                                <th>{{ $quickdeal->ticker }}</th>
                                <th> - </th>
                                <th>{{ $quickdeal->sell_or_buy }}</th>
                                <th> - </th>
                                <th>{{ date("Y-m-d G:i:s", $quickdeal->start_time)  }}</th>
                                <th> - </th>
                                <th>processing</th>
                            </tr>
                        @else
                            <tr>
                                <th scope="row">{{ $quickdeal->id }}</th>
                                <th>{{ $quickdeal->rate }}$</th>
                                <th>{{ $quickdeal->ticker }}</th>
                                <th>{{ $quickdeal->bonus }}$</th>
                                <th>{{ $quickdeal->sell_or_buy }}</th>
                                <th>{{ (int)($quickdeal->time / 60) }} min</th>
                                <th>{{ date("Y-m-d G:i:s", $quickdeal->start_time)  }}</th>
                                <th>{{ date("Y-m-d G:i:s", $quickdeal->stop_time)  }}</th>
                                <th>closed</th>
                            </tr>
                        @endif

                    @endforeach

                    </tbody>
                </table>


            </div>

        </div>
    </div> <!-- /container -->
@endsection
