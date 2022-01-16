@extends('user.master')

@section('title', 'Charity')

@section('main')
    <div class="container-fluid">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="/images/charity.png" class="d-block mx-lg-auto img-fluid" alt="charity" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-6 fw-bold lh-1 mb-3">ELANNCE Charity</h1>
                <h3>An easy way to donate with cryptocurrency.</h3>
                <p class="lead">
                    We are not a charitable foundation, and we do not at all encourage you to donate your funds, but we cooperate with numerous foundations and believe that if you want, you can improve the lives of those in need, thereby making the world a little better.
                </p>
                <h4>758 432 USD already donated</h4>
            </div>
        </div>

        <div class="container">
            <div style="background-color: #9dc3e6; border-radius: 40px" class="row flex-lg-row-reverse align-items-center p-5 m-3">

                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/images/med.png" class="d-block mx-auto img-fluid" alt="charity" loading="lazy">
                </div>

                <div class="col-lg-6">
                    <h1 class="display-6 fw-bold lh-1 mb-3">Elannce against COVID-19</h1>
                    <h3>Join Elannce Charity and help the world fight COVID-19.</h3>
                </div>

                <div class="row mt-3">
                    <div class="col text-center">
                        <h2>192</h2>
                        <h3>Donations</h3>
                    </div>
                    <div class="col text-center">
                        <h2>454 874 USD</h2>
                        <h3>Total donated</h3>
                    </div>
                    <div class="col text-center">
                        <a type="button" class="btn btn-primary btn-lg px-5 my-3" href="{{ route('userCharityPayCovid') }}">Donate</a>
                    </div>

                </div>

            </div>
        </div>

        <div class="container">
            <div style="background-color: #bdd7ee; border-radius: 40px" class="row flex-lg-row-reverse align-items-center p-5 m-3">

                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/images/food.png" class="d-block mx-auto img-fluid" alt="charity" loading="lazy">
                </div>

                <div class="col-lg-6">
                    <h1 class="display-6 fw-bold lh-1 mb-3">Food for children</h1>
                    <h3>Ensuring healthy foods for children in Africa in the long term.</h3>
                </div>

                <div class="row mt-3">
                    <div class="col text-center">
                        <h2>143</h2>
                        <h3>Donations</h3>
                    </div>
                    <div class="col text-center">
                        <h2>202 847 USD</h2>
                        <h3>Total donated</h3>
                    </div>
                    <div class="col text-center">
                        <a type="button" class="btn btn-primary btn-lg px-5 my-3" href="{{ route('userCharityPayFood') }}">Donate</a>
                    </div>

                </div>

            </div>
        </div>

        <div class="container">
            <div style="background-color: #9dc3e6; border-radius: 40px" class="row flex-lg-row-reverse align-items-center p-5 m-3">

                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/images/earth.png" class="d-block mx-auto img-fluid" alt="charity" loading="lazy">
                </div>

                <div class="col-lg-6">
                    <h1 class="display-6 fw-bold lh-1 mb-3">Save our planet</h1>
                    <h3>Join us to fight climate change, restore habitats, restore oceans and protect endangered wildlife.</h3>
                </div>

                <div class="row mt-3">
                    <div class="col text-center">
                        <h2>87</h2>
                        <h3>Donations</h3>
                    </div>
                    <div class="col text-center">
                        <h2>100 711 USD</h2>
                        <h3>Total donated</h3>
                    </div>
                    <div class="col text-center">
                        <a type="button" class="btn btn-primary btn-lg px-5 my-3" href="{{ route('userCharityPayEarth') }}">Donate</a>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <!-- /container -->
@endsection
