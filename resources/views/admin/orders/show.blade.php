@extends('admin.master')

@section('title', 'SHOW THE ORDER')

@section('main')
    <div class="container">

        <h1>SHOW THE ORDER</h1>

        <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">ID</span>
            </div>
            <input type="text" value="{{ $order->id }}" class="form-control" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Name</span>
            </div>
            <input type="text" name="name" id="name" value="{{ $order->user->name }}" class="form-control" placeholder="REQUIRED" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Surname</span>
            </div>
            <input type="text" name="surname" id="surname" value="{{ $order->user->surname }}" class="form-control" placeholder="Surname" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Email</span>
            </div>
            <input type="text" name="email" id="email" value="{{ $order->user->email }}" class="form-control" placeholder="Enter email" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Phone</span>
            </div>
            <input type="text" name="phone" id="phone" value="{{ $order->user->phone }}" class="form-control" placeholder="+380634139684" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">TYPE</span>
            </div>
            <input type="text" value="{{ $order->type }} month(s)" class="form-control" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">EXPIRES DATE</span>
            </div>
            <input type="text" value="{{ date('d-m-Y', $order->expires_time) }}" class="form-control" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">ADMIN STATUS</span>
            </div>
            <input type="text" value="{{ $result = $order->admin_status == 0 ? 'no' : 'yes'  }}" class="form-control" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">PAYMENT STATUS</span>
            </div>
            <input type="text" value="{{ $result = $order->payment_status == 0 ? 'no' : 'yes'  }}" class="form-control" aria-describedby="addon-wrapping">
        </div>

    </div> <!-- /container -->
@endsection
