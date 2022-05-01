@extends('master')

@section('title', 'LOGIN')

@section('main')
    <!--Main layout-->
        <div class="container mt-5">
            <!--Section: Content-->
            <section class="text-center h-100">

                @if ($errors->any())
                    <div class="alert alert-danger text-start">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-5 mx-auto" style="min-height: 70vh">
                        <form class="text-start" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="email@mail.com" pattern="(.+)@(.+)" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Minimum 8 symbols" minlength="4" required>
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                {!! NoCaptcha::display() !!}
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary m-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>

            </section>

        </div>
    <!--Main layout-->
@endsection

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush
