@extends('user.master')

@section('title', 'CREATE ANALYTICS ORDER')

@section('main')
    <div class="container-fluid">

        <div class="container">
            <div style="border-radius: 40px" class="row bg-light flex-lg-row-reverse align-items-center p-5 m-3">

                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/images/qr.png" class="d-block mx-auto img-fluid" alt="charity" loading="lazy">
                </div>

                <div class="col-lg-6">
                    <h1 class="display-6 fw-bold lh-1 mb-3">Create new Analytics order</h1>
                    <h3>
                        License validity period:
                        @if($type == 4) 5 days @else {{ $type }} month(s) @endif
                    </h3>
                    <h3>
                        License expires date:
                        {{ date("Y-m-d", $expires_time)  }}
                    </h3>
                    <h3>
                        License type:
                        @if($type == 4) Trial
                        @elseif($type == 1) Starter
                        @elseif($type == 2) Pro
                        @elseif($type == 3) Enterprise
                        @endif
                    </h3>

                    <h3>
                        Price:
                        ${{ $money }} in BTC
                    </h3>

                    @if($type != 4)
                        <h3>
                            Payment method:
                            BTC (bitcoin)
                        </h3>
                    @endif
                </div>

                <div class="row mt-3">
                    <div class="col text-center">
                        <p>
                            I have read and agree to the website <a href="{{ route('conditions') }}">terms and conditions</a>
                        </p>
                        <p>
                            After confirmation of payment, you will be contacted by our manager using the contact information provided during registration to provide a license to use ELANNCE analytics.
                        </p>
                        <form method="POST" action="{{ route('order.store') }}">
                            @csrf
                            <input type="hidden" id="custId" name="type" value="{{ $type }}">
                            <button type="submit" class="btn btn-primary btn-lg">Create new order</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /container -->
@endsection
