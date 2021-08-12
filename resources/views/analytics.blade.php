@extends('master')

@section('title', 'Analytics')

@section('main')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
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
                                <select name="hour" class="m-2 form-select" aria-label="Default select example">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <button type="submit" class="m-2 btn btn-primary">
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
