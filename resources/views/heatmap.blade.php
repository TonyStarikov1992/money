@extends('master')

@section('title', 'About Us')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col text-start">
                <h1>Crypto Heatmap</h1>

                <div class="row">
                    <div class="col">
                        <!-- COPY QC WIDGET TAG AND SCRIPT BELOW -->
                        <qc-heatmap height="80vh" num-of-coins="50" currency-code="USD"></qc-heatmap>
                        <script src="https://quantifycrypto.com/widgets/heatmaps/js/qc-heatmap-widget.js"></script>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /container -->
@endsection
