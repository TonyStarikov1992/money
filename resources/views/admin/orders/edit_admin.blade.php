@extends('admin.master')

@section('title', 'EDIT ADMIN STATUS')

@section('main')
    <div class="container">

        <h1>EDIT ADMIN STATUS</h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('orders.update_admin', $order) }}">
            <div>
                @csrf

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="admin_status" id="flexSwitchCheckDefault1" @if($order->admin_status) checked @endif >
                    <label class="form-check-label" for="flexSwitchCheckDefault1">ADMIN STATUS</label>
                </div>

                <button type="submit" class="btn btn-success mt-3">EDIT</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
