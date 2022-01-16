@extends('master')

@section('title', 'LOGIN')

@section('main')
    <!--Main layout-->
        <div class="container mt-5">
            <!--Section: Content-->
            <section class="text-center h-100">

                <div class="row">
                    <div class="col d-flex align-items-center" style="min-height: 70vh">
                        <form class="mx-auto w-50" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="input-group flex-nowrap mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Email</span>
                                </div>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter email" aria-describedby="addon-wrapping">
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Password</span>
                                </div>
                                <input name="password" type="password" id="password" class="form-control" placeholder="Enter password" aria-describedby="addon-wrapping">
                            </div>

                            <button type="submit" class="btn btn-primary m-3">Submit</button>
                        </form>
                    </div>
                </div>

            </section>

        </div>
    <!--Main layout-->
@endsection
