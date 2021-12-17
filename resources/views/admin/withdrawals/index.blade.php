@extends('admin.master')

@section('title', 'WITHDRAWALS')

@section('main')
    <div class="container">

        <h1>WITHDRAWALS</h1>

        <hr>

                <div class="row d-flex justify-content-center">
                    <div class="col">

                            <h2>WITHDRAWALS LIST</h2>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">User id</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Payment status</th>
                                        <th scope="col">Functions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($withdrawals as $withdrawal)

                                    <tr>
                                        <th scope="row">{{ $withdrawal->id }}</th>
                                        <th scope="row">{{ $withdrawal->user_id }}</th>
                                        <td>{{ $withdrawal->rate }}$</td>
                                        <td>{{ date("Y-m-d G:i:s", $withdrawal->time)  }}</td>
                                        <td>
                                            @if($withdrawal->status == 0) processing @else done @endif
                                        </td>
                                        <td scope="row">
                                            @if($withdrawal->payment_status == 0)
                                                NO
                                            @else()
                                                YES
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('withdrawals.show', $withdrawal) }}"><button type="button" class="btn btn-link">SHOW</button></a>
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
