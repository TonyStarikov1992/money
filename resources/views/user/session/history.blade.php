@extends('user.master')

@section('title', 'SESSIONS HISTORY')

@section('main')
    <div class="container">



        <h1>SESSIONS HISTORY</h1>

        <hr>

                <div class="row d-flex justify-content-center">
                    <div class="col-12">

                            @if(count($sessions) <= 0)
                                <h2>YOUR SESSIONS LIST IS EMPTY</h2>
                            @else
                                <h2>SESSIONS LIST</h2>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Session id</th>
                                        <th scope="col">Start time</th>
                                        <th scope="col">Stop time</th>
                                        <th scope="col">Start rate</th>
                                        <th scope="col">Stop rate</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($sessions as $session)

                                        @if($session->id != $user->current_session_id )

                                            <tr>
                                                <th scope="row">{{ $session->id }}</th>
                                                <td>{{ date("Y-m-d G:i:s", $session->start_time)  }}</td>
                                                <td>{{ date("Y-m-d G:i:s", $session->stop_time)  }}</td>
                                                <td>{{ $session->start_rate }}$</td>
                                                <td>{{ $session->stop_rate }}$</td>
                                                <td><a href="{{ route('sessions.show', $session) }}"><button type="button" class="btn btn-link">SHOW</button></a></td>
                                            </tr>
                                        @endif

                                    @endforeach

                                    </tbody>
                                </table>

                            @endif


                    </div>

                </div>
    </div> <!-- /container -->
@endsection
