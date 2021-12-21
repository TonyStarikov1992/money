@extends('user.master')

@section('title', 'WITHDRAWALS')

@section('main')
    <div class="container">

        <div class="row d-flex justify-content-center">

            <div class="col">

                <h2>WITHDRAWALS LIST</h2>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Payment id</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($withdrawals as $withdrawal)

                        <tr>
                            <th scope="row">{{ $withdrawal->id }}</th>
                            <td>{{ $withdrawal->rate }}$</td>
                            <td>{{ date("Y-m-d G:i:s", $withdrawal->time)  }}</td>
                            <td>
                                @if($withdrawal->status == 0) processing @else done @endif
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

                <a class="btn btn-success" type="button" href="{{ route('withdrawal.create') }}">MAKE WITHDRAWAL</a>


            </div>

        </div>
    </div> <!-- /container -->
@endsection
