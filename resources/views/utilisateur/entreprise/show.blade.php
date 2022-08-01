@extends('layouts.index')
@section('content')
<!-- navbar-->
@include('layouts.navbar')
      <!-- Counts Section -->
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="dasboard">Accueil</a></li>
                <li class="breadcrumb-item active">Profile Utilisateur: {{$ets->raison_social}}</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10">
                    <header class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                        <h1 class="h3 display mb-2 mb-sm-0"> PROFILE ENTREPRISE EZPASS</h1>
                        <p class="mb-0">
                        
                            <button onclick="window.history.back()" class="btn btn-warning" style="margin-left:12px"><i class="fa fa-arrow-left"></i> Retourner</button>
                            <button class="btn btn-danger mb-2 mb-sm-0"><i class="fa fa-lock"></i> Bloquer</button>
                            <button class="btn btn-primary mb-2 mb-sm-0"><i class="fa fa-print"></i> Imprimer</button>
                        </p>
                    </header>
                    <div class="card card-body p-5">
                        <div class="row">
                            <div class="col text-center"><!-- Heading-->
                                <h2 class="mb-2">Utilisateur N° {{$ets->id}}</h2>
                                <p class="text-muted mb-6"> Cree le {{$ets->created_at}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h6 class="text-uppercase text-muted">COORDONNEES</h6>
                                <p class="text-muted mb-4"><strong class="text-body">Raison Social: {{$ets->raison_social}}</strong><br>
                                <strong class="text-body">Téléphone:</strong> {{$ets->user->phone}}<br>
                                <strong class="text-body">Numero compte:</strong>@if($ets->user->compte)
                                {{$ets->user->compte->account_number}} <a href="" class="btn-warning"> <i class="fa fa-history"></i> Voir l'historique du compte</a>
                                @else
                                aucun
                                @endif<br><strong class="text-body">Numero carte:</strong>@if(array_key_exists(0, $ets->user->cards))
                                {{$ets->user->cards[0]->code_number}} <a href="" class="btn-success"> <i class="fa fa-history"></i> Voir l'historique du compte</a>
                                @else
                                aucune
                                @endif</p>
                            </div>
                            <div class="col-12 col-md-6 text-md-right">
                                <h6 class="text-uppercase text-muted">CREE PAR</h6>
                                <p class="text-muted mb-4"><strong class="text-body">
                                @if($by)
                                    @if(array_key_exists(0, $by->particulier)) 
                                        {{$by->particulier[0]->lastname}} 
                                        {{$by->particulier[0]->firstname}} 
                                    @elseif(array_key_exists(0, $by->enterprise)) 
                                        {{$by->enterprise[0]->raison_social}} 
                                    @endif
                                    
                                </strong>
                                <br>{{$by->categorie}}
                                <br>{{$by->phone}}
                                <br>
                                @else
                                <p class="text-muted mb-4"><strong class="text-body">Inconnu</strong></p>
                                @endif
                            </p>
                                
                            </div>
                        </div>
                        <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width: 100%;" class="table">
                            <thead>
                            <tr>
                                <th>Localisation</th>
                                <th>Categorie</th>
                                <th>Session</th>
                                @if(Session::get('role') == "Administrateur")
                                <th>Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $ets->user->address }}</td>
                                @if($ets->categorie)
                                <td>{{$ets->categorie}}</td>
                                @else
                                <td>aucun</td>
                                @endif
                                <td>
                                {{ $ets->user->role->name }}
                                </td>
                                @if(Session::get('role') == "Administrateur")
                                <td>
                                    <a href="/particulier/{{ $ets->id }}/edit" id="staff_edit" class="btn btn-warning" data-staffid="{{ $ets->id }}"><i class="fa fa-edit"></i></a>
                                    <a href="/particulier/{{ $ets->id }}/" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                                @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if(!empty($utilisateurs))
            <div class="row">
                <div class="col-12">        
                    <h1 class="h3 display mb-2 mb-sm-0"> LISTE DES ENTREPRISES EZPASS CREE PAR: <b> 
                                            {{$ets->raison_social}} </b>
                    </h1>
                    <br>
                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Raison Social</th>
                                        <th>Telephone</th>
                                        <th>N° compte</th>
                                        <th>N° carte</th>
                                        <th>Etat</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($utilisateurs as $user)
                                    <tr>
                                        <td>{{$user->created_at}}</td>
                                        @if(array_key_exists(0, $user->enterprise))
                                        <td>{{$user->enterprise[0]->raison_social}}</td>
                                        @else
                                        <td>aucun</td>
                                        @endif
                                        <td>{{$user->phone}}</td>
                                        @if($user->compte)
                                        <td>{{$user->compte->account_number}}</td>
                                        @else
                                        <td>aucun</td>
                                        @endif
                                        @if(array_key_exists(0, $user->cards))
                                        <td>{{$user->cards[0]->code_number}}</td>
                                        @else
                                        <td>aucune</td>
                                        @endif
                                        <td>{{$user->state}}</td>
                                        <td> 
                                        @if(array_key_exists(0, $user->enterprise)) 
                                        <a href="/public/{{ route('showEntreprise', ['user_id' => $user->enterprise[0]->id]) }}" class="btn btn-warning"><i class="fa fa-eye"></i> Voir profil </a>
                                        @else
                                        aucune
                                        @endif
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            @if(!empty($appareil_attribuer))
            <br/><br/><br/><br/><br/>
            <div class="row">
                <div class="col-12">        
                    <h1 class="h3 display mb-2 mb-sm-0"> LISTE DES APPARIELS APPARTENANT A: <b> 
                                            {{$ets->raison_social}} </b>
                    </h1>
                    <br>
                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table">
                                    <thead>
                                    <tr>
                                        <th>Date Creation</th>
                                        <th>Type Appariel</th>
                                        <th>N° Serie</th>
                                        <th>Mobile</th>
                                        <th>Fournisseur</th>
                                        <th>Passerel</th>
                                        <th>Manifacturer</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="desattribution_entreprise_device">
                                    @for($i=0; $i < count($appareil_attribuer); $i++)
                                        @foreach($appareil_attribuer[$i]->devices as $device)
                                        <tr>
                                            <td>{{$device->created_at}}</td>
                                            <td>{{$device->device_type}}</td>
                                            <td>{{$device->serial_number}}</td>
                                            <td>{{$device->mobile}}</td>
                                            <td>{{$device->provider}}</td>
                                            <td>{{$device->passerel}}</td>
                                            <td>{{$device->manifacturer}}</td>
                                            <td><button id_entreprise="{{$ets->id}}" raison="{{$ets->raison_social}}" id_device="{{$device->id}}" serial_number="{{$device->serial_number}}" mobile="{{$device->mobile}}" class="btn btn-danger" id="desattribution" data-toggle="modal" data-target="#myModal1"><i class="fa fa-arrow-left"></i></button></td>                           
                                        </tr>
                                        @endforeach
                                    @endfor
                                    </tbody>
                        </table>
                        <div id="myModal1" token="{{Session::get('access_token')}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog" style="max-width: 700px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 id="exampleModalLabel" class="modal-title"> Rétirer le Terminal de Paiement  </h2>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-validate" id="post_entreprise_device">
                                                        <div class="form-group">
                                                            <label>Raison Social de l'entreprise</label>
                                                            <input type="text" id="id_entreprise" required data-msg="Entrer le numero de la carte s'il vous plait" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>l'Appariel</label>
                                                            <input type="text" id="device_id" required data-msg="Entrer les references de l'appariel s'il vous plait" class="form-control">
                                                        </div>
                                                        <pre class="mt-3">
                                                        </pre>
                                                        <div class="form-group">
                                                            <button class="btn btn-danger" id="postDesattribution">Desattribuer le Terminal Paiement</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection