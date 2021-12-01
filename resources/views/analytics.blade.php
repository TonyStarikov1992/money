@extends('master')

@section('title', 'Analytics')

@section('main')
    <div class="container-fluid">

        <div class="row flex-lg-row-reverse align-items-center g-5 mb-3 py-5">

            <div class="col-10 col-sm-8 col-lg-6">
                <img src="/images/analytics.png" class="d-block mx-lg-auto img-fluid" alt="charity" loading="lazy">
            </div>

            <div class="col-lg-6">
                <h1 class="display-6 fw-bold lh-1 mb-3">ELANNCE Analytics</h1>
                <p class="lead">
                    An easy way to generate passive income in the cryptocurrency market. We understand that not everyone has sufficient experience in trading, so we have created the opportunity to hire a group of leading analysts from different countries, and they will work for you. This feature will also be of interest to experienced traders who have decided to take a break.
                </p>
            </div>
        </div>

        <div class="row flex-lg-row-reverse align-items-center g-5 mb-3 py-5">

            <div class="col-lg-6">
                <h1 class="display-6 fw-bold lh-1 mb-3">Automate your bidding</h1>
                <p class="lead">
                    Get the power of Elannce analytics flagship product without the technical complexity of managing your own instance and enjoy the ease of cloud management. You will be up and running in minutes with 99.9% uptime on our secure enterprise infrastructure.
                </p>
            </div>

            <div class="col-10 col-sm-8 col-lg-6">
                <img src="/images/analytics1.png" class="d-block mx-lg-auto img-fluid" alt="charity" loading="lazy">
            </div>
        </div>

        <div class="row flex-lg-row-reverse align-items-center g-5 mb-3 py-5">

            <div class="col-10 col-sm-8 col-lg-6">
                <img src="/images/analytics2.png" class="d-block mx-lg-auto img-fluid" alt="charity" loading="lazy">
            </div>

            <div class="col-lg-6">
                <h1 class="display-6 fw-bold lh-1 mb-3">No limits</h1>
                <p class="lead">
                    Elannce analytics does not limit trade volume or impose fees based on trading activity.
                </p>
            </div>
        </div>

        <div class="container px-4 py-5" id="featured-3">
            <h2 class="display-6 fw-bold lh-1 mb-3 pb-3 border-bottom text-center">Easy start</h2>

            <h2 class="  text-center"></h2>

            <div class="row g-4 py-2 row-cols-1 row-cols-lg-3">
                <div class="col text-center">
                    <h2>1. Create order</h2>
                    <p class="lead">
                        We require you to fill in basic information to generate your account and begin processing your order.
                    </p>
                </div>

                <div class="col text-center">
                    <h2>2. Process Payment</h2>
                    <p class="lead">
                        To finalize your order, please send the required bitcoin amount to the unique address listed on your order.
                    </p>
                </div>

                <div class="col text-center">
                    <h2>3. Complete Order</h2>
                    <p class="lead">
                        Once your transaction is confirmed on the blockchain, we will generate your license and you can start using the product.
                    </p>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">1 month / Starter</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$2000</h1>

                        @auth()
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a type="button" class="w-100 btn btn-lg btn-outline-primary px-4" href="/analytics/order/1">Create order</a>
                            </div>
                        @endauth

                        @guest()
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a type="button" class="w-100 btn btn-lg btn-outline-primary px-4" href="{{ route('register') }}">Create order</a>
                            </div>
                        @endguest

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">

                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal">3 months / Enterprise</h4>
                    </div>

                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$5400</h1>

                        @auth()
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a type="button" class="w-100 btn btn-lg btn-primary px-4" href="/analytics/order/3">Create order</a>
                            </div>
                        @endauth

                        @guest()
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a type="button" class="w-100 btn btn-lg btn-primary px-4" href="{{ route('register') }}">Create order</a>
                            </div>
                        @endguest

                    </div>

                </div>
            </div>

            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">2 months / Pro</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$3800</h1>

                        @auth()
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a type="button" class="w-100 btn btn-lg btn-primary px-4" href="/analytics/order/2">Create order</a>
                            </div>
                        @endauth

                        @guest()
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a type="button" class="w-100 btn btn-lg btn-primary px-4" href="{{ route('register') }}">Create order</a>
                            </div>
                        @endguest

                    </div>
                </div>
            </div>

        </div>

        <div class="py-2 my-2 text-center">
            <div class="col mx-auto">
                <p class="lead mb-1">
                    Final price may vary.
                    Active exchange(s) may have API restrictions on connections originating from a single IP.
                    Results will vary based on hardware and internet performance.
                    Advertising data is subject to change at any time without prior notice.
                </p>
        </div>

