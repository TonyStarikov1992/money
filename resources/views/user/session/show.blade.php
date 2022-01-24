@extends('user.master')

@section('title', 'SHOW SESSION')

@section('main')
    <div class="container">

        <h3>Session id: {{ $session->id }}</h3>
        <h3>Session start rate: {{ $session->start_rate }}$</h3>
        <h3>Session stop rate: {{ $session->stop_rate }}$</h3>
        <h3>Session start time: {{ date('d-m-Y G:i:s', $session->start_time) }}</h3>
        <h3>Session stop time: {{ date('d-m-Y G:i:s', $session->stop_time) }}</h3>

        <h2>Deals:</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Ticker</th>
                    <th scope="col">Type</th>
                    <th scope="col">Start time</th>
                    <th scope="col">Stop time</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Deal id</th>
                    <th scope="col">Bonus</th>
                </tr>
            </thead>

            <tbody>

            @foreach($session->deals as $deal)

                @if($deal->status == 1)

                    <tr>
                        <th scope="row">{{ $deal->ticker }}</th>
                        <td>{{ $deal->sell_or_buy }}</td>
                        <td>{{ date("Y-m-d H:i:s", $deal->start_time) }}</td>
                        <td>{{ date("Y-m-d H:i:s", $deal->stop_time) }}</td>
                        <td>{{ $deal->duration_min }} min</td>
                        <td>{{ $deal->id }}</td>
                        <td>{{ $deal->bonus }}$</td>
                    </tr>

                @endif

            @endforeach

            </tbody>

        </table>



    </div> <!-- /container -->
@endsection
