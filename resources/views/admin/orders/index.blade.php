@extends('admin.master')

@section('title', 'ADMIN-USERS')

@section('main')
    <div class="container">

        <h1>ANALYTICS ORDERS</h1>
        <a class="btn btn-success" type="button" href="#">ADD ORDER</a>

        <hr>

        <div class="row ">

                <div class="col-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User id</th>
                                <th scope="col">Order type</th>
                                <th scope="col">Expires date</th>
                                <th scope="col">Admin confirmation</th>
                                <th scope="col">Payment status</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td scope="row">{{ $order->user_id }}</td>
                                <td scope="row">{{ $order->type }} month(s)</td>
                                <td scope="row">{{ date('d-m-Y', $order->expires_time) }}</td>
                                <td scope="row">{{ $result = $order->admin_status == 0 ? 'no' : 'yes'  }}</td>
                                <td scope="row">{{ $result = $order->payment_status == 0 ? 'no' : 'yes'  }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
        </div>
    </div> <!-- /container -->
@endsection
