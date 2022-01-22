@extends('user.master')

@section('title', 'Analytics order')

@section('main')
    <div class="container-fluid">

        <div class="container">
            <div style="border-radius: 40px" class="row bg-light flex-lg-row-reverse align-items-center p-5 m-3">

                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/images/qr.png" class="d-block mx-auto img-fluid" alt="charity" loading="lazy">
                </div>

                <div class="col-lg-6">
                    <h1 class="display-6 fw-bold lh-1 mb-3">
                        Order checked by administrator and payed successfully! Check your
                        <a href="{{ route('sessions.index') }}">Sessions</a>
                        page.
                    </h1>
                    <h3>
                        License validity period:
                        @if($order->type == 4) 5 days @else {{ $order->type }} month(s) @endif
                    </h3>
                    <h3>
                        License expires date:
                        {{ date('d-m-Y', $order->expires_time) }}
                    </h3>
                </div>

            </div>
        </div>

    </div>
    <!-- /container -->
@endsection
