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



                        @if(!$current_session_id and $user_money > 0)
                            <p>Money: {{ $user_money }} $</p>
                            <form action="{{ route('sessionStart')}}" method="POST">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Rate</label>
                                    <input name="rate" type="text" class="form-control" id="exampleFormControlInput1" placeholder="min rate 200$, max rate {{ $user_money }}$">
                                </div>
                                <select name="hour" class="mb-3 form-select" aria-label="Default select example">
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

                                <select name="tickers[]" class="form-select form-select-lg" multiple aria-label="multiple select example">
                                    <option value="BTC/USD">BTC/USD</option>
                                    <option value="SHIB/USD">SHIB/USD</option>
                                    <option value="ETH/USD">ETH/USD</option>
                                    <option value="DOGE/USD">DOGE/USD</option>
                                    <option value="XRP/USD">XRP/USD</option>
                                    <option value="MATIC/USD">MATIC/USD</option>
                                    <option value="ADA/USD">ADA/USD</option>
                                    <option value="SOL/USD">SOL/USD</option>
                                    <option value="DATA/USD">DATA/USD</option>
                                    <option value="BNB/USD">BNB/USD</option>
                                    <option value="BTTN/USD">BTTN/USD</option>
                                    <option value="PZM/USD">PZM/USD</option>
                                    <option value="pDOTn/USD">pDOTn/USD</option>
                                    <option value="XLM/USD">XLM/USD</option>
                                    <option value="TRX/USD">TRX/USD</option>
                                    <option value="HT/USD">HT/USD</option>
                                    <option value="DOT/USD">DOT/USD</option>
                                    <option value="LINK/USD">LINK/USD</option>
                                    <option value="BCH/USD">BCH/USD</option>
                                    <option value="LTC/USD">LTC/USD</option>
                                </select>

                                <button type="submit" class="my-3 btn btn-primary">
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
