@extends('master')

@section('title', 'Commissions')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col text-start">
                <h1>Commissions</h1>

                <h2>Deposit and withdraw fees</h2>

                <div class="row p-5">

                    <div class="col">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">CURRENCY</th>
                                    <th scope="col">DEPOSIT FEE</th>
                                    <th scope="col">WITHDRAW FEE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">USD</th>
                                    <td>FREE</td>
                                    <td>1.2%</td>
                                </tr>
                                <tr>
                                    <th scope="row">EUR</th>
                                    <td>FREE</td>
                                    <td>1.5%</td>
                                </tr>
                                <tr>
                                    <th scope="row">BTC</th>
                                    <td>FREE</td>
                                    <td>0.0002 BTC</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /container -->
@endsection
