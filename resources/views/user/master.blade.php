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
    <header class="py-3 mb-4">
        <div class="row">
            <a href="{{ route('userHome') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <span class="fs-4 fw-bold text-primary">ELANNCE</span>
            </a>

            <div class="col text-end">
                @auth()
                    @if(Auth::user()->isAdmin())
                        <a class="btn btn-outline-primary me-2" href="{{ route('adminHome') }}">Admin</a>
                    @else
                        <a class="btn btn-outline-primary me-2" href="{{ route('userHome') }}">Home | Check : {{ Auth::user()->check }}$</a>
                    @endif
                    <form class="d-inline" id="logout-form" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn btn-primary">Logout</button>
                    </form>
                @endauth
            </div>
        </div>

        <div class="row">
            <ul class="nav col mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('userHome') }}" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="{{ route('userMarkets') }}" class="nav-link px-2 link-dark">Markets</a></li>
                <li><a href="{{ route('quickdeals.index') }}" class="nav-link px-2 link-dark">Trading</a></li>
                <li><a href="{{ route('order.index') }}" class="nav-link px-2 link-dark">Analytics</a></li>
                <li><a href="{{ route('userCharity') }}" class="nav-link px-2 link-dark">Charity</a></li>
                <li><a href="{{ route('deposit.index') }}" class="nav-link px-2 link-dark">Deposits</a></li>
                <li><a href="{{ route('withdrawal.index') }}" class="nav-link px-2 link-dark">Withdrawals</a></li>
                <li><a href="{{ route('setting.index') }}" class="nav-link px-2 link-dark">Settings</a></li>

                @if( Auth::user()->current_order_id )

                    <li><a href="{{ route('sessions.index') }}" class="nav-link px-2 link-dark">Sessions</a></li>

                @endif
            </ul>
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
