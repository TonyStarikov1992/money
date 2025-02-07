@extends('master')

@section('title', 'MAIN')

@section('main')
    <div class="row d-none d-lg-flex p-0">

        <div class="col-lg-6 py-5">
            <h1 class="display-5 fw-bold lh-1 mb-3 mt-5">A trusted and secure bitcoin and crypto trading.</h1>
            <p class="lead">Get started with the easiest and most secure platform to buy, sell, trade, and earn cryptocurrencies.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a type="button" class="btn btn-primary btn-lg px-4 me-md-2" href="{{ route('register') }}">Get started</a>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="/images/b2.png" class="d-block mx-auto img-fluid" alt="image1" loading="lazy" width="500" height="500">
        </div>

    </div>

    <div class="row d-flex d-lg-none m-0 p-0">

        <div class="col-lg-6 m-0 p-0">
            <img src="/images/b2.png" class="d-block mx-auto img-fluid" alt="image1" loading="lazy">
        </div>

        <div class="col-lg-6 p-0 mb-2 text-center">
            <h1 class="display-5 fw-bold lh-1 m-0">A trusted and secure bitcoin and crypto trading.</h1>
            <p class="lead">Get started with the easiest and most secure platform to buy, sell, trade, and earn cryptocurrencies.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a type="button" class="btn btn-primary btn-lg px-4 me-md-2" href="{{ route('register') }}">Get started</a>
            </div>
        </div>

    </div>

    <div class="bg-light p-5" style="border-radius: 40px" id="featured-3">

        <h2 class="pb-2 text-center">About Us</h2>

        <div class="row g-4 py-5">
            <div class="col text-center">
                <h2 class="text-primary fs-1">2020</h2>
                <p>Market entry year</p>
            </div>
            <div class="col text-center">
                <h2 class="text-primary fs-1">0%</h2>
                <p>Customers' funds lost</p>
            </div>
            <div class="col text-center">
                <h2 class="text-primary fs-1">400K</h2>
                <p>Registered users on trade platform</p>
            </div>

        </div>
    </div>

    <div class="px-4 py-5" id="icon-grid">
        <h2 class="pb-2 border-bottom">Start trading crypto</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">

            <div class="col d-flex align-items-start">
                <i class="fas fa-shield-alt fa-2x bi text-muted flex-shrink-0 me-3 mb-2"></i>
                <div>
                    <h4 class="fw-bold mb-0">Strong security</h4>
                    <p>Protection against DDoS attacks, full data encryption, cryptocurrency cold storage, and compliance with PCI DSS standards to safeguard your funds.</p>
                </div>
            </div>

            <div class="col d-flex align-items-start">
                <i class="fas fa-credit-card fa-2x bi text-muted flex-shrink-0 me-3 mb-2"></i>
                <div>
                    <h4 class="fw-bold mb-0">Payment options</h4>
                    <p>Multiple payment methods: Visa, Mastercard, bank transfer (SWIFT, SEPA, ACH, Faster Payments), cryptocurrency.</p>
                </div>
            </div>

            <div class="col d-flex align-items-start">
                <i class="fas fa-headset fa-2x bi text-muted flex-shrink-0 me-3 mb-2"></i>
                <div>
                    <h4 class="fw-bold mb-0">24/7 support</h4>
                    <p>Dedicated support via email, phone, and live chat around the clock to answer your questions at any time.</p>
                </div>
            </div>

            <div class="col d-flex align-items-start">
                <i class="fas fa-donate fa-2x bi text-muted flex-shrink-0 me-3 mb-2"></i>
                <div>
                    <h4 class="fw-bold mb-0">Competitive commissions</h4>
                    <p>Reasonable fees for takers and makers, special conditions for high-volume traders, and strong offers for market makers.</p>
                </div>
            </div>

            <div class="col d-flex align-items-start">
                <i class="fas fa-sort-amount-up fa-2x bi text-muted flex-shrink-0 me-3 mb-2"></i>
                <div>
                    <h4 class="fw-bold mb-0">Reliable order execution</h4>
                    <p>Advanced order matching algorithms, a high-liquidity order book, favorable conditions for market making, high-frequency trading, and scalping strategies.</p>
                </div>
            </div>

            <div class="col d-flex align-items-start">
                <i class="fas fa-user-tie fa-2x bi text-muted flex-shrink-0 me-3 mb-2"></i>
                <div>
                    <h4 class="fw-bold mb-0">Professional connectivity</h4>
                    <p>Corporate accounts and professional traders can take advantage of the fastest trading speeds through institutional-grade connectivity and co-location services with direct access to our digital asset gateway.</p>
                </div>
            </div>

            <div class="col d-flex align-items-start">
                <i class="fas fa-tools fa-2x bi text-muted flex-shrink-0 me-3 mb-2"></i>
                <div>
                    <h4 class="fw-bold mb-0">Advanced tools</h4>
                    <p>Facilitates a graphical trading experience with advanced charting functionality that allows traders to visualise orders, positions and price alerts.</p>
                </div>
            </div>

            <div class="col d-flex align-items-start">
                <i class="fas fa-coins fa-2x bi text-muted flex-shrink-0 me-3 mb-2"></i>
                <div>
                    <h4 class="fw-bold mb-0">Trade with confidence</h4>
                    <p>Our platform provides world class financial stability by maintaining full reserves, healthy banking relationships and the highest standards of legal compliance.</p>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <a type="button" class="btn btn-primary btn-lg px-4" href="{{ route('register') }}">Start Trading</a>
        </div>
    </div>

    <div class="bg-secondary text-secondary px-4 py-2 text-center">
        <div class="py-5">
            <h1 class="display-6 fw-bold text-white">Become part of a global community of people who have found their path to the crypto world with ELANNCE</h1>
            <div class="col-lg-6 mx-auto my-3">
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a type="button" class="btn btn-outline-info btn-lg px-4 fw-bold" href="{{ route('register') }}">Join ELANNCE</a>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <a href="https://freekassa.ru" target="_blank" rel="noopener noreferrer">--}}
{{--                <img src="https://cdn.freekassa.ru/banners/small-white-1.png" title="Прием платежей на сайте для физических лиц и т.д.">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
