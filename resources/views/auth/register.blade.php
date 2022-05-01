@extends('master')

@section('title', 'REGISTER')

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
                    <form class="text-start" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="First name" minlength="2" required>
                        </div>

                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Last name" minlength="2" required>
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" id="country" class="form-select">
                                <option value="" selected>Choose your country...</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label class="form-label">Birthday</label>

                        <div class="input-group date mb-3" id="datepicker">
                            <input type="text" name="birthday" id="date" class="form-control"/>
                            <span class="input-group-append">
                              <span class="input-group-text bg-light d-block">
                                <i class="fa fa-calendar"></i>
                              </span>
                            </span>
                        </div>

                        <script>
                            $(function(){
                                $('#datepicker').datepicker({
                                    format: "dd-mm-yyyy",
                                    autoclose: true
                                });
                            });
                        </script>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="email@mail.com" pattern="(.+)@(.+)" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control mask-phone" placeholder="+441234567890" pattern="+(.+)" minlength="10" maxlength="18" required>
                        </div>

                        <script>
                            $('.mask-phone').mask('+999999999999');
                        </script>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Minimum 8 symbols" minlength="8" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password confirm</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Minimum 8 symbols" minlength="8" required>
                        </div>

                        <div class="mb-3">
                            <label for="secret_code" class="form-label">Secret code</label>
                            <input type="password" name="secret_code" id="secret_code" class="form-control" placeholder="Enter your secret code if you have"  minlength="8" >
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            {!! NoCaptcha::display() !!}
                        </div>

                        <div class="form-check text-start">
                            <input class="form-check-input" name="agreement" type="checkbox" value="1" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                <a href="{{ route('agreement') }}">USER AGREEMENT</a>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary m-3">Submit</button>
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
