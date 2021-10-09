@extends('user.master')

@section('title', 'UserHome')

@section('main')
    <div class="row">
        <div class="col">

            @if($current_session_rate)
                <h3>Current session rate: {{ $current_session_rate }}$</h3>
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
                @foreach(Auth::user()->sessions()->orderBy('id', 'DESC')->get() as $session)

                    {{--                        @foreach($session->deals as $deal)--}}
                    @foreach($session->deals()->orderBy('id', 'DESC')->get() as $deal)
                        @if($deal->status == 1)

                            <tr>
                                <th scope="row">{{ $deal->ticker }}</th>
                                <td>{{ $deal->sell_or_buy }}</td>
                                <td>@if($deal->start_time){{ date("Y-m-d H:i:s", $deal->start_time)  }}@endif</td>
                                <td>@if($deal->time){{ date("Y-m-d H:i:s", $deal->time)  }}@endif</td>
                                <td>@if($deal->duration){{ $deal->duration }} min @endif</td>
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
