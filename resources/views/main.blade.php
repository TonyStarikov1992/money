@extends('master')

@section('title', 'MAIN')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

            </div>

            <div class="col-md-6 mt-2">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div id="tradingview_1447d"></div>
                    <div class="tradingview-widget-copyright"><a href="https://ru.tradingview.com/" rel="noopener" target="_blank"><span class="blue-text">График USD/EU</span></a> от TradingView</div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.widget(
                            {
                                "width": 980,
                                "height": 610,
                                "symbol": "USD/EU",
                                "interval": "D",
                                "timezone": "Etc/UTC",
                                "theme": "light",
                                "style": "1",
                                "locale": "ru",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "allow_symbol_change": true,
                                "container_id": "tradingview_1447d"
                            }
                        );
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>

            <div class="col-md-3">

            </div>
        </div>
    </div>
    <!-- /container -->
@endsection
