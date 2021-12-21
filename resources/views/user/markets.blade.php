@extends('user.master')

@section('title', 'Markets')

@section('main')
    <div class="container-fluid">
        <div class="row">

            <div class="col">

                <div class="px-4 py-5 my-2 text-center">
                    <h1 class="display-5 fw-bold">Cryptocurrency market widget</h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">This widget displays crypto assets and sorts them by market cap.</p>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                            @auth()
                                <a type="button" class="btn btn-primary btn-lg px-4 me-md-2" href="{{ route('trading') }}">Trade with Elannce</a>
                            @endauth

                            @guest()
                                <a type="button" class="btn btn-primary btn-lg px-4 me-md-2" href="{{ route('register') }}">Trade with Elannce</a>
                            @endguest

                        </div>
                    </div>
                </div>

                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container vh-100">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a> by TradingView</div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                        {
                            "width": "100%",
                            "height": "100%",
                            "defaultColumn": "overview",
                            "screener_type": "crypto_mkt",
                            "displayCurrency": "BTC",
                            "colorTheme": "light",
                            "locale": "en"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->

            </div>

        </div>
    </div>
    <!-- /container -->
@endsection
