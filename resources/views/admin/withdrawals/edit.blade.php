@extends('admin.master')

@section('title', 'EDIT DEPOSIT PAYMENT STATUS')

@section('main')
    <div class="container">

        <h1>EDIT DEPOSIT PAYMENT STATUS</h1>

        <hr>

        <form method="POST" action="{{ route('deposits.update', $deposit) }}">
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
                FEE RATE: {{ $deposit->rate }}$
            </h4>

            <h4>
                FEE TIME: {{ date("Y-m-d G:i:s", $deposit->time)  }}
            </h4>

            <h4>
                If the payment is confirmed, the operation cannot be canceled!!!
            </h4>

            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="payment_status" id="flexSwitchCheckDefault2">
                <label class="form-check-label" for="flexSwitchCheckDefault2">PAYMENT STATUS</label>
            </div>

            <button type="submit" class="btn btn-success mt-3">EDIT</button>
        </form>

    </div> <!-- /container -->
@endsection
