@extends('master')

@section('title', 'Trade')

@section('main')
    <div class="container-fluid">
        <div class="row">

            <div class="col">

                @guest()
                    <div class="px-4 py-5 my-2 text-center">
                        <h1 class="display-5 fw-bold">Trading</h1>
                        <div class="col-lg-6 mx-auto">

                            <p class="lead mb-4">
                                On this page you can make quickdeals.
                                <a href="{{ route('login') }}">Login</a> or
                                <a href="{{ route('register') }}">register</a> new account.
                                We require you to fill in basic information to generate your account and begin processing your deals.
                            </p>
                        </div>
                    </div>
                @endguest

                @auth()

                    <div class="row mb-5">

                        <div class="col-12">
                            <div class="px-4 py-5 my-2 text-center">
                                <h1 class="display-5 fw-bold">QUICKDEALS</h1>
                                <div class="col-lg-6 mx-auto">

                                    <p class="lead mb-4">
                                        Analise coins trends.
                                        Select witch coin you want to trade.
                                        Select deal type buy or sell coin.
                                        Input deal rate.
                                        Make your bet.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col">

                            <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script><div id="coinmarketcap-widget-marquee" coins="1,1027,825,5994,74,52,3890,2010,5426,2143,1839,1681,512,1958,2502,6636,1975,1831,2" currency="USD" theme="light" transparent="false" show-symbol-logo="true"></div>

                            <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinPriceBlock.js"></script><div id="coinmarketcap-widget-coin-price-block" coins="1,1027,825,5994,74,52,3890,2010,5426,2143,1839,1681,512,1958,2502,6636,1975,1831,2" currency="USD" theme="light" transparent="false" show-symbol-logo="true"></div>

                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">

                        <div class="col-6 mx-auto text-center">

                            <form method="POST" enctype="multipart/form-data" action="{{ route('quickdeals.store') }}">
                                <div>
                                    @csrf

                                    <div class="form-floating">
                                        <select name="ticker" class="form-select my-3" id="floatingSelect" aria-label="Floating label select example">
                                            @foreach($allTickers as $ticker)
                                                <option value="{{ $ticker }}">{{ $ticker }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Select one of the tickers</label>
                                    </div>

                                    <div class="form-floating">
                                        <select name="sell_or_buy" class="form-select my-3" id="floatingSelect" aria-label="Floating label select example">
                                            <option value="sell">SELL</option>
                                            <option value="buy">BUY</option>
                                        </select>
                                        <label for="floatingSelect">Select type of the deal</label>
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="addon-wrapping">RATE</span>
                                        </div>
                                        <input type="text" name="rate" id="rate" class="form-control" placeholder="max get rate {{ Auth::user()->check }}$" aria-describedby="addon-wrapping">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg">MAKE QUICKDEAL</button>

                                </div>
                            </form>

                        </div>

                    </div>

                @endauth

            </div>

        </div>
    </div>
    <!-- /container -->
@endsection
