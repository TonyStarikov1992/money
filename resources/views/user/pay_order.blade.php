@extends('user.master')

@section('title', 'User Home - pay the order')

@section('main')
    <div class="row">

        <div class="col-12">
            <h2 class="m-5">
                You need to pay your order. Please check
                <a href="{{ route('analytics') }}">Analytics</a>
                page.
            </h2>
        </div>
    </div>
    <!-- /container -->
@endsection
