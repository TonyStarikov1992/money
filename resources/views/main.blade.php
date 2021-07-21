@extends('master')

@section('title', 'MAIN')

@section('main')
    <div class="container-fluid text-center">
        <div class="row" style="height: 90vh; background-image: url('/images/first.png'); background-repeat: no-repeat; background-size: cover;">
            <div class="col-6 d-flex align-items-center">
                <div class="text-center">
                    <h1>
                        All ingenious is simple
                    </h1>
                    <h2>
                        Aбсолютно новый подход к рынку криптовалюты.
                    </h2>
                    <h3>
                        Мы создали — доступную, эффективную и прозрачную финансовую систему, основанную на криптовалюте.
                    </h3>
                </div>
            </div>
            <div class="col-6"></div>
        </div>

        <div class="container">

            <div class="d-flex justify-content-center">
                <hr size="5" class="w-100 rounded-pill">
            </div>

            <div class="row">
                <div class="col-6 d-flex align-items-center" style="height: 100%;">
                    <img src="/images/2.png" alt="" class="img-fluid w-100">
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="text-center">
                        <h2>
                            В первую очередь нам важна безопасность, поэтому весь объем активов застрахован от чрезвычайных ситуаций.
                            Также вся информация хранится на личных серверах компании и шифруется по мировым стандартам безопасности.
                        </h2>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <hr size="5" class="w-100 rounded-pill">
            </div>

            <div class="row" style="height: 100%;">
                <div class="col-6 d-flex align-items-center">
                    <div class="text-center">
                        <h2>
                            Легкость и простота в использование.
                            Широкий диапазон криптовалютных пар.
                            Для вашего удобства все сделки происходят через USD
                            А вывод средств осуществляется в несколько кликов на любые платежные сервисы.
                        </h2>
                    </div>
                </div>
                <div class="col-6 d-flex align-items-center" style="height: 100%;">
                    <img src="/images/3.png" alt="" class="img-fluid w-100">
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <hr size="5" class="w-100 rounded-pill">
            </div>

            <div class="row" style="height: 100%;">
                <div class="col-6 d-flex align-items-center" style="height: 100%;">
                    <img src="/images/4.png" alt="" class="img-fluid w-100">
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="text-center">
                        <h2>
                            Команда аналитиков, для новичков и тех, кто решил отдохнуть.
                            Мы сотрудничаем с группой профессионалов, которые знают свое дело.
                        </h2>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <hr size="5" class="w-100 rounded-pill">
            </div>

            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <div class="text-center">
                        <h2>
                            Международная службы поддержки, работающая 24/7/365.
                            Гарантированное круглосуточное решения всех ваших вопросов и удовлетворения всех потребностей.
                        </h2>
                    </div>
                </div>
                <div class="col-6 d-flex align-items-center" style="height: 100%;">
                    <img src="/images/5.png" alt="" class="img-fluid w-100">
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <hr size="5" class="w-100 rounded-pill">
            </div>

        </div>

    </div>
    <!-- /container -->
@endsection
