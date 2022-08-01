@extends('layouts.index')

@section('content')

<!-- navbar-->

    @include('layouts.navbar')

<!-- Breadcrumb-->

<div class="breadcrumb-holder">

        <div class="container-fluid">

            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                <li class="breadcrumb-item active">TABLEAU RECAPULATIF DU SYSTEME</li>

            </ul>

        </div>

    </div>

    <section>

        <div class="container-fluid">

            <!-- Page Header-->

            <header>

                <h1 class="h3 display">TABLEAU RECAPULATIF DU SYSTEME</h1>

            </header>

            <div class="card">

                <div class="card-header">

                    <button type="button" class="btn btn-success" style="float: right">Imprimer</button>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table id="datatable1" style="width: 100%;" class="table">

                            <thead>

                            <tr>

                                <th>Date</th>

                                <th title="Total Compte Principal">TCP</th>

                                <th title="Total Compte Unite de la CARTE">TCU</th>

                                <th title="Total Compte Depot de la CARTE">TCD</th>

                                <th title="Total Compte (Unite + Depot + Principal)">TC</th>

                                <th title="Reharge orange">RO</th>

                                <th title="Recharge MTN">RM</th>

                                <th title="Recharge EU">REU</th>

                                <th title="Total Recharges(MTN + ORANGE + EU)">TR</th>

                                <th title="Solde chez MonetBil">Solde</th>

                            </tr>

                            </thead>

                            <tbody>

                            @foreach($recaps as $recap)

                            <tr>

                                <td>{{$recap->date}}</td>

                                <td>0</td>

                                <td>{{$recap->unite}} fcfa</td>

                                <td>{{$recap->depot}} fcfa</td>

                                <td>{{$recap->total}} fcfa</td>

                                <td>{{$recap->recharge_orange}} fcfa</td>

                                <td>{{$recap->recharge_mtn}} fcfa</td>

                                <td>{{$recap->recharge_eu}} fcfa</td>

                                <td>{{$recap->recharges_total}} fcfa</td>

                                <td>{{$recap->total - $recap->recharges_total}} fcfa</td>

                            </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection