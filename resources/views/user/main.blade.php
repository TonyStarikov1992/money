@extends('user.master')

@section('title', 'UserHome')

@section('main')
    <div class="row">

        <div class="col">

            <h3>
                License validity period:
                {{ $user->order->type }} month(s)
            </h3>
            <h3>
                License expires date:
                {{ date('d-m-Y G:i:s', $user->order->expires_time) }}
            </h3>

            @if($user->current_session_id)
                <h3>Current session start rate: {{ $current_session->start_rate }}$</h3>
                <h3>Current session rate: {{ $current_session->rate }}$</h3>
                <h3>Current session start time: {{ date('d-m-Y G:i:s', $current_session->start_time) }}</h3>
                <h3>Current session stop time: {{ date('d-m-Y G:i:s', $current_session->stop_time) }}</h3>

            @else()
                <h3>
                    To start trading go to
                    <a href="{{ route('sessions.index') }}">Sessions</a>
                    and start your trading session.
                </h3>
            @endif

            <h2>Deals:</h2>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Тикер</th>
                    <th scope="col">Сторона</th>
                    <th scope="col">Время открытия</th>
                    <th scope="col">Время закрытия</th>
                    <th scope="col">Длительность</th>
                    <th scope="col">id сделки</th>
                    <th scope="col">Доход/Убыток</th>
                </tr>
                </thead>

                <tbody>
                @foreach($sessions as $session)

                    @foreach($session->deals()->orderBy('id', 'desc')->get() as $deal)
                        @if($deal->status == 1)

                            <tr>
                                <th scope="row">{{ $deal->ticker }}</th>
                                <td>{{ $deal->sell_or_buy }}</td>
                                <td>@if($deal->start_time){{ date("Y-m-d H:i:s", $deal->start_time)  }}@endif</td>
                                <td>@if($deal->time){{ date("Y-m-d H:i:s", $deal->time)  }}@endif</td>
                                <td>@if($deal->duration){{ $deal->duration / 60 }} min @endif</td>
                                <td>{{ $deal->id }}</td>
                                <td>{{ $deal->bonus }}$</td>
                            </tr>

                        @endif

                    @endforeach

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <!-- /container -->
@endsection
