@extends('master')

@section('title', 'UserHome')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light vh-100" style="width: 280px;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <span class="fs-4">User money: {{ $user_check }}$</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link link-dark">
                                Profile info
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                Deposit
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                Money back
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                Address
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                Deals history
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                Logout
                            </a>
                        </li>
                    </ul>
                    <hr>
{{--                    <div class="dropdown">--}}
{{--                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">--}}
{{--                            <strong>mdo</strong>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">--}}
{{--                            <li><a class="dropdown-item" href="#">New project...</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Settings</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Profile</a></li>--}}
{{--                            <li><hr class="dropdown-divider"></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Sign out</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="col-10">

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


{{--                    @foreach($sessions as $session)--}}
                    @foreach(Auth::user()->sessions()->orderBy('id', 'DESC')->get() as $session)

{{--                        @foreach($session->deals as $deal)--}}
                        @foreach($session->deals()->orderBy('id', 'DESC')->get() as $deal)
                            @if($deal->status == 1)

                                <tr>
                                    <th scope="row">BTC/USD</th>
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

                <div class="row">

{{--                    @if($deals)--}}
{{--                        @foreach($deals as $deal)--}}
{{--                            @if($deal->status == 1)--}}
{{--                                <div class="col-3">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 class="card-title">Deal id {{ $deal->id }}</h5>--}}
{{--                                            <h5 class="card-title">Session id {{ $deal->session_id }}</h5>--}}
{{--                                            <h5 class="card-title">Bonus: {{ $deal->bonus }}$</h5>--}}
{{--                                            <h5 class="card-title">Time: {{ date("Y-m-d H:i:s", $deal->time)  }}</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}

{{--                        @endforeach--}}
{{--                    @endif--}}

                </div>

{{--                <h2>Sessions:</h2>--}}

{{--                <div class="row">--}}

{{--                    @foreach($sessions as $session)--}}
{{--                        <div class="col-3">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <a href="{{ route('userSessionShow', $session->id) }}">--}}
{{--                                        <h5 class="card-title">Session id {{ $session->id }}</h5>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                </div>--}}
            </div>


        </div>
    </div>
    <!-- /container -->
@endsection
