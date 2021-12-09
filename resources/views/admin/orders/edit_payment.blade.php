@extends('admin.master')

@section('title', 'EDIT PAYMENT STATUS')

@section('main')
    <div class="container">

        <h1>EDIT PAYMENT STATUS</h1>

        <h2>
            If the payment is confirmed, the operation cannot be canceled, only delete the existing order and create a new order!!!
        </h2>

        <form method="POST" enctype="multipart/form-data" action="{{ route('orders.update_payment', $order) }}">
            <div>
                @csrf

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="payment_status" id="flexSwitchCheckDefault2" @if($order->payment_status) checked disabled @endif >
                    <label class="form-check-label" for="flexSwitchCheckDefault2">PAYMENT STATUS</label>
                </div>

                @if(!$order->payment_status) <button type="submit" class="btn btn-success mt-3">EDIT</button> @endif

            </div>
        </form>

    </div> <!-- /container -->
@endsection
