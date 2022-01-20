@extends('user.master')

@section('title', 'WITHDRAWALS')

@section('main')
    <div class="container">

        <div class="row d-flex justify-content-center">

            <div class="col">

                <h2>WITHDRAWALS LIST</h2>

                @if(count($withdrawals) != 0)

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

                @else

                    <h2>YOU HAVE NO WITHDRAWALS YET</h2>

                @endif

                @if((Auth::user()->settings_update_time - time()) >= 0)
                    <h2>YOU CHANGE YOUR SETTINGS {{ date("Y-m-d H:i:s", Auth::user()->settings_update_time) }}, YOU CAN NOT MAKE NEW WITHDRAWAL NEXT 3 DAYS AFTER CHANGING ANY SETTING!!!</h2>
                @else
                    <a class="btn btn-success" type="button" href="{{ route('withdrawal.create') }}">MAKE WITHDRAWAL</a>
                @endif



            </div>

        </div>
    </div> <!-- /container -->
@endsection
