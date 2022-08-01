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

                <li class="breadcrumb-item active">Profile Utilisateur: {{$staff->lastname}} {{$staff->firstname}}</li>

            </ul>

        </div>

    </div>

    <section>

        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-10">

                    <header class="d-flex flex-column flex-sm-row justify-content-between align-items-center">

                        <h1 class="h3 display mb-2 mb-sm-0"> PROFILE UTILISATEUR EZPASS</h1>

                        <p class="mb-0">

                            @if(Session::get('role') == "Administrateur")

                            <button class="btn btn-danger mb-2 mb-sm-0"><i class="fa fa-lock"></i> Bloquer</button>

                            @endif

                            <button onclick="window.history.back()" class="btn btn-warning" style="margin-left:12px"><i class="fa fa-arrow-left"></i> Retourner</button>

                            <button class="btn btn-primary mb-2 mb-sm-0"><i class="fa fa-print"></i> Imprimer</button>

                        </p>

                    </header>

                    <div class="card card-body p-5">

                        <div class="row">

                            <div class="col text-center"><!-- Heading-->

                                <h2 class="mb-2">Utilisateur N° {{$staff->id}}</h2>
                                @php
                                    $date = date('d/m/Y H:i:s', strtotime($staff->created_at))
                                @endphp

                                <p class="text-muted mb-6"> Cree le {{$date}}</p>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12 col-md-6">

                                <h6 class="text-uppercase text-muted">COORDONNEES</h6>

                                <p class="text-muted mb-4"><strong class="text-body">Nom & Prénom: {{$staff->lastname}} {{$staff->firstname}}</strong><br>

                                <strong class="text-body">Téléphone:</strong> {{$staff->user->phone}}<br>

                                <strong class="text-body">Numero compte:</strong>@if($staff->user->compte)

                                {{$staff->user->compte->account_number}}

                                @else

                                aucun

                                @endif<br><strong class="text-body">Numero carte:</strong>@if(array_key_exists(0, $staff->user->cards))

                                {{$staff->user->cards[0]->code_number}}

                                @else

                                aucune

                                @endif</p>

                            </div>

                            <div class="col-12 col-md-6 text-md-right">

                                <h6 class="text-uppercase text-muted">CREE PAR</h6>

                                @if($by)

                                <p class="text-muted mb-4"><strong class="text-body">{{$by->particulier[0]->lastname}} {{$by->particulier[0]->firstname}}</strong><br>{{$by->categorie}}<br>{{$by->phone}}<br></p>

                                @else

                                <p class="text-muted mb-4"><strong class="text-body">Inconnu</strong></p>

                                @endif

                            </div>

                        </div>

                        <div class="card">

                <div class="card-body">

                    <div class="table-responsive">

                        <table style="width: 100%;" class="table">

                            <thead>

                            <tr>
                                
                                <th>Solde Compte</th>
                                <th>Localisation</th>

                                <th>Categorie</th>

                                <th>Roles</th>

                                <th>Permissions</th>
                                <th>Point cumulé</th>

                                @if(Session::get('role') == "Administrateur")

                                <th>Actions</th>

                                @endif

                            </tr>

                            </thead>

                            <tbody>

                            <tr>
                            
                                <td>{{$staff->user->compte->amount}}</td>

                                <td>{{ $staff->user->address }}</td>

                                @if($staff->categorie)

                                <td>{{$staff->categorie}}</td>

                                @else

                                <td>aucun</td>

                                @endif

                                <td>

                                    @foreach($staff->roles as $role) 

                                        <span name="{{$role->name}}" id="{{ $role->id }}" class="badge badge-primary">{{ $role->name }}</span>

                                    @endforeach 

                                </td>

                                <td>

                                    @foreach($staff->permissions as $permission) 

                                        <span name="{{$permission->name}}" id="{{ $permission->id }}" class="badge badge-primary">{{ $permission->name }}</span>

                                    @endforeach 

                                </td>
                                <td>{{ $staff->user->bonus }}</td>

                                @if(Session::get('role') == "Administrateur")

                                <td>

                                    <a href="/public/particulier/{{ $staff->id }}/edit" id="staff_edit" class="btn btn-warning" data-staffid="{{ $staff->id }}"><i class="fa fa-edit"></i></a>

                                    <a href="/public/particulier/{{ $staff->id }}/" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                                </td>

                                @endif

                            </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

                @if(array_key_exists(0, $staff->user->cards))

                <h1 class="h3 display mb-2 mb-sm-0"> MA CARTE PRINCIPAL</h1>

                <div class="card-body">

                    <div class="table-responsive">

                        <table style="width: 100%;" class="table">

                            <thead>

                            <tr>

                                <th>N°</th>

                                <th>N° serie</th>

                                <th>Creation</th>

                                <th>Expiration</th>

                                <th>UNITE</th>

                                <th>DEPOT</th>

                                <th>ETAT</th>

                                <th>TYPE</th>
                                @if(Session::get('role') == "Administrateur")
                                <th>Actions</th>
                                @endif
                            </tr>

                            </thead>

                            <tbody>

                            <tr>

                                <td>{{ $staff->user->cards[0]->code_number }}</td>

                                <td>{{ $staff->user->cards[0]->serial_number }}</td>

                                <td>{{ date('d/m/Y H:i:s', strtotime($staff->user->cards[0]->starting_date)) }}</td>

                                <td>{{ date('d/m/Y H:i:s', strtotime($staff->user->cards[0]->end_date)) }}</td>

                                <td>{{ $staff->user->cards[0]->unity }}</td>

                                <td>{{ $staff->user->cards[0]->deposit }}</td>

                                <td>{{ $staff->user->cards[0]->card_state }}</td>

                                <td>{{ $staff->user->cards[0]->type }}</td>

                                @if(Session::get('role') == "Administrateur")

                                <td id="token" token="{{Session::get('access_token')}}">

                                    <a href="/public/card/{{$staff->user->cards[0]->id}}/transaction" class="btn btn-success" ><i class="fa fa-history" aria-hidden="true"></i></a>

                                    @if($staff->user->cards[0]->card_state == "activer")

                                    <button user_id="{{ $staff->user->id }}" card_id="{{ $staff->user->cards[0]->id }}" class="btn btn-danger" id="bloquerCarte"><i class="fa fa-lock"></i></button>

                                    @else

                                    <button user_id="{{ $staff->user->id }}" card_id="{{ $staff->user->cards[0]->id }}" class="btn btn-warning" id="debloquerCarte"><i class="fa fa-unlock-alt"></i></button>

                                    @endif

                                </td>

                                @endif

                            </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

                @endif

            </div>

            @if($staff->categorie != "smopaye")
            @php
                
            @endphp
            <div class="row">

                            <div class="col-12">

                                <!-- Table-->

                                <div class="table-responsive">

                                    <table class="table my-4">

                                        <tbody>

                                        <tr>

                                            <th class="px-0">Total debit</th>

                                            <td class="px-0"></td>

                                            <td class="px-0 text-right">{{$nbreDebit}}</td>
                                            <td class="px-0 text-right">{{$amountDebit}} FCFA</td>

                                        </tr>

                                        <tr>

                                            <th class="px-0">Total tranfert</th>

                                            <td class="px-0"></td>

                                            <td class="px-0 text-right">{{$transfert}}</td>
                                            <td class="px-0 text-right">{{$transfertAmount}} FCFA</td>

                                        </tr>

                                        <tr>

                                            <th class="px-0">Total retrait compte</th>

                                            <td class="px-0"></td>

                                            <td class="px-0 text-right">{{$retraitCompte}}</td>
                                            <td class="px-0 text-right">{{$amountRetraitCompte}} FCFA</td>

                                        </tr>

                                        <tr>

                                            <th class="px-0">Total retrait carte</th>

                                            <td class="px-0"></td>

                                            <td class="px-0 text-right">{{$retraitCarte}}</td>
                                            <td class="px-0 text-right">{{$amountRetraitCarte}} FCFA</td>

                                        </tr>

                                        <tr>

                                            <th class="px-0">Total transaction QR-CODE</th>

                                            <td class="px-0"></td>

                                            <td class="px-0 text-right">{{$nbreQrcode}}</td>
                                            <td class="px-0 text-right">{{$amountQrcode}} FCFA</td>

                                        </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                            

            </div>

            @else

            <h1 class="h3 display mb-2 mb-sm-0"> LISTE DES UTILISATEURS EZPASS CREE PAR: <b> {{$staff->lastname}} {{$staff->firstname}}</b>@if(array_key_exists(0, $staff->roles)) ({{$staff->roles[0]->name}}) @endif</h1><br>

            <div class="table-responsive">

                        <table id="datatable1" style="width: 100%;" class="table">

                            <thead>

                            <tr>

                                <th>Date</th>

                                <th>Nom et prenom</th>

                                <th>Telephone</th>

                                <th>Genre</th>

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

                                @if(array_key_exists(0, $user->particulier))

                                <td>{{$user->particulier[0]->lastname}} {{$user->particulier[0]->firstname}}</td>

                                @else

                                <td>aucun</td>

                                @endif

                                <td>{{$user->phone}}</td>

                                @if(array_key_exists(0, $user->particulier))

                                <td>{{$user->particulier[0]->gender}}</td>

                                @else

                                <td>aucun</td>

                                @endif

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

                                @if(array_key_exists(0, $user->particulier))

                                <a href="/public/particulier/{{ $user->particulier[0]->id }}" class="btn btn-warning"><i class="fa fa-eye"></i> Voir profil </a>

                                @else

                                aucune

                                @endif

                                     

                                </td>

                            </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

            @endif

        </div>

    </section>

@endsection