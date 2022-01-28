@extends('user.master')

@section('title', 'DEPOSITS')

@section('main')
    <div class="container">

        <div class="row">

            <div class="col-6 ">

                <p class="text-center">TO MAKE A DEPOSIT BY CREDIT CARD, PLEASE FEEL THE CARD INFO BELOW.</p>

                <div class="card">
                    <div class="card-header">
                        <strong>Credit Card</strong>
                        <small>enter your card details</small>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name on Card</label>
                                    <input class="form-control" id="name" type="text" placeholder="Enter your name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="ccnumber">Credit Card Number</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="0000 0000 0000 0000" autocomplete="email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="ccmonth">Month</label>
                                <select class="form-control" id="ccmonth">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="ccyear">Year</label>
                                <select class="form-control" id="ccyear">
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                    <option>2028</option>
                                    <option>2029</option>
                                    <option>2030</option>
                                    <option>2031</option>
                                    <option>2032</option>
                                    <option>2033</option>
                                    <option>2034</option>
                                    <option>2035</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cvv">CVV/CVC</label>
                                    <input class="form-control" id="cvv" type="text" placeholder="123">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 w-50">
                                    <div class="form-group">
                                        <label for="ccnumber">Deposit</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" placeholder="500">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success">Continue</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>

            </div>

            <div class="col-6">
                <p class="text-center">TO MAKE A DEPOSIT IN CRYPTO, PLEASE SCAN QR CODE OR COPY THE WALLET BELOW AND CONNECT TO SUPPORT, TO CONFIRM YOUR PAYMENT.</p>

                <p class="text-center">
                    <img src="/images/qr.png" class="img-fluid w-50 mx-auto text-center" alt="image1" loading="lazy">
                </p>

                <p class="text-center">
                    CRYPTO WALLET
                </p>


                <input class="form-control w-75 mx-auto mb-3" type="text" value="bc1qhvze5wadwdrmcjy4nqdd6mfnyzy7ar9jhs300d" id="myInput">

                <p class="text-center">
                    <button onclick="myFunction()" type="button" class="btn btn-primary">COPY CRYPTO WALLET</button>
                </p>

                <script>
                    function myFunction() {
                        /* Get the text field */
                        var copyText = document.getElementById("myInput");

                        /* Select the text field */
                        copyText.select();
                        copyText.setSelectionRange(0, 99999); /* For mobile devices */

                        /* Copy the text inside the text field */
                        navigator.clipboard.writeText(copyText.value);
                    }
                </script>




            </div>

{{--            <div class="col">--}}

{{--                <h2>DEPOSITS LIST</h2>--}}

{{--                @if(count($deposits) != 0)--}}

{{--                    <table class="table">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th scope="col">Deposit id</th>--}}
{{--                            <th scope="col">Rate</th>--}}
{{--                            <th scope="col">Time</th>--}}
{{--                            <th scope="col">Status</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}

{{--                        <tbody>--}}

{{--                        @foreach($deposits as $deposit)--}}

{{--                            <tr>--}}
{{--                                <th scope="row">{{ $deposit->id }}</th>--}}
{{--                                <td>{{ $deposit->rate }}$</td>--}}
{{--                                <td>{{ date("Y-m-d G:i:s", $deposit->time)  }}</td>--}}
{{--                                <td>--}}
{{--                                    @if($deposit->status == 0) processing @else done @endif--}}
{{--                                </td>--}}
{{--                            </tr>--}}

{{--                        @endforeach--}}

{{--                        </tbody>--}}
{{--                    </table>--}}

{{--                @else--}}

{{--                    <h2>YOU HAVE NO DEPOSITS YET</h2>--}}

{{--                @endif--}}

{{--                <a class="btn btn-success" type="button" href="{{ route('deposit.create') }}">MAKE DEPOSIT</a>--}}

{{--            </div>--}}

        </div>
    </div> <!-- /container -->
@endsection
