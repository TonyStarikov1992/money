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

    <!-- Jquery 1.9 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js" integrity="sha512-synHs+rLg2WDVE9U0oHVJURDCiqft60GcWOW7tXySy8oIr0Hjl3K9gv7Bq/gSj4NDVpc5vmsNkMGGJ6t2VpUMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Maskedinput 1.4.1 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>@yield('title')</title>
</head>
<body>


<div class="container">

    @guest()

        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
            <a href="{{ route('main') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="/images/logo.png" alt="" width="60" height="60" class="d-inline-block">
                <span class="mx-1 fs-4 fw-bold text-primary d-inline-block">ELANNCE</span>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('main') }}" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="{{ route('markets') }}" class="nav-link px-2 link-dark">Markets</a></li>
                <li><a href="{{ route('trading') }}" class="nav-link px-2 link-dark">Trading</a></li>
                <li><a href="{{ route('analytics') }}" class="nav-link px-2 link-dark">Analitics</a></li>
                <li><a href="{{ route('charity') }}" class="nav-link px-2 link-dark">Charity</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                <a class="btn btn btn-primary" href="{{ route('register') }}">Sign-up</a>
            </div>
        </header>

    @endguest

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
