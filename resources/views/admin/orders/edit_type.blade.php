@extends('admin.master')

@section('title', 'EDIT ORDER TYPE')

@section('main')
    <div class="container">

        <h1>EDIT ORDER TYPE</h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('orders.update_type', $order) }}">
            <div>
                @csrf

                <select name="type" id="type" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option @if($order->type == 1) selected @endif value="1">One month</option>
                    <option @if($order->type == 2) selected @endif value="2">Two months</option>
                    <option @if($order->type == 3) selected @endif value="3">Three months</option>
                </select>

                <button type="submit" class="btn btn-success mt-3">EDIT</button>

            </div>
        </form>

    </div> <!-- /container -->
@endsection
