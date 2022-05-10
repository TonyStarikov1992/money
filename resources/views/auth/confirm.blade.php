@extends('master')

@section('title', 'CONFIRM EMAIL')

@section('main')
    <!--Main layout-->
        <div class="container mt-5">

            @if ($message = Session::get('message'))

                <div class="alert alert-success alert-block">

                    <strong>{{ $message }}</strong>

                </div>

            @endif
            <!--Section: Content-->
            <section class="text-center h-100">

{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger text-start">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}

                <div class="row">
                    <div class="col-lg-5 mx-auto" style="min-height: 70vh">
                        <form class="text-start" method="POST" action="{{ route('confirmCheck') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="confirm_code" class="form-label">Confirm code</label>
                                <input type="password" name="confirm_code" id="confirm_code" class="form-control" minlength="4" required>
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary m-3">Confirm</button>
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
