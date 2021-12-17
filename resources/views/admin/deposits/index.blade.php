@extends('admin.master')

@section('title', 'DEPOSITS')

@section('main')
    <div class="container">

        <h1>DEPOSITS</h1>

        <hr>

                <div class="row d-flex justify-content-center">
                    <div class="col">

                            <h2>DEPOSITS LIST</h2>

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
                                @foreach($deposits as $deposit)

                                    <tr>
                                        <th scope="row">{{ $deposit->id }}</th>
                                        <th scope="row">{{ $deposit->user_id }}</th>
                                        <td>{{ $deposit->rate }}$</td>
                                        <td>{{ date("Y-m-d G:i:s", $deposit->time)  }}</td>
                                        <td>
                                            @if($deposit->status == 0) processing @else done @endif
                                        </td>
                                        <td scope="row">
                                            @if($deposit->payment_status == 0)
                                                NO
                                            @else()
                                                YES
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('deposits.show', $deposit) }}"><button type="button" class="btn btn-link">SHOW</button></a>

                                                @if($deposit->payment_status == 0)
                                                    <a href="{{ route('deposits.edit', $deposit) }}"><button type="button" class="btn btn-link">EDIT</button></a>
{{--                                                    <form id="delete-form" action="{{ route('fees.destroy', $fee) }}" method="POST">--}}
{{--                                                        @method('DELETE')--}}
{{--                                                        @csrf--}}
{{--                                                        <button type="submit" class="btn btn-link">DELETE</button>--}}
{{--                                                    </form>--}}
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