{{--        <div class="row d-flex justify-content-center">--}}
{{--            <div class="col-12">--}}

{{--                @auth()--}}

{{--                    @if($session_stop_time)--}}
{{--                        <h3>Session stop time: {{ date("Y-m-d H:i:s", $session_stop_time)  }}</h3>--}}
{{--                    @endif--}}

{{--                    <div>--}}
{{--                        <p>Money: {{ $user_money }} $</p>--}}
{{--                        <p>Random %: {{ $random_percent }} %</p>--}}
{{--                        <p>Random +/-: {{ $random_sign }}</p>--}}
{{--                        <p>Bonus: {{ $bonus }} $</p>--}}



{{--                        @if(!$current_session_id and $user_money > 0)--}}
{{--                            <p>Money: {{ $user_money }} $</p>--}}
{{--                            <form action="{{ route('sessionStart')}}" method="POST">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="exampleFormControlInput1" class="form-label">Rate</label>--}}
{{--                                    <input name="rate" type="text" class="form-control" id="exampleFormControlInput1" placeholder="min rate 200$, max rate {{ $user_money }}$">--}}
{{--                                </div>--}}
{{--                                <select name="hour" class="mb-3 form-select" aria-label="Default select example">--}}
{{--                                    <option value="1">1</option>--}}
{{--                                    <option value="2">2</option>--}}
{{--                                    <option value="3">3</option>--}}
{{--                                    <option value="4">4</option>--}}
{{--                                    <option value="5">5</option>--}}
{{--                                    <option value="6">6</option>--}}
{{--                                    <option value="7">7</option>--}}
{{--                                    <option value="8">8</option>--}}
{{--                                    <option value="9">9</option>--}}
{{--                                    <option value="10">10</option>--}}
{{--                                    <option value="11">11</option>--}}
{{--                                    <option value="12">12</option>--}}
{{--                                </select>--}}

{{--                                <select name="tickers[]" class="form-select form-select-lg" multiple aria-label="multiple select example">--}}
{{--                                    <option value="BTC">BTC</option>--}}
{{--                                    <option value="SHIB">SHIB</option>--}}
{{--                                    <option value="ETH">ETH</option>--}}
{{--                                    <option value="DOGE">DOGE</option>--}}
{{--                                    <option value="XRP">XRP</option>--}}
{{--                                    <option value="MATIC">MATIC</option>--}}
{{--                                    <option value="ADA">ADA</option>--}}
{{--                                    <option value="SOL">SOL</option>--}}
{{--                                    <option value="DATA">DATA</option>--}}
{{--                                    <option value="BNB">BNB</option>--}}
{{--                                    <option value="BTTN">BTTN</option>--}}
{{--                                    <option value="PZM">PZM</option>--}}
{{--                                    <option value="pDOTn">pDOTn</option>--}}
{{--                                    <option value="XLM">XLM</option>--}}
{{--                                    <option value="TRX">TRX</option>--}}
{{--                                    <option value="HT">HT</option>--}}
{{--                                    <option value="DOT">DOT</option>--}}
{{--                                    <option value="LINK">LINK</option>--}}
{{--                                    <option value="BCH">BCH</option>--}}
{{--                                    <option value="LTC">LTC</option>--}}
{{--                                </select>--}}

{{--                                <button type="submit" class="my-3 btn btn-primary">--}}
{{--                                    START--}}
{{--                                </button>--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        @endif--}}

{{--                        @if($current_session_id)--}}
{{--                            <form action="{{ route('sessionStop')}}" method="POST">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    STOP--}}
{{--                                </button>--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        @endif--}}

{{--                    </div>--}}


{{--                @endauth--}}
{{--            </div>--}}

{{--        </div>--}}
    </div>
    <!-- /container -->
@endsection
