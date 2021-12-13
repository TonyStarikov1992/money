@extends('user.master')

@section('title', 'User Home - pay the order')

@section('main')
    <div class="container">

        <div class="row">

            <div class="col">
                <h2 class="m-5">
                    You need to pay your order. Please check
                    <a href="{{ route('analytics') }}">Analytics</a>
                    page.
                </h2>
            </div>
        </div>

    </div>
    <!-- /container -->
@endsection
