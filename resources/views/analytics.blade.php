@extends('master')

@section('title', 'Analytics')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Analytics</h1>
                <div class="vh-100">
                    <p>Money: {{ $user_money }} $</p>
                    <p>Random %: {{ $random_percent }} %</p>
                    <p>Random +/-: {{ $random_sign }}</p>
                    <p>Bonus: {{ $bonus }} $</p>
                    <p>Start</p>
                </div>
            </div>

        </div>
    </div>
    <!-- /container -->
@endsection
