@extends('user.master')

@section('title', 'MAKE REQUEST')

@section('main')
    <div class="container">

        <h1>MAKE REQUEST</h1>

        <hr>

        <form method="POST" action="{{ route('payments.store') }}">
            @csrf

            <div class="mb-3">
                <label for="type" class="form-label">REQUEST TYPE</label>
                <select name="type" id="type" class="mb-3 form-select">
                    <option value="get">GET MONEY</option>
                    <option value="pay">PAY MONEY</option>
                </select>
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">RATE</span>
                </div>
                <input type="text" name="rate" id="rate" class="form-control" placeholder="max get rate {{ $user->check }}$" aria-describedby="addon-wrapping">
            </div>

            <button type="submit" class="btn btn-success mt-3">CREATE</button>
        </form>

    </div> <!-- /container -->
@endsection
