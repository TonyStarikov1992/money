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
                <div class="col d-flex align-items-center" style="min-height: 70vh">
                    <form class="mx-auto w-50" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Name</span>
                            </div>
                            <input type="text" name="name" id="name" class="form-control" placeholder="First name" minlength="2" required aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Surname</span>
                            </div>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Last name" minlength="2" required aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Country</label>
                            <select name="country" id="country" class="form-select" id="inputGroupSelect01">
                                <option value="" selected>Choose your country...</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>

                        <p class="text-start">Birthday</p>

                        <div class="input-group mb-3 w-50">
                            <label class="input-group-text" for="inputGroupSelect01">Day</label>
                            <select name="birthday_day" id="birthday_day" class="form-select" id="inputGroupSelect01">
                                @for($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="input-group mb-3 w-50">
                            <label class="input-group-text" for="inputGroupSelect01">Month</label>
                            <select name="birthday_month" id="birthday_month" class="form-select" id="inputGroupSelect01">
                                @foreach($months as $month_key => $month_value)
                                    <option value="{{ $month_key }}">{{ $month_value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3 w-50">
                            <label class="input-group-text" for="inputGroupSelect01">Year</label>
                            <select name="birthday_year" id="birthday_year" class="form-select" id="inputGroupSelect01">
                                @for($i = (date("Y") - 18); $i >= 1940; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>


{{--                        <div class="input-group flex-nowrap mb-3">--}}
{{--                            <div class="input-group-prepend">--}}
{{--                                <span class="input-group-text" id="addon-wrapping">Time Zone UTC +/-</span>--}}
{{--                            </div>--}}
{{--                            <input type="text" name="locale" id="locale" class="mask-locale form-control" placeholder="+3" aria-describedby="addon-wrapping">--}}
{{--                        </div>--}}


{{--                        <script>--}}
{{--                            $.mask.definitions['~']='[+-]';--}}
{{--                            $('.mask-locale').mask('~9');--}}
{{--                        </script>--}}


                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Email</span>
                            </div>
                            <input type="text" name="email" id="email" class="form-control" placeholder="email@mail.com" pattern="(.+)@(.+)" required aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Phone</span>
                            </div>
                            <input type="text" name="phone" id="phone" class="form-control mask-phone" placeholder="+441234567890" pattern="+(.+)" minlength="10" maxlength="18" required aria-describedby="addon-wrapping">
                        </div>

                        <script>
                            $('.mask-phone').mask('+999999999999');
                        </script>


                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Password</span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Minimum 8 symbols." minlength="8" required aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Password confirm</span>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Minimum 8 symbols." minlength="8" required aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Special code</span>
                            </div>
                            <input type="text" name="special_code" id="special_code" class="form-control" placeholder="Special code" aria-describedby="addon-wrapping">
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
