@extends('user.master')

@section('title', 'SESSIONS')

@section('main')
    <div class="container">

        @if ($message = Session::get('message'))

            <div class="alert alert-success alert-block">

                <strong>{{ $message }}</strong>

            </div>

        @endif

        <h1>SESSIONS</h1>

        <hr>

                <div class="row d-flex justify-content-center">
                    <div class="col-12">

                        @if($session_stop_time)
                            <h3>Current session stop time: {{ date("Y-m-d H:i:s", $session_stop_time) }}</h3>
                            <h3>Current session start rate: {{ $session->start_rate }}$</h3>
                            <h3>Current session rate: {{ $session->rate }}$</h3>

                            <form action="{{ route('sessions.destroy', $session)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    STOP
                                </button>
                            </form>

                        <section class="my-3">
                            <h2>Current session deals:</h2>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Ticker</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Start time</th>
                                        <th scope="col">Stop time</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Deal id</th>
                                        <th scope="col">Bonus</th>
                                    </tr>
                                </thead>

                                <tbody>

                                @foreach($session->deals as $deal)

                                    @if($deal->status == 1)

                                        <tr>
                                            <th scope="row">{{ $deal->ticker }}</th>
                                            <td>{{ $deal->sell_or_buy }}</td>
                                            <td>{{ date("Y-m-d H:i:s", $deal->start_time) }}</td>
                                            <td>{{ date("Y-m-d H:i:s", $deal->stop_time) }}</td>
                                            <td>{{ $deal->duration_min }} min</td>
                                            <td>{{ $deal->id }}</td>
                                            <td>{{ $deal->bonus }}$</td>
                                        </tr>

                                    @endif

                                @endforeach

                                </tbody>

                            </table>
                        </section>


                        @endif

                        @if(!$current_session_id and $user->check > 0)
                            <p>Money: {{ $user->check }} $</p>
                            <form action="{{ route('sessions.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Rate</label>
                                    <input name="rate" type="text" class="form-control" id="exampleFormControlInput1" placeholder="min rate 200$, max rate {{ $user->check }}$">
                                </div>

                                <div class="mb-3">
                                    <label for="hour" class="form-label">Hours</label>
                                    <select name="hour" id="hour" class="mb-3 form-select" aria-label="Default select example">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>

                                <p class="mb-3">
                                    By default, session will start with all tickers. Unchoose the tickers, you dont want to trade.
                                </p>


                                <div class="row">

                                    @foreach($allTickers as $ticker)

                                        <div class="col-2">

                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="tickers[]" value="{{ $ticker }}" id="{{ $ticker }}" checked>
                                                <label class="form-check-label" for="{{ $ticker }}">
                                                    {{ $ticker }}
                                                </label>
                                            </div>

                                        </div>

                                    @endforeach


                                </div>

                                <button type="submit" class="my-3 btn btn-primary">
                                    START
                                </button>

                            </form>
                        @endif

                    </div>

                </div>
    </div> <!-- /container -->
@endsection
