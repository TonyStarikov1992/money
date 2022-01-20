@extends('user.master')

@section('title', 'Settings')

@section('main')
    <div class="container">

        <hr>

        <h1>EDIT USER</h1>

        <hr>

        <form method="POST" enctype="multipart/form-data" action="{{ route('setting.update', $user) }}">
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
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" placeholder="{{ $user->name }}" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Surname</span>
                    </div>
                    <input type="text" name="surname" id="surname" value="{{ $user->surname }}" class="form-control" placeholder="{{ $user->surname }}" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Country</span>
                    </div>
                    <input type="text" name="country" id="country" value="{{ $user->country }}" class="form-control" placeholder="{{ $user->country }}" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Birthday</span>
                    </div>
                    <input type="text" name="birthday" id="birthday" value="{{ $user->birthday }}" class="form-control" placeholder="{{ $user->birthday }}" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Time Zone</span>
                    </div>
                    <input type="text" name="locale" id="locale" value="{{ $user->locale }}" class="form-control" placeholder="{{ $user->locale }}" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Email</span>
                    </div>
                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="{{ $user->email }}" aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Phone</span>
                    </div>
                    <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control" placeholder="{{ $user->phone }}" aria-describedby="addon-wrapping">
                </div>

                <button type="submit" class="btn btn-success mt-3">EDIT</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
