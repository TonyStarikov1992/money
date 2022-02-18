@extends('master')

@section('title', 'Listing')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col text-start">
                <h1>Listing with Elannce</h1>

                <p>
                    Listing is the procedure of including a coin/token in the list of crypto assets admitted to trading.
                </p>

                <p>
                    If you are the owner, developer or official representative of the coin, You can apply for a listing on Elannce in a few minutes.
                </p>

                <a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSfGkDsh6RtU5WAqWOsFw844q-tU_NGfxXQgYfzGk4a2WpPSvQ/viewform?usp=sf_link" target="_blank" role="button">Fill the form</a>

                <p>
                    The coin will be integrated into the Elannce exchange if technically possible, as well as compliance with several conditions specified below.
                </p>

                <h2>
                    Project requirements
                </h2>

                <p>
                    What crypto project must have to apply for the listing? You can apply if your project has: website, clear and understandable Whitepaper with the idea, good reputation, open-source (preferable).
                </p>

                <p>
                    When sending a request to add a coin to the exchange, you must provide the following data:
                </p>

                <p>
                    — link to the official website of the coin;
                </p>

                <p>
                    — link to the official git repository of your node;
                </p>

                <p>
                    — link to bitcointalk topic or another similar forum, or a link to your own forum;
                </p>

                <p>
                    — reference to the Explorer unit, which should function normally;
                </p>

                <p>
                    ! Make sure your git repository contains the technical guide to compile and configure the node.
                </p>

                <p>
                    The developer of the coin undertakes to promptly notify the exchange of any technical problems/changes in the coin, nodes, block explorer. Besides, the developer is obliged to notify the exchange of the planned forks in advance.
                </p>

                <p>
                    In case of loss of funds due to technical problems with the node or forks, the developer is responsible for this.
                </p>

                <h2>
                    How we conduct the risk-analysis of coin/token
                </h2>

                <p>
                    Elannce carries out careful control of compliance of projects with the conditions and requirements established by the exchange. After receiving your application, we study White paper and public information about the team, analyze the state of social networks and the activity of the community. An important step is to study the branch in a public unmodeled source and source code.
                </p>

                <p>
                    Why Elannce may refuse a listing? We value our reputation and will not support your project if you have: knowingly fraudulent coin, negative reputation and/or low liquidity.
                </p>

            </div>
        </div>
    </div>
    <!-- /container -->
@endsection
