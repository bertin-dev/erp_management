@extends('layouts.index')

@section('content')

<!-- navbar-->

    @include('layouts.navbar')

    <!-- Counts Section -->

    <section class="dashboard-counts section-padding" id="statistiqueDashboard" token="{{Session::get('access_token')}}">

        <div class="container-fluid">

            <div class="row">

                <!-- Count item widget-->

                <div class="col-xl-2 col-md-4 col-6">

                    <div class="wrapper count-title d-flex">

                        <div class="icon"><i class="icon-user"></i></div>

                        <div class="name"><strong class="text-uppercase">Particuliers E-ZPASS</strong><span>Last 7 days</span>

                        <div class="count-number">{{$nbreParticuliers}}</div>

                        </div>

                    </div>

                </div>

                <!-- Count item widget-->

                <div class="col-xl-2 col-md-4 col-6">

                    <div class="wrapper count-title d-flex">

                        <div class="icon"><i class="icon-padnote"></i></div>

                        <div class="name"><strong class="text-uppercase">Entreprises E-ZPASS</strong><span>Last 5 days</span>

                            <div class="count-number">{{$nbreEnterprises}}</div>

                        </div>

                    </div>

                </div>

                <!-- Count item widget-->

                <div class="col-xl-2 col-md-4 col-6">

                    <div class="wrapper count-title d-flex">

                        <div class="icon"><i class="icon-check"></i></div>

                        <div class="name"><strong class="text-uppercase">Nombre de debits </strong><span>Last 2 months</span>

                            <div class="count-number">{{$nbreDebits}}</div>

                        </div>

                    </div>

                </div>

                <!-- Count item widget-->

                <div class="col-xl-2 col-md-4 col-6">

                    <div class="wrapper count-title d-flex">

                        <div class="icon"><i class="icon-bill"></i></div>

                        <div class="name"><strong class="text-uppercase">Nombre de recharges</strong><span>Last 2 days</span>

                            <div class="count-number">{{$nbreRecharges}}</div>

                        </div>

                    </div>

                </div>

                <!-- Count item widget-->

                <div class="col-xl-2 col-md-4 col-6">

                    <div class="wrapper count-title d-flex">

                        <div class="icon"><i class="icon-list"></i></div>

                        <div class="name"><strong class="text-uppercase">cartes E-ZPASS</strong><span>Last 3 months</span>

                            <div class="count-number">{{$nbreCartes}}</div>

                        </div>

                    </div>

                </div>

                <!-- Count item widget-->

                <div class="col-xl-2 col-md-4 col-6">

                    <div class="wrapper count-title d-flex">

                        <div class="icon"><i class="icon-list-1"></i></div>

                        <div class="name"><strong class="text-uppercase">Personnels SMOPAYE</strong><span>Last 7 days</span>

                            <div class="count-number">{{$nbrePersonnels}}</div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Header Section-->

    <section class="charts">

        <div class="container-fluid">

            <!-- Page Header-->

            <header>

                <h1 class="h3 display">Tableau de bord</h1>

            </header>

            <div class="row">

                <div class="col-lg-6">

                    <div class="card line-chart-example">

                        <div class="card-header d-flex align-items-center">

                            <h4>Utilisateurs E-ZPASS</h4>

                        </div>

                        <div class="card-body">

                            <canvas id="lineChartExample"></canvas>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card bar-chart-example">

                        <div class="card-header d-flex align-items-center">

                            <h4>Nos recharges</h4>

                        </div>

                        <div class="card-body">

                            <canvas id="barChartExample"></canvas>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card pie-chart-example">

                        <div class="card-header d-flex align-items-center">

                            <h4>Nos payements</h4>

                        </div>

                        <div class="card-body">

                            <div class="chart-container">

                                <canvas id="pieChartExample"></canvas>

                            </div>

                        </div>

                    </div>

                </div>

                   <div class="col-lg-6">

                    <div class="card bar-chart-example">

                        <div class="card-header d-flex align-items-center">

                            <h4>Nos retraits</h4>

                        </div>

                        <div class="card-body">

                            <canvas id="barChartExample1"></canvas>

                        </div>

                    </div>

                </div>



                <div class="col-lg-6">

                    <div class="card radar-chart-example">

                        <div class="card-header d-flex align-items-center">

                            <h4>Autre transactions</h4>

                        </div>

                        <div class="card-body">

                            <div class="chart-container">

                                <canvas id="radarChartExample"></canvas>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection