@extends('master')

@section('title', 'Trade')

@section('main')
    <div class="container-fluid">

        <div class="row">

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

        </div>
    </div>
    <!-- /container -->
@endsection
