@extends('admin.master')

@section('title', 'EDIT REQUEST PAYMENT STATUS')

@section('main')
    <div class="container">

        <h1>EDIT REQUEST PAYMENT STATUS</h1>

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
                FEE RATE: {{ $fee->rate }}$
            </h4>

            <h4>
                FEE TIME: {{ date("Y-m-d G:i:s", $fee->time)  }}
            </h4>

            <h4>
                If the payment is confirmed, the operation cannot be canceled!!!
            </h4>

            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="payment_status" id="flexSwitchCheckDefault2" @if($fee->payment_status) checked @endif >
                <label class="form-check-label" for="flexSwitchCheckDefault2">PAYMENT STATUS</label>
            </div>

            <button type="submit" class="btn btn-success mt-3">EDIT</button>
        </form>

    </div> <!-- /container -->
@endsection
