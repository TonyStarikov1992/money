@extends('user.master')

@section('title', 'User Home - make the order')

@section('main')
    <div class="container">

        <div class="row">

            <div class="col">

                <h2 class="m-5">
                    To trade on Elannce you need to buy one of the Elannce analytics products. Please check
                    <a href="{{ route('analytics') }}">Analytics</a>
                    page.
                </h2>

            </div>
        </div>

    </div>
    <!-- /container -->
@endsection
