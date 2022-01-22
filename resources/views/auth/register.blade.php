@extends('master')

@section('title', 'REGISTER')

@section('main')
    <!--Main layout-->
    <div class="container mt-5">
        <!--Section: Content-->
        <section class="text-center h-100">

            <div class="row">
                <div class="col d-flex align-items-center" style="min-height: 70vh">
                    <form class="mx-auto w-50" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Name</span>
                            </div>
                            <input type="text" name="name" id="name" class="form-control" placeholder="First name" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Surname</span>
                            </div>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Last name" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Country</span>
                            </div>
                            <input type="text" name="country" id="country" class="form-control" placeholder="United Kingdom" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Birthday</span>
                            </div>
                            <input type="text" name="birthday" id="birthday" class="mask-birthday form-control" placeholder="dd.mm.yyyy" aria-describedby="addon-wrapping">
                        </div>

                        <script>
                            $('.mask-birthday').mask('99.99.9999', {placeholder: "dd.mm.yyyy" });
                        </script>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Time Zone UTC +/-</span>
                            </div>
                            <input type="text" name="locale" id="locale" class="mask-locale form-control" placeholder="+3" aria-describedby="addon-wrapping">
                        </div>


                        <script>
                            $.mask.definitions['~']='[+-]';
                            $('.mask-locale').mask('~9');
                        </script>


                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Email</span>
                            </div>
                            <input type="text" name="email" id="email" class="form-control" placeholder="email@mail.com" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Phone</span>
                            </div>
                            <input type="text" name="phone" id="phone" class="mask-phone form-control" placeholder="+44 123 456 7890" aria-describedby="addon-wrapping">
                        </div>

                        <script>
                            $('.mask-phone').mask('+99 999 999 9999');
                        </script>


                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Password</span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Minimum 8 symbols." aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Password confirm</span>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Minimum 8 symbols." aria-describedby="addon-wrapping">
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
