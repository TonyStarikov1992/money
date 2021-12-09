@extends('admin.master')

@section('title', 'ADMIN-ORDERS')

@section('main')
    <div class="container">

        <h1>ANALYTICS ORDERS</h1>
        <a class="btn btn-success" type="button" href="#">ADD ORDER</a>

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
                                <th scope="col">Functions</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>

                                <td scope="row">{{ $order->user->name }} {{ $order->user->surname }}</td>

                                <td scope="row">
                                    @if($order->payment_status == 0)
                                        <a href="{{ route('orders.edit_type', $order) }}">
                                            <button type="button" class="btn btn-link">{{ $order->type }} month(s)</button>
                                        </a>
                                    @else()
                                        {{ $order->type }} month(s)
                                    @endif
                                </td>

                                <td scope="row">
                                    {{ date('d-m-Y', $order->expires_time) }}
                                </td>

                                <td scope="row">
                                    @if($order->admin_status == 0)
                                        <a href="{{ route('orders.edit_admin', $order) }}">
                                            <button type="button" class="btn btn-link">NO</button>
                                        </a>
                                    @else()
                                        <a href="{{ route('orders.edit_admin', $order) }}">
                                            <button type="button" class="btn btn-link">YES</button>
                                        </a>
                                    @endif
                                </td>

                                <td scope="row">
                                    @if($order->payment_status == 0)
                                        <a href="{{ route('orders.edit_payment', $order) }}">
                                            <button type="button" class="btn btn-link">NO</button>
                                        </a>
                                    @else()
                                        YES
                                    @endif
                                </td>

                                <td>
                                    <div class="btn-group">
{{--                                        <a href="{{ route('orders.edit', $order) }}"><button type="button" class="btn btn-link">EDIT</button></a>--}}
                                        <a href="{{ route('orders.show', $order) }}"><button type="button" class="btn btn-link">SHOW</button></a>
                                        <form id="delete-form" action="{{ route('orders.destroy', $order) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-link">DELETE</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
        </div>
    </div> <!-- /container -->
@endsection
