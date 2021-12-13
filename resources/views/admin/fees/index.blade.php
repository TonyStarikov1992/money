@extends('admin.master')

@section('title', 'PAYMENT REQUESTS')

@section('main')
    <div class="container">

        <h1>PAYMENT REQUESTS</h1>

        <hr>

                <div class="row d-flex justify-content-center">
                    <div class="col">

                            <h2>REQUESTS LIST</h2>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Request id</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Get / Pay</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Payment status</th>
                                        <th scope="col">Functions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($fees as $fee)

                                    <tr>
                                        <th scope="row">{{ $fee->id }}</th>
                                        <td>{{ $fee->rate }}$</td>
                                        <td>{{ $fee->type }}</td>
                                        <td>{{ date("Y-m-d G:i:s", $fee->time)  }}</td>
                                        <td>
                                            @if($fee->status == 0) processing @else done @endif
                                        </td>
                                        <td scope="row">
                                            @if($fee->payment_status == 0)
                                                <a href="{{ route('fees.edit_payment', $fee) }}">
                                                    <button type="button" class="btn btn-link">NO</button>
                                                </a>
                                            @else()
                                                YES
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('fees.show', $fee) }}"><button type="button" class="btn btn-link">SHOW</button></a>

                                                @if($fee->payment_status == 0)
                                                    <a href="{{ route('fees.edit', $fee) }}"><button type="button" class="btn btn-link">EDIT</button></a>
                                                    <form id="delete-form" action="{{ route('fees.destroy', $fee) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-link">DELETE</button>
                                                    </form>
                                                @endif

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
