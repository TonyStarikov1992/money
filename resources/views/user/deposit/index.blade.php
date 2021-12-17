@extends('user.master')

@section('title', 'DEPOSITS')

@section('main')
    <div class="container">

        <h1>DEPOSITS</h1>

        <a class="btn btn-success" type="button" href="{{ route('deposits.create') }}">MAKE DEPOSIT</a>

        <hr>

        <div class="row d-flex justify-content-center">

            <div class="col">

                <h2>DEPOSITS LIST</h2>

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
                    @foreach($deposits as $deposit)

                        <tr>
                            <th scope="row">{{ $deposit->id }}</th>
                            <td>{{ $deposit->rate }}$</td>
                            <td>{{ date("Y-m-d G:i:s", $deposit->time)  }}</td>
                            <td>
                                @if($deposit->status == 0) processing @else done @endif
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>


            </div>

        </div>
    </div> <!-- /container -->
@endsection
