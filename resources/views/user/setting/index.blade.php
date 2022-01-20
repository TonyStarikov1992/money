@extends('user.master')

@section('title', 'SETTINGS')

@section('main')
    <div class="container">

        <h2>
            IF YOU WILL CHANGE ANY SETTING, YOU CAN NOT MAKE ANY WITHDRAWALS NEXT 3 DAYS!!!
        </h2>

        <form method="POST" action="{{ route('setting.update', $user) }}">
            @method('PUT')
            @csrf

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Name</span>
                </div>
                <input value="{{ $user->name }}" type="text" name="name" id="name" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Surname</span>
                </div>
                <input value="{{ $user->surname }}" type="text" name="surname" id="surname" class="form-control" placeholder="Surname" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Country</span>
                </div>
                <input value="{{ $user->country }}" type="text" name="country" id="country" class="form-control" placeholder="Country" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Birthday</span>
                </div>
                <input value="{{ $user->birthday }}" type="text" name="birthday" id="birthday" class="form-control" placeholder="17.06.1992" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Time Zone</span>
                </div>
                <input value="{{ $user->locale }}" type="text" name="locale" id="locale" class="form-control" placeholder="UTC +3" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Email</span>
                </div>
                <input value="{{ $user->email }}" type="text" name="email" id="email" class="form-control" placeholder="Enter email" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Phone</span>
                </div>
                <input value="{{ $user->phone }}" type="text" name="phone" id="phone" class="form-control" placeholder="+380634139684" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">NEW Password</span>
                </div>
                <input type="text" name="password" id="password" class="form-control" placeholder="Enter password" aria-describedby="addon-wrapping">
            </div>


            <button type="submit" class="btn btn-success mt-3">EDIT</button>
        </form>

    </div> <!-- /container -->
@endsection
