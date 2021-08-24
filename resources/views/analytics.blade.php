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
                                    <option value="BTC">BTC</option>
                                    <option value="SHIB">SHIB</option>
                                    <option value="ETH">ETH</option>
                                    <option value="DOGE">DOGE</option>
                                    <option value="XRP">XRP</option>
                                    <option value="MATIC">MATIC</option>
                                    <option value="ADA">ADA</option>
                                    <option value="SOL">SOL</option>
                                    <option value="DATA">DATA</option>
                                    <option value="BNB">BNB</option>
                                    <option value="BTTN">BTTN</option>
                                    <option value="PZM">PZM</option>
                                    <option value="pDOTn">pDOTn</option>
                                    <option value="XLM">XLM</option>
                                    <option value="TRX">TRX</option>
                                    <option value="HT">HT</option>
                                    <option value="DOT">DOT</option>
                                    <option value="LINK">LINK</option>
                                    <option value="BCH">BCH</option>
                                    <option value="LTC">LTC</option>
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
