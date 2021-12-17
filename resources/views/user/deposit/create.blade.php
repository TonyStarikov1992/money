@extends('user.master')

@section('title', 'MAKE DEPOSIT')

@section('main')
    <div class="container">

        <h1>MAKE DEPOSIT</h1>

        <hr>

        <form method="POST" action="{{ route('deposit.store') }}">
            @csrf

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">RATE</span>
                </div>
                <input type="text" name="rate" id="rate" class="form-control" placeholder="Enter the amount in $, you want to deposit" aria-describedby="addon-wrapping">
            </div>

            <button type="submit" class="btn btn-success mt-3">MAKE DEPOSIT</button>
        </form>

    </div> <!-- /container -->
@endsection
