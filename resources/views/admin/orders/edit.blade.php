@extends('admin.master')

@section('title', 'EXPIRES DATE')

@section('main')
    <div class="container">

        <h1>EDIT EXPIRES DATE</h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('orders.update', $order) }}">
            <div>
                @method('PUT')
                @csrf

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">EXPIRES DATE</span>
                    </div>
                    <input type="text" name="expires_time" id="expires_time" value="{{ date('d-m-Y', $order->expires_time) }}" class="form-control" aria-describedby="addon-wrapping">
                </div>

                <button type="submit" class="btn btn-success mt-3">EDIT</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
