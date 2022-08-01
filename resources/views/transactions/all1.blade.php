@extends('layouts.index')

@section('content')

<!-- navbar-->

@include('layouts.navbar')

<!-- Breadcrumb-->

<div class="breadcrumb-holder">

        <div class="container-fluid">

            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li> 

                <li class="breadcrumb-item active">TOUTES LES TRANSACTIONS</li>

            </ul>

        </div>

    </div>

    <section>
        <style>

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 20px;
    font-weight: 700;
    padding: 0px 20px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #16A085;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}


        </style>

        <div class="container-fluid">

            <!-- Page Header-->

            <header>

                <h1 class="h3 display">TOUTES LES TRANSACTIONS </h1> 
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                      <div class="circle-tile ">
                        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-exchange fa-fw fa-3x"></i></div></a>
                        <div class="circle-tile-content dark-blue">
                          <div class="circle-tile-description text-faded"> Transfert CARTE A CARTE</div>
                          <div class="circle-tile-number text-faded text-left">Nombre: {{$nbreTransfertCarte}}</div>
                          <div class="circle-tile-number text-faded text-left">Montant: {{$amountTransfertCarte}} FCFA</div>
                        </div>
                      </div>
                    </div>
                     
                    <div class="col-lg-3 col-sm-6">
                      <div class="circle-tile ">
                        <a href="#"><div class="circle-tile-heading red"><i class="fa fa-exchange fa-fw fa-3x"></i></div></a>
                        <div class="circle-tile-content red">
                          <div class="circle-tile-description text-faded"> Transfert COMPTE A COMPTE </div>
                          <div class="circle-tile-number text-faded text-left">Nombre: {{$nbreTransfertCompte}}</div>
                          <div class="circle-tile-number text-faded text-left">Montant: {{$amountTransfertCompte}} FCFA</div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile ">
                          <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-sign-in fa-fw fa-3x"></i></div></a>
                          <div class="circle-tile-content dark-blue">
                            <div class="circle-tile-description text-faded"> RECHARGE OM</div>
                            <div class="circle-tile-number text-faded text-left">Nombre: {{$nbreRechargeOrange}}</div>
                            <div class="circle-tile-number text-faded text-left">Montant: {{$amountRechargeOrange}} FCFA</div>
                          </div>
                        </div>
                      </div>
                       
                      <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile ">
                          <a href="#"><div class="circle-tile-heading red"><i class="fa fa-sign-in fa-fw fa-3x"></i></div></a>
                          <div class="circle-tile-content red">
                            <div class="circle-tile-description text-faded"> RECHARGE MOMO </div>
                            <div class="circle-tile-number text-faded text-left">Nombre: {{$nbreRechargeMtn}}</div>
                            <div class="circle-tile-number text-faded text-left">Montant: {{$amountRechargeMtn}} FCFA</div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile ">
                          <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-sign-out fa-fw fa-3x"></i></div></a>
                          <div class="circle-tile-content dark-blue">
                            <div class="circle-tile-description text-faded"> RETRAIT OM</div>
                            <div class="circle-tile-number text-faded text-left">Nombre: {{$nbreRetraitOrange}}</div>
                            <div class="circle-tile-number text-faded text-left">Montant: {{$amountRetraitOrange}} FCFA</div>
                          </div>
                        </div>
                      </div>
                       
                      <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile ">
                          <a href="#"><div class="circle-tile-heading red"><i class="fa fa-sign-out fa-fw fa-3x"></i></div></a>
                          <div class="circle-tile-content red">
                            <div class="circle-tile-description text-faded"> RETRAIT MOMO </div>
                            <div class="circle-tile-number text-faded text-left">Nombre: {{$nbreRetraitMtn}}</div>
                            <div class="circle-tile-number text-faded text-left">Montant: {{$amountRetraitMtn}} FCFA</div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-sm-6">
                          <div class="circle-tile ">
                            <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-exchange fa-fw fa-3x"></i></div></a>
                            <div class="circle-tile-content dark-blue">
                              <div class="circle-tile-description text-faded"> TRANSFERT DEPOT UNITE</div>
                              <div class="circle-tile-number text-faded text-left">Nombre: {{$nbreTransfertDEPOTUNITE}}</div>
                              <div class="circle-tile-number text-faded text-left">Montant: {{$amountTransfertDEPOTUNITE}} FCFA</div>
                            </div>
                          </div>
                        </div>
                         
                        <div class="col-lg-3 col-sm-6">
                          <div class="circle-tile ">
                            <a href="#"><div class="circle-tile-heading red"><i class="fa fa-exchange fa-fw fa-3x"></i></div></a>
                            <div class="circle-tile-content red">
                              <div class="circle-tile-description text-faded"> TRANSFERT UNITE DEPOT </div>
                              <div class="circle-tile-number text-faded text-left">Nombre: {{$nbreTransfertUNITEDEPOT}}</div>
                              <div class="circle-tile-number text-faded text-left">Montant: {{$amountTransfertUNITEDEPOT}} FCFA</div>
                            </div>
                          </div>
                        </div>
                  </div>

            </header>

            <div class="card">

            

                        <nav>

                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Liste des Transactions (PRINCIPAL)</a>

                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Recaputilatif des Transactions</a>

                            </div>

                        </nav>

                        

                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    

                    <div class="card-header">

                    <form class="form-inline" token="{{Session::get('access_token')}}">

                        <div class="form-group">
                            <div class="form-group">

                                <label for="inlineFormInputGroup" class="sr-only">Date de début</label>
    
                                <input id="startdate" type="date" class="mr-3 form-control form-control transaction">
    
                            </div>
    
                            <div class="form-group">
    
                                <label for="inlineFormInputGroup" class="sr-only">Date de fin</label>
    
                                <input id="enddate" type="date" class="mr-3 form-control form-control transaction">
    
                            </div>

                            <label for="inlineFormInputGroup" class="sr-only">Type de transaction</label>

                            <select  id="type" name="account" placeholder="Type de transaction"  class="mr-3 form-control form-control transaction" >

                            <option value="">-----Types de transactions------</option>

                            <option value="RECHARGE_CARTE_VIA_COMPTE">RECHARGE CARTE VIA COMPTE</option>

                            <option value="TRANSFERT_CARTE_A_CARTE">TRANSFERT CARTE A CARTE</option>

                            <option value="TRANFERT_DEPOT_UNITE">RETRAIT COMPTE VIA MONETBIL</option>

                            <option value="TRANFERT_ UNITE _DEPOT">PAYEMENT VIA QR-CODE</option>

                            <option value="PAYEMENT_FACTURE">PAYEMENT FACTURE</option>

                            <option value="PAYEMENT_VIA_QRCODE">PAYEMENT VIA QR-CODE</option>

                            <option value="DEBIT_CARTE">DEBIT_CARTE</option>

                            </select>

    

                        </div> 

                        <div class="form-group">

                            <label for="inlineFormInputGroup" class="sr-only">Numero de carte</label>

                            <input id="carte" type="text" placeholder="Numero de carte" class="mr-3 form-control form-control transaction">

                        </div>

                        <div class="form-group">

                            <label for="inlineFormInputGroup" class="sr-only">Numero de telephone</label>

                            <input id="phone" type="number" placeholder="Telephone" class="mr-3 form-control form-control transaction">

                        </div>
                        <div class="form-group">
                            <button type="button" name="filtrer" id="filtrer" class="mr-3 btn btn-success"> Filtrer </button>
                      </div>
                        <div class="form-group">
                            <input type="reset" value="Reset" class="mr-3 btn btn-warning">
                        </div>
                    </form>

                    </div>

                            

                <div class="col-md-12">

                            <div class="card-body">

                                <div>

                                    <table id="transactiontable1" class="table">
                                        <thead>
                                        <tr>
                                            <th>IdTransaction</th>



                                            <th>Date</th>



                                            <th>Envoyer par</th>



                                            <th>Recu par</th>



                                            <th>Montants</th>



                                            <th>Frais</th>



                                            <th>Type</th>

                                            <th>Status</th>



                                        </tr>



                                        </thead>



                                        <tbody>



                                        @foreach($transactions as $transaction)



                                        <tr>



                                            <td>{{$transaction->id}}</td>
                                            <td>{{$transaction->Date}}</td>







                                            @if(property_exists($transaction, 'user'))







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







                                            @if(property_exists($transaction, 'user') and array_key_exists('destinataire', $transaction->user))







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

                                            <td>{{$transaction->Frais}} FCFA</td>



                                            <td>{{$transaction->Operation}}</td>
                                            <td>{{$transaction->Status}}</td>



                                        </tr>



                                        @endforeach



                                        </tbody>



                                    </table>



                                </div>



                                </div>

                            </div>

                            </div>

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                            <div class="col-sm-12">

                            

                            <div class="card-body" id="datable2td">

                                    <div>

                                        <table id="datatable2" class="table" style='text-align:center'>

                                            <thead>

                                            <tr>

                                                <th>Date</th>

                                                <th></th>

                                                <th>Debit</th>

                                                <th></th>

                                                <th>TRCCA</th>

                                                <th></th>

                                                <th>TRCCO</th>

                                                <th></th>

                                                <th>TRDU</th>

                                                <th></th>

                                                <th>TRUD</th>

                                                <th></th>

                                                <th>RCVCO</th>

                                                <th></th>

                                                <th>RCOVM</th>

                                                <th></th>

                                                <th>RECAVM</th>

                                                <th></th>

                                                <th>RECOVM</th>

                                                <th></th>

                                            </tr>

                                            <tr>

                                                <td></td>

                                                <td></td>

                                                <td>n<sup>bre</sup></td>

                                                <td>m<sup>t</sup></td>

                                                <td>n<sup>bre</sup></td>

                                                <td>m<sup>t</sup></td>

                                                <td>n<sup>bre</sup></td>

                                                <td>m<sup>t</sup></td>

                                                <td>n<sup>bre</sup></td>

                                                <td>m<sup>t</sup></td>

                                                <td>n<sup>bre</sup></td>

                                                <td>m<sup>t</sup></td>

                                                <td>n<sup>bre</sup></td>

                                                <td>m<sup>t</sup></td>

                                                <td>n<sup>bre</sup></td>

                                                <td>m<sup>t</sup></td>

                                                <td>n<sup>bre</sup></td>

                                                <td>m<sup>t</sup></td>

                                                <td>n<sup>bre</sup></td>

                                                <td>m<sup>t</sup></td>

                                            </tr>

                                            </thead>

                                            <tbody>

                                            @foreach($transactions_count as $transaction)

                                            <tr>                                                

                                                <td style="text-align:left; padding:0;">{{$transaction->Date}}</td>

                                                <td></td>

                                                <td style="text-align:center; padding:0;">{{$transaction->debit_carte}} </td><td style="background-color: green; color:white; padding:0;"> {{$transaction->amount_debit_carte}}</td>

                                                <td style="text-align:center; padding:0;">{{$transaction->transfert_carte_a_carte}} </td><td style="background-color: green; color:white; padding:0;"> {{$transaction->amount_transfert_carte_a_carte}}</td>

                                                <td style="text-align:center; padding:0;">{{$transaction->transfert_compte_a_compte}} </td><td style="background-color: green; color:white; padding:0;"> {{$transaction->amount_transfert_compte_a_compte }} </td>

                                                <td style="text-align:center; padding:0;">{{$transaction->transfert_unite_depot}} </td><td style="background-color: green; color:white; padding:0;"> {{$transaction->amount_transfert_unite_depot }}</td>

                                                <td style="text-align:center; padding:0;">{{$transaction->transfert_depot_unite}} </td><td style="background-color: green; color:white; padding:0;"> {{$transaction->amount_transfert_depot_unite }}</td>

                                                <td style="text-align:center; padding:0;">{{$transaction->recharge_carte_via_compte}} </td><td style="background-color: green; color:white; padding:0;"> {{$transaction->amount_recharge_carte_via_compte }}</td>

                                                <td style="text-align:center; padding:0;">{{$transaction->recharge_compte_via_monetbil}} </td><td style="background-color: green; color:white; padding:0;"> {{$transaction->amount_recharge_compte_via_monetbil }}</td>

                                                <td style="text-align:center; padding:0;">{{$transaction->retrait_carte_via_monetbil}} </td><td style="background-color: green; color:white; padding:0;"> {{$transaction->amount_retrait_carte_via_monetbil }}</td>

                                                <td style="text-align:center; padding:0;">{{$transaction->retrait_compte_via_monetbil}} </td><td style="background-color: green; color:white; padding:0;"> {{$transaction->amount_retrait_compte_via_monetbil }}</td>

                                            </tr>

                                            @endforeach

                                            </tbody>



                                        </table>



                                    </div>



                                    </div>

                                </div>

                                </div>

                            </div>

                        </div>

                            

                            </div>

                        </div>

                    </div>

            </div>

        </div>

    </section>

@endsection