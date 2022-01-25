<!doctype html>
<html lang="en">
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

    <title>@yield('title')</title>
</head>
<body>


<div class="container">

    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
        <a href="{{ route('userHome') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="/images/logo.png" alt="" width="60" height="60" class="d-inline-block">
            <span class="mx-1 fs-4 fw-bold text-primary d-inline-block">ELANNCE</span>
        </a>

{{--        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">--}}
{{--            <li><a href="{{ route('main') }}" class="nav-link px-2 link-dark">Home</a></li>--}}
{{--            <li><a href="{{ route('markets') }}" class="nav-link px-2 link-dark">Markets</a></li>--}}
{{--            <li><a href="{{ route('trading') }}" class="nav-link px-2 link-dark">Trading</a></li>--}}
{{--            <li><a href="{{ route('analytics') }}" class="nav-link px-2 link-dark">Analitics</a></li>--}}
{{--            <li><a href="{{ route('charity') }}" class="nav-link px-2 link-dark">Charity</a></li>--}}
{{--        </ul>--}}

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

    <main style="min-height: 50vh" role="main">
        @yield('main')
    </main>

    <footer class="pt-5">

        <div class="row">
            <div class="col text-start">
                <p>
                    <a href = "mailto: support@elannce.com">support@elannce.com</a>
                </p>
            </div>
            <div class="col text-center">
                <p class="text-center">
                    © {{ date("Y") }} ELANNCE. All rights reserved.
                    <a href="https://freekassa.ru" target="_blank" rel="noopener noreferrer">
                        <img src="https://cdn.freekassa.ru/banners/small-white-1.png" title="Прием платежей на сайте для физических лиц и т.д.">
                    </a>
                </p>
            </div>
            <div class="col text-end">
                <p>
                    <a href="{{ route('conditions') }}">Terms and conditions</a>
                </p>
            </div>
        </div>

    </footer>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
