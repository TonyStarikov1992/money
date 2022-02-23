@extends('admin.master')

@section('title', 'CREATE')

@section('main')
    <div class="container">

        <hr>

        <h1>ADD USER</h1>

        <hr>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Name</span>
                </div>
                <input value="{{ $name }}" type="text" name="name" id="name" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Surname</span>
                </div>
                <input value="{{ $surname }}" type="text" name="surname" id="surname" class="form-control" placeholder="Surname" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Country</span>
                </div>
                <input value="{{ $country }}" type="text" name="country" id="country" class="form-control" placeholder="Country" aria-describedby="addon-wrapping">
            </div>

            <p class="text-start">Birthday</p>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Day</span>
                </div>
                <input type="text" name="birthday_day" id="birthday_day" value="{{ $day }}" class="form-control" placeholder="17.06.1992" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Month</span>
                </div>
                <input type="text" name="birthday_month" id="birthday_month" value="{{ $month }}" class="form-control" placeholder="17.06.1992" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Year</span>
                </div>
                <input type="text" name="birthday_year" id="birthday_year" value="{{ $year }}" class="form-control" placeholder="17.06.1992" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Time Zone</span>
                </div>
                <input value="{{ $timezone }}" type="text" name="locale" id="locale" class="form-control" placeholder="UTC +3" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Email</span>
                </div>
                <input value="{{ $email }}" type="text" name="email" id="email" class="form-control" placeholder="Enter email" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Phone</span>
                </div>
                <input value="{{ $phone }}" type="text" name="phone" id="phone" class="form-control" placeholder="+380634139684" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Password</span>
                </div>
                <input type="text" name="password" id="password" class="form-control" placeholder="Enter password" aria-describedby="addon-wrapping">
{{--                <small id="emailHelp" class="form-text text-muted">Minimum 8 symbols.</small>--}}
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Check</span>
                </div>
                <input value="500" type="text" name="check" id="check" class="form-control" placeholder="500" aria-describedby="addon-wrapping">
            </div>

            <button type="submit" class="btn btn-success mt-3">CREATE</button>
        </form>

    </div> <!-- /container -->
@endsection
