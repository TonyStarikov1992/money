@extends('master')

@section('title', 'Trade')

@section('main')
    <div class="container-fluid">

        <div class="row">

            @guest()
                <div class="col-12">

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

                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container" style="height: 600px">
                        <div class="h-100" id="watchlist"></div>
                        <div class="tradingview-widget-copyright"><a href="https://ru.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">График AAPL</span></a> от TradingView</div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget(
                                {
                                    "container_id": "watchlist",
                                    "autosize": true,
                                    "symbol": "COINBASE:BTCUSD",
                                    "interval": "1",
                                    "timezone": "exchange",
                                    "theme": "light",
                                    "style": "1",
                                    "toolbar_bg": "#f1f3f6",
                                    "withdateranges": true,
                                    "allow_symbol_change": true,
                                    "save_image": false,
                                    "watchlist": [
                                        "COINBASE:BTCUSD",
                                        "COINBASE:SHIBUSDT",
                                        "COINBASE:ETHUSD",
                                        "COINBASE:DOGEUSD",
                                        "BITFINEX:XRPUSD",
                                        "FTX:MATICUSD",
                                        "COINBASE:ADAUSD",
                                        "BINANCEUS:SOLUSD",
                                        "BINANCE:DATAUSD",
                                        "BINANCE:BNBUSD",
                                        "COINBASE:XLMUSD",
                                        "BINANCE:TRXUSD",
                                        "FTX:HTUSD",
                                        "BINANCE:DOTUSD",
                                        "COINBASE:LINKUSD",
                                        "COINBASE:BCHUSD",
                                        "COINBASE:LTCUSD",
                                    ],
                                    "locale": "ru"
                                }
                            );
                        </script>
                    </div>
                    <!-- TradingView Widget END -->

                </div>
            @endguest



            @auth()

                <div class="col-12 my-2">

                    <div class="px-4 py-5 text-center">
                        <h1 class="display-5 fw-bold">QUICKDEALS</h1>
                        <div class="col-lg-6 mx-auto">

                            <p class="lead mb-4">
                                Analise coins trends.
                                Select witch coin you want to trade.
                                Input deal rate.
                                Make your bet.
                            </p>
                        </div>
                    </div>

                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container" style="height: 600px">
                        <div class="h-100" id="watchlist"></div>
                        <div class="tradingview-widget-copyright"><a href="https://ru.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">График AAPL</span></a> от TradingView</div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget(
                                {
                                    "container_id": "watchlist",
                                    "autosize": true,
                                    "symbol": "COINBASE:BTCUSD",
                                    "interval": "1",
                                    "timezone": "exchange",
                                    "theme": "light",
                                    "style": "1",
                                    "toolbar_bg": "#f1f3f6",
                                    "withdateranges": true,
                                    "allow_symbol_change": true,
                                    "save_image": false,
                                    "watchlist": [
                                        "COINBASE:BTCUSD",
                                        "COINBASE:SHIBUSDT",
                                        "COINBASE:ETHUSD",
                                        "COINBASE:DOGEUSD",
                                        "BITFINEX:XRPUSD",
                                        "FTX:MATICUSD",
                                        "COINBASE:ADAUSD",
                                        "BINANCEUS:SOLUSD",
                                        "BINANCE:DATAUSD",
                                        "BINANCE:BNBUSD",
                                        "COINBASE:XLMUSD",
                                        "BINANCE:TRXUSD",
                                        "FTX:HTUSD",
                                        "BINANCE:DOTUSD",
                                        "COINBASE:LINKUSD",
                                        "COINBASE:BCHUSD",
                                        "COINBASE:LTCUSD",
                                    ],
                                    "locale": "ru"
                                }
                            );
                        </script>
                    </div>
                    <!-- TradingView Widget END -->

                </div>

                <div class="col-6 mx-auto my-2 text-center">

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

                            <input type="hidden" name="sell_or_buy" value="buy">

                            <div class="input-group flex-nowrap mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">RATE</span>
                                </div>
                                <input type="text" name="rate" id="rate" class="form-control" placeholder="max get rate {{ Auth::user()->check }}$" aria-describedby="addon-wrapping">
                            </div>

                            <button type="submit" class="btn btn-success btn-lg">BUY</button>

                        </div>
                    </form>

                </div>

                <div class="col-6 mx-auto my-2 text-center">

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

                            <input type="hidden" name="sell_or_buy" value="sell">

                            <div class="input-group flex-nowrap mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">RATE</span>
                                </div>
                                <input type="text" name="rate" id="rate" class="form-control" placeholder="max get rate {{ Auth::user()->check }}$" aria-describedby="addon-wrapping">
                            </div>

                            <button type="submit" class="btn btn-danger btn-lg">SELL</button>

                        </div>
                    </form>

                </div>

            @endauth

        </div>
    </div>
    <!-- /container -->
@endsection
