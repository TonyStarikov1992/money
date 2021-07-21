<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>
<body>

<nav class="navbar navbar-light navbar-expand-md bg-faded justify-content-center">
    <div class="container-fluid">
        <a href="/" class="navbar-brand d-flex w-50 me-auto">
            <img src="/images/logo2.png" alt=""class="d-inline-block align-text-top">
{{--            <span class="text-uppercase font-weight-bold display-4">ELANNCE</span>--}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
            <ul class="navbar-nav w-100 justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fs-2" href="{{ route('markets') }}">MARKETS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-2" href="{{ route('trading') }}">TRADING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-2" href="{{ route('analytics') }}">ANALYTICS</a>
                    </li>
                </ul>
            </ul>
            <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
                @guest()
                    <li class="nav-item">
                        <a class="nav-link fs-2" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-2" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
                @auth()
                    <form id="logout-form" action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary fs-2">Logout</button>
                    </form>
                @endauth
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-2 dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">EN</a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item fs-2" href="#">RU</a></li>
                            {{--                        <li>--}}
                            {{--                            <hr class="dropdown-divider">--}}
                            {{--                        </li>--}}
                            {{--                        <li><a class="dropdown-item" href="#">Item</a></li>--}}
                        </ul>
                    </li>
            </ul>
        </div>
    </div>
</nav>


<main role="main">
    @yield('main')
</main>

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Links  -->
    <section class="p-4">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        About
                    </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Conditions
                    </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Privacy policy
                    </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Charity
                    </h6>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 ELANNCE. All rights reserved.
{{--        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>--}}
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
