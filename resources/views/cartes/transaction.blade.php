@extends('layouts.index')

@section('content')

<!-- navbar-->

@include('layouts.navbar')

<!-- Breadcrumb-->

<div class="breadcrumb-holder">

        <div class="container-fluid">

            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>

                <li class="breadcrumb-item active">TOUTES LES TRANSACTIONS DE LA CARTE</li>

            </ul>

        </div>

    </div>

    <section>

        <div class="container-fluid">

            <!-- Page Header-->

            <header>

                <h1 class="h3 display" style="margin-bottom:30px;">TOUTES LES TRANSACTIONS DE LA CARTE </h1>

                <div class="row">

                    <div class="col-6 col-md-4 col-lg-3 col-xl-2">

                        <div class="card"><a href="#" data-lightbox="gallery" data-title="Image 1063"><img src="#" alt="Debit Carte" class="img-fluid"></a>

                            <div class="card-body">

                                <h5 class="card-title mb-1">{{$transactions->nbreDebit}}</h5>

                                <p class="card-text text-xsmall text-muted">Debit Carte</p>

                            </div>

                        </div>

                    </div>

                    <div class="col-6 col-md-4 col-lg-3 col-xl-2">

                        <div class="card"><a href="#" data-lightbox="gallery" data-title="Image 1063"><img src="#" alt="Payement Qrcode" class="img-fluid"></a>

                            <div class="card-body">

                                <h5 class="card-title mb-1">{{$transactions->nbreQrcode}}</h5>

                                <p class="card-text text-xsmall text-muted">Payement QRCODE</p>

                            </div>

                        </div>

                    </div>

                    <div class="col-6 col-md-4 col-lg-3 col-xl-2">

                        <div class="card"><a href="#" data-lightbox="gallery" data-title="Image 1063"><img src="#" alt="Transfert (compte + carte)" class="img-fluid"></a>

                            <div class="card-body">

                                <h5 class="card-title mb-1">{{$transactions->nbreTransfert}}</h5>

                                <p class="card-text text-xsmall text-muted">Transfert</p>

                            </div>

                        </div>

                    </div>

                </div>

            </header>

            <div class="card">

                <div class="card-header">

                    <button onclick="window.history.back()" class="btn btn-warning" style="margin-left:12px"><i class="fa fa-arrow-left"></i> Retourner</button>

                    <button type="button" class="btn btn-success" style="float: right"><i class="fa fa-print"></i> Imprimer</button>

                </div>

                <form class="form-inline">

                    <div class="form-group">

                        <label for="inlineFormInput" class="sr-only">Date debut </label>

                        <input id="inlineFormInput" type="text" placeholder="Date de debut" class="mr-3 form-control input-datepicker">

                    </div>

                    <div class="form-group">

                        <label for="inlineFormInput" class="sr-only">Date fin </label>

                        <input id="inlineFormInput" type="text" placeholder="Date de fin" class="mr-3 form-control input-datepicker">

                    </div>

                    <div class="form-group">

                        <label for="inlineFormInputGroup" class="sr-only">Type de transaction</label>

                        <select  id="inlineFormInputGroup" name="account" placeholder="Type de transaction"  class="mr-3 form-control form-control"" >

                        <option>-----Types de transactions------</option>

                        <option>Recharge via un operateur(MTN,orange,Express union)</option>

                        <option>Transfert compte a compte</option>

                        <option>Retrait</option>

                        <option>Recharge carte Via compte</option>

                        </select>



                    </div>

                    <div class="form-group">

                        <input type="submit" value="Submit" class="mr-3 btn btn-primary">

                    </div>

                </form>

                <div class="card-body">

                    <div>

                        <table id="datatable1" class="table">

                            <thead>

                            <tr>

                                <th>IdTransaction</th>

                                <th>Date</th>

                                <th>Envoyer par</th>

                                <th>Recu par</th>

                                <th>Montants</th>

                                <th>Frais</th>

                                <th>Type</th>

                                <th>status</th>

                            </tr>

                            </thead>

                            <tbody>

                            @foreach($transactions->transaction as $transaction)

                            <tr>

                                <td>{{$transaction->id}}</td>



                                <td>{{$transaction->Date}}</td>



                                @if(array_key_exists('emetteur', $transaction->user))



                                    @if(property_exists($transaction->user->emetteur, 'firstname'))



                                            <td class="text-muted btn-warning" ><span style="color:white"><i class="fa fa-user"><b> {{$transaction->user->emetteur->firstname}} {{$transaction->user->emetteur->lastname}}</b></i></span></td>



                                        @elseif(property_exists($transaction->user->emetteur, 'raison_social'))

                                            <td class="text-muted btn-success"><span style="color:white"><i class="fa fa-building-o"><b> {{$transaction->user->emetteur->raison_social}}</b></i></span></td>

                                        @else

                                        <td class="text-muted btn-danger" >ERREUR SYSTEME</td>

                                        @endif



                                @else



                                <td class="text-muted">inconnu<td>



                                @endif



                                @if(array_key_exists('destinataire', $transaction->user))



                                    @if(property_exists($transaction->user->destinataire, 'firstname'))



                                        <td class="text-muted btn-success"><span style="color:white"><i class="fa fa-user"><b> {{$transaction->user->destinataire->firstname}} {{$transaction->user->destinataire->lastname}}<b></i></span></td>



                                    @elseif(property_exists($transaction->user->destinataire, 'raison_social'))



                                        <td class="text-muted btn-danger"><span style="color:white"><i class="fa fa-building-o"><b> {{$transaction->user->destinataire->raison_social}}</b></i></span></td>



                                    @else

                                        <td class="text-muted btn-danger" >ERREUR SYSTEME</td>

                                    @endif



                                @else



                                <td class="text-muted">inconnu</td>



                                @endif



                                <td>{{$transaction->Montant}} FCFA</td>



                                <td>{{$transaction->Operation}}</td>



                                <td>{{$transaction->Frais}} FCFA</td>



                                <td>{{$transaction->Status}}</td>



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