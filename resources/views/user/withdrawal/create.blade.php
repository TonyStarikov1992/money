@extends('user.master')

@section('title', 'MAKE WITHDRAWAL')

@section('main')
    <div class="container">

        <h1>MAKE WITHDRAWAL</h1>

        <hr>

        <form method="POST" action="{{ route('withdrawal.store') }}">
            @csrf

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">RATE</span>
                </div>
                <input type="text" name="rate" id="rate" class="form-control" placeholder="Max withdrawal rate {{ $user->check }}$" aria-describedby="addon-wrapping">
            </div>

            <button type="submit" class="btn btn-success mt-3">MAKE WITHDRAWAL</button>
        </form>

    </div> <!-- /container -->
@endsection
