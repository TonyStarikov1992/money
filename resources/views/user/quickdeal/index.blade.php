@extends('user.master')

@section('title', 'QUICKDEALS')

@section('main')
    <div class="container">

        <div class="row">
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
                        <div class="tradingview-widget-copyright"><a href="https://ru.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">Chart by TradingView</span></a></div>
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
                                    "locale": "en"
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

        <div class="row d-flex justify-content-center">
            <div class="col-12 text-center">

                @if(count($quickdeals) <= 0)
                    <h2>YOUR QUICKDEALS LIST EMPTY</h2>
                @else
                    <h2>QUICKDEALS LIST</h2>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Deal id</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Ticker</th>
                                <th scope="col">Bonus</th>
                                <th scope="col">Type</th>
                                <th scope="col">Time</th>
                                <th scope="col">Start time</th>
                                <th scope="col">Stop time</th>
                                <th scope="col">Processing</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($quickdeals as $quickdeal)

                            @if($quickdeal->processing == 1)
                                <tr>
                                    <th scope="row">{{ $quickdeal->id }}</th>
                                    <th>{{ $quickdeal->rate }}$</th>
                                    <th>{{ $quickdeal->ticker }}</th>
                                    <th> - </th>
                                    <th>{{ $quickdeal->sell_or_buy }}</th>
                                    <th> - </th>
                                    <th>{{ date("Y-m-d G:i:s", $quickdeal->start_time)  }}</th>
                                    <th> - </th>
                                    <th>processing</th>
                                </tr>
                            @else
                                <tr>
                                    <th scope="row">{{ $quickdeal->id }}</th>
                                    <th>{{ $quickdeal->rate }}$</th>
                                    <th>{{ $quickdeal->ticker }}</th>
                                    <th>{{ $quickdeal->bonus }}$</th>
                                    <th>{{ $quickdeal->sell_or_buy }}</th>
                                    <th>{{ (int)($quickdeal->time / 60) }} min</th>
                                    <th>{{ date("Y-m-d G:i:s", $quickdeal->start_time)  }}</th>
                                    <th>{{ date("Y-m-d G:i:s", $quickdeal->stop_time)  }}</th>
                                    <th>closed</th>
                                </tr>
                            @endif

                        @endforeach

                        </tbody>
                    </table>
                @endif

            </div>

        </div>
    </div> <!-- /container -->
@endsection
