<!doctype html>
<html class="w-100" lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
    />

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>

    <!-- Bootstrap datepicker JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    <!-- Maskedinput 1.4.1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @stack('scripts')

    <title>@yield('title')</title>
</head>
<body>


<div class="container mx-xs-0">

    @auth()

        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0">
            <a href="{{ route('userHome') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="/images/logo2.svg" alt="logo" height="60" class="d-inline-block">
            </a>
            <div class="col-md-5 text-end">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        MENU
                    </button>
                    <ul class="dropdown-menu">

                        <li><a href="{{ route('userHome') }}" class="dropdown-item">Home</a></li>
                        <li><a href="{{ route('userMarkets') }}" class="dropdown-item">Markets</a></li>
                        <li><a href="{{ route('quickdeals.index') }}" class="dropdown-item">Trading</a></li>
                        <li><a href="{{ route('order.index') }}" class="dropdown-item">Analytics</a></li>
                        <li><a href="{{ route('userCharity') }}" class="dropdown-item">Charity</a></li>
                        <li><a href="{{ route('deposit.index') }}" class="dropdown-item">Deposits</a></li>
                        <li><a href="{{ route('withdrawal.index') }}" class="dropdown-item">Withdrawals</a></li>
                        <li><a href="{{ route('setting.index') }}" class="dropdown-item">Settings</a></li>

                        @if( Auth::user()->current_order_id )

                            <li><a href="{{ route('sessions.index') }}" class="dropdown-item">Sessions</a></li>

                        @endif

                    </ul>
                </div>
                @if(Auth::user()->isAdmin())
                    <a class="btn btn-outline-primary me-2" href="{{ route('adminHome') }}">Admin</a>
                @else
                    <a class="btn btn-outline-primary me-2" href="{{ route('userHome') }}">Home | Check : {{ Auth::user()->check }}$</a>
                @endif
                <form class="d-inline" id="logout-form" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn btn-primary">Logout</button>
                </form>
            </div>
        </header>

    @endauth

    @guest()

        <header class="row d-none d-lg-flex py-3 mb-0">
            <div class="col-3 text-start my-auto">
                <a href="{{ route('main') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="/images/logo2.svg" alt="logo" height="30" class="d-inline-block my-auto">
                </a>
            </div>

            <div class="col-6 text-center my-auto">
                <ul class="nav mb-2 justify-content-center">
                    <li><a href="{{ route('main') }}" class="nav-link px-2 link-dark">Home</a></li>
                    <li><a href="{{ route('markets') }}" class="nav-link px-2 link-dark">Markets</a></li>
                    <li><a href="{{ route('trading') }}" class="nav-link px-2 link-dark">Trading</a></li>
                    <li><a href="{{ route('analytics') }}" class="nav-link px-2 link-dark">Analytics</a></li>
                    <li><a href="{{ route('charity') }}" class="nav-link px-2 link-dark">Charity</a></li>
                </ul>
            </div>

            <div class="col-3 text-end my-auto">
                <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                <a class="btn btn btn-primary" href="{{ route('register') }}">Sign-up</a>
            </div>
        </header>

        <header class="row d-none d-sm-flex d-lg-none py-1 mb-0">
                <div class="col-3 text-start my-auto">
                    <a href="{{ route('main') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                        <img src="/images/logo2.svg" alt="logo" height="30" class="d-inline-block my-auto">
                    </a>
                </div>

                <div class="col-9 text-end my-auto">

                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            MENU
                        </button>
                        <ul class="dropdown-menu">

                            <li><a href="{{ route('main') }}" class="dropdown-item">Home</a></li>
                            <li><a href="{{ route('markets') }}" class="dropdown-item">Markets</a></li>
                            <li><a href="{{ route('trading') }}" class="dropdown-item">Trading</a></li>
                            <li><a href="{{ route('analytics') }}" class="dropdown-item">Analytics</a></li>
                            <li><a href="{{ route('charity') }}" class="dropdown-item">Charity</a></li>

                        </ul>
                    </div>

                    <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                    <a class="btn btn btn-primary" href="{{ route('register') }}">Sign-up</a>
                </div>
            </header>

        <header class="row d-flex d-sm-none p-0 m-0 py-3 mb-4">
                <div class="col-6 text-start p-0 m-0 my-auto">
                    <a href="{{ route('main') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                        <img src="/images/logo2.svg" alt="logo" height="30" class="d-inline-block my-auto">
                    </a>
                </div>

                <div class="col-6 text-end p-0 m-0 my-auto">

                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            MENU
                        </button>
                        <ul class="dropdown-menu">

                            <li><a href="{{ route('main') }}" class="dropdown-item">Home</a></li>
                            <li><a href="{{ route('markets') }}" class="dropdown-item">Markets</a></li>
                            <li><a href="{{ route('trading') }}" class="dropdown-item">Trading</a></li>
                            <li><a href="{{ route('analytics') }}" class="dropdown-item">Analytics</a></li>
                            <li><a href="{{ route('charity') }}" class="dropdown-item">Charity</a></li>
                            <li><a href="{{ route('login') }}" class="dropdown-item">Login</a></li>
                            <li><a href="{{ route('register') }}" class="dropdown-item">Sign-up</a></li>

                        </ul>
                    </div>

                </div>
        </header>

    @endguest

    <main style="min-height: 50vh" role="main">
        @yield('main')
    </main>


        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">

            <!-- Section: Links  -->
            <section>
                <div class="container text-center text-sm-start mt-5 pt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">

                        <!-- Grid column -->
                        <div class="col-3 mb-4 mx-auto">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Products
                            </h6>
                            <p>
                                <a href="{{ route('analytics') }}" class="text-reset">Analytics</a>
                            </p>
                            <p>
                                <a href="{{ route('trading') }}" class="text-reset">Trading</a>
                            </p>
                            <p>
                                <a href="https://trustwallet.com/" target="_blank" class="text-reset">Trustwallet</a>
                            </p>
                            <p>
                                <a href="{{ route('listing') }}" class="text-reset">Listing</a>
                            </p>
                            <p>
                                <a href="{{ route('charity') }}" class="text-reset">Charity</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-3 mb-4 mx-auto">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Information
                            </h6>
                            <p>
                                <a href="{{ route('about') }}" class="text-reset">About Us</a>
                            </p>
                            <p>
                                <a href="{{ route('commissions') }}" class="text-reset">Commissions</a>
                            </p>
                            <p>
                                <a href="{{ route('heatmap') }}" class="text-reset">Crypto Heatmap</a>
                            </p>
                            <p>
                                <a href="{{ route('markets') }}" class="text-reset">Crypto Screener</a>
                            </p>
                            <p>
                                <a href="{{ route('faq') }}" class="text-reset">FAQ</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-3 mb-4 mx-auto">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Company
                            </h6>
                            <p>
                                <a href="{{ route('policy') }}" class="text-reset">AML/KYC Policy</a>
                            </p>
                            <p>
                                <a href="{{ route('conditions') }}" class="text-reset">Privacy Policy</a>
                            </p>
                            <p>
                                <a href="{{ route('risk') }}" class="text-reset">Risk Warning</a>
                            </p>
                            <p>
                                <a href="{{ route('agreement') }}" class="text-reset">Terms of use</a>
                            </p>

                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="row p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                <div class="col p-0 m-0 text-start">
                    © {{ date("Y") }} ELANNCE. All rights reserved.
                    <a href="https://freekassa.ru" target="_blank" rel="noopener noreferrer">
                        <img src="https://cdn.freekassa.ru/banners/small-white-1.png" title="Прием платежей на сайте для физических лиц и т.д.">
                    </a>
                    <img src="/images/bitcoin.svg" height="30px">
                    <img src="/images/visa.svg" height="30px">
                    <img src="/images/mastercard.svg" height="30px">
                </div>
                <div class="col p-0 m-0 text-end">
                    SERVER TIME: {{ date("Y-m-d G:i:s", time()) }}
                </div>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
