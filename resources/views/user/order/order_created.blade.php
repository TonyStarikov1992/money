@extends('master')

@section('title', 'Analytics order created')

@section('main')
    <div class="container-fluid">

        <div class="container">
            <div style="border-radius: 40px" class="row bg-light flex-lg-row-reverse align-items-center p-5 m-3">

                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/images/qr.png" class="d-block mx-auto img-fluid" alt="charity" loading="lazy">
                </div>

                <div class="col-lg-6">
                    <h1 class="display-6 fw-bold lh-1 mb-3">Order created successfully.</h1>
                    <h2 class="display-6 fw-bold lh-1 mb-3">Waiting for administrator check and your payment. Visit <a href="{{ route('analytics') }}">Analitics page</a> later.</h2>
                    <h3>
                        License validity period:
                        {{ $month }} month(s)
                    </h3>
                    <h3>
                        License expires date:
                        {{ $expires_time }}
                    </h3>
                    <h3>
                        License type:
                        Advanced
                    </h3>
                    <h3>
                        Price:
                        ${{ $money }} in BTC
                    </h3>
                    <h3>
                        Payment method:
                        BTC (bitcoin)
                    </h3>
                </div>

                <div class="row mt-3">
                    <div class="col text-center">
                        <p>
                            I have read and agree to the website <a href="{{ route('conditions') }}">terms and conditions</a>
                        </p>
                        <p>
                            After confirmation of payment, you will be contacted by our manager using the contact information provided during registration to provide a license to use ELANNCE analytics.
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /container -->
@endsection
