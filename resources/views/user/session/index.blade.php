@extends('user.master')

@section('title', 'SESSIONS')

@section('main')
    <div class="container">

        <h1>SESSIONS</h1>

        <hr>

                <div class="row d-flex justify-content-center">
                    <div class="col-12">

                        @if($session_stop_time)
                            <h3>Current session stop time: {{ date("Y-m-d H:i:s", $session_stop_time)  }}</h3>

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
                                            <td>@if($deal->start_time){{ date("Y-m-d H:i:s", $deal->start_time)  }}@endif</td>
                                            <td>@if($deal->time){{ date("Y-m-d H:i:s", $deal->stop_time)  }}@endif</td>
                                            <td>@if($deal->duration_min){{ $deal->duration_min }} min @endif</td>
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
                                    Choose the tickers, with you dont want to trade.
                                </p>


                                <div class="row">

                                    <div class="col">

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="BTC" id="BTC">
                                            <label class="form-check-label" for="BTC">
                                                BTC
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="SHIB" id="SHIB">
                                            <label class="form-check-label" for="SHIB">
                                                SHIB
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="ETH" id="ETH">
                                            <label class="form-check-label" for="ETH">
                                                ETH
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="DOGE" id="DOGE">
                                            <label class="form-check-label" for="DOGE">
                                                DOGE
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="XRP" id="XRP">
                                            <label class="form-check-label" for="XRP">
                                                XRP
                                            </label>
                                        </div>

                                    </div>

                                    <div class="col">

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="MATIC" id="MATIC">
                                            <label class="form-check-label" for="MATIC">
                                                MATIC
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="ADA" id="ADA">
                                            <label class="form-check-label" for="ADA">
                                                ADA
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="SOL" id="SOL">
                                            <label class="form-check-label" for="SOL">
                                                SOL
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="DATA" id="DATA">
                                            <label class="form-check-label" for="DATA">
                                                DATA
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="BNB" id="BNB">
                                            <label class="form-check-label" for="BNB">
                                                BNB
                                            </label>
                                        </div>

                                    </div>

                                    <div class="col">

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="BTTN" id="BTTN">
                                            <label class="form-check-label" for="BTTN">
                                                BTTN
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="PZM" id="PZM">
                                            <label class="form-check-label" for="PZM">
                                                PZM
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="pDOTn" id="pDOTn">
                                            <label class="form-check-label" for="pDOTn">
                                                pDOTn
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="XLM" id="XLM">
                                            <label class="form-check-label" for="XLM">
                                                XLM
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="TRX" id="TRX">
                                            <label class="form-check-label" for="TRX">
                                                TRX
                                            </label>
                                        </div>

                                    </div>

                                    <div class="col">

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="HT" id="HT">
                                            <label class="form-check-label" for="HT">
                                                HT
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="DOT" id="DOT">
                                            <label class="form-check-label" for="DOT">
                                                DOT
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="LINK" id="LINK">
                                            <label class="form-check-label" for="LINK">
                                                LINK
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="BCH" id="BCH">
                                            <label class="form-check-label" for="BCH">
                                                BCH
                                            </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="tickers[]" value="LTC" id="LTC">
                                            <label class="form-check-label" for="LTC">
                                                LTC
                                            </label>
                                        </div>

                                    </div>

                                </div>

                                <button type="submit" class="my-3 btn btn-primary">
                                    START
                                </button>
                                @csrf
                            </form>
                        @endif



                            <h2>SESSIONS LIST</h2>

                            @if(count($sessions) <= 0)
                                <h2>YOUR SESSIONS LIST IS EMPTY</h2>
                            @else

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
