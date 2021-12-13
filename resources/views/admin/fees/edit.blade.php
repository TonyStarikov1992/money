@extends('admin.master')

@section('title', 'EDIT REQUEST')

@section('main')
    <div class="container">

        <h1>EDIT REQUEST</h1>

        <hr>

        <form method="POST" action="{{ route('fees.update', $fee) }}">
            @method('PUT')
            @csrf

            <h4>
                USER NAME: {{ $user->name }}
            </h4>

            <h4>
                USER SURNAME: {{ $user->surname }}
            </h4>

            <h4>
                USER ID: {{ $user->id }}
            </h4>

            <h4>
                FEE TIME: {{ date("Y-m-d G:i:s", $fee->time)  }}
            </h4>

            <div class="mb-3">
                <label for="type" class="form-label">REQUEST TYPE</label>
                <select name="type" id="type" class="mb-3 form-select">
                    <option @if($fee->type == 'get') selected @endif value="get">GET MONEY</option>
                    <option @if($fee->type == 'pay') selected @endif value="pay">PAY MONEY</option>
                </select>
            </div>

            <div class="input-group flex-nowrap mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">RATE</span>
                </div>
                <input type="text" name="rate" id="rate" class="form-control" value="{{ $fee->rate }}" aria-describedby="addon-wrapping">
            </div>

{{--            <h4>--}}
{{--                If the payment is confirmed, the operation cannot be canceled!!!--}}
{{--            </h4>--}}

{{--            <div class="form-check form-switch">--}}
{{--                <input class="form-check-input" type="checkbox" name="payment_status" id="flexSwitchCheckDefault2" @if($fee->payment_status) checked @endif >--}}
{{--                <label class="form-check-label" for="flexSwitchCheckDefault2">PAYMENT STATUS</label>--}}
{{--            </div>--}}

{{--            <div class="form-check form-switch">--}}
{{--                <input class="form-check-input" type="checkbox" name="admin_status" id="flexSwitchCheckDefault1" @if($fee->admin_status) checked @endif >--}}
{{--                <label class="form-check-label" for="flexSwitchCheckDefault1">ADMIN STATUS</label>--}}
{{--            </div>--}}

            <button type="submit" class="btn btn-success mt-3">EDIT</button>
        </form>

    </div> <!-- /container -->
@endsection
