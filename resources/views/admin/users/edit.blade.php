@extends('admin.master')

@section('title', 'EDIT')

@section('main')
    <div class="container">

        <hr>

        <h1>EDIT USER</h1>

        <hr>

        <form method="POST" enctype="multipart/form-data" action="{{ route('users.update', $user) }}">
            <div>
                @method('PUT')
                @csrf

                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Name</span>
                    </div>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Surname</span>
                    </div>
                    <input type="text" name="surname" id="surname" value="{{ $user->surname }}" class="form-control" placeholder="Surname" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Country</span>
                    </div>
                    <input type="text" name="country" id="country" value="{{ $user->country }}" class="form-control" placeholder="Country" aria-describedby="addon-wrapping">
                </div>

                <p class="text-start">Birthday</p>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Day</span>
                    </div>
                    <input type="text" name="birthday_day" id="birthday_day" value="{{ $user->birthday_day }}" class="form-control" placeholder="17.06.1992" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Month</span>
                    </div>
                    <input type="text" name="birthday_month" id="birthday_month" value="{{ $user->birthday_month }}" class="form-control" placeholder="17.06.1992" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Year</span>
                    </div>
                    <input type="text" name="birthday_year" id="birthday_year" value="{{ $user->birthday_year }}" class="form-control" placeholder="17.06.1992" aria-describedby="addon-wrapping">
                </div>

{{--                <div class="input-group flex-nowrap mb-3">--}}
{{--                    <div class="input-group-prepend">--}}
{{--                        <span class="input-group-text" id="addon-wrapping">Time Zone</span>--}}
{{--                    </div>--}}
{{--                    <input type="text" name="locale" id="locale" value="{{ $user->locale }}" class="form-control" placeholder="UTC +3" aria-describedby="addon-wrapping">--}}
{{--                </div>--}}

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Email</span>
                    </div>
                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="Enter email" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Phone</span>
                    </div>
                    <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control" placeholder="+380634139684" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">New password</span>
                    </div>
                    <input type="text" name="password" id="password" class="form-control" placeholder="Enter password" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Check</span>
                    </div>
                    <input type="text" name="check" id="check" value="{{ $user->check }}" class="form-control" placeholder="500" aria-describedby="addon-wrapping">
                </div>

                <button type="submit" class="btn btn-success mt-3">EDIT</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
