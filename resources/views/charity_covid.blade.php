@extends('master')

@section('title', 'Charity-Covid')

@section('main')
    <div class="container-fluid">

        <div class="container">
            <div style="background-color: #9dc3e6; border-radius: 40px" class="row flex-lg-row-reverse align-items-center p-5 m-3">

                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/images/qr.png" class="d-block mx-auto img-fluid" alt="charity" loading="lazy">
                </div>

                <div class="col-lg-6">
                    <h1 class="display-6 fw-bold lh-1 mb-3">Elannce against COVID-19</h1>
                    <h3>After your donation, you will receive an email with a little bonus. Thank you for helping make the world a better place.</h3>
                </div>

                <div class="row mt-3">
                    <div class="col text-center">
                        <h2>bc1qhvze5wadwdrmcjy4nqdd6mfnyzy7ar9jhs300d</h2>
                        <a type="button" class="btn btn-primary btn-lg px-5 my-3" href="#">Copy the crypto address</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /container -->
@endsection
