@extends('master')

@section('title', 'Analytics')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Analytics</h1>

                @if($session_stop_time)
                    <h3>Session stop time: {{ date("Y-m-d H:i:s", $session_stop_time)  }}</h3>
                @endif

                @auth()
                    <div class="vh-100">
{{--                        <p>Money: {{ $user_money }} $</p>--}}
{{--                        <p>Random %: {{ $random_percent }} %</p>--}}
{{--                        <p>Random +/-: {{ $random_sign }}</p>--}}
{{--                        <p>Bonus: {{ $bonus }} $</p>--}}



                        @if(!$current_session_id)
                            <form action="{{ route('sessionStart')}}" method="POST">
                                <button type="submit" class="btn btn-primary">
                                    START
                                </button>
                                @csrf
                            </form>
                        @endif

                        @if($current_session_id)
                            <form action="{{ route('sessionStop')}}" method="POST">
                                <button type="submit" class="btn btn-primary">
                                    STOP
                                </button>
                                @csrf
                            </form>
                        @endif

                    </div>


                @endauth
            </div>

        </div>
    </div>
    <!-- /container -->
@endsection
