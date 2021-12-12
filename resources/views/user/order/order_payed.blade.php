@extends('master')

@section('title', 'Analytics order payed')

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
                        <a href="{{ route('userHome') }}">Home</a>
                        page.
                    </h1>
                    <h3>
                        License validity period:
                        {{ $user->license_type }} month(s)
                    </h3>
                    <h3>
                        License expires date:
                        {{ date('d-m-Y', $user->license_expires_time) }}
                    </h3>
                </div>

            </div>
        </div>

    </div>
    <!-- /container -->
@endsection
