@extends('layouts.index')
@section('content')
<!-- navbar-->
@include('layouts.navbar')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
                <li class="breadcrumb-item active">Toutes les Entreprise   </li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Toutes les Entreprises </h1>
            </header>
            <div class="card">
                <div class="card-header">
                    <a href="{{route('createEntreprise')}}" class="btn btn-warning"><i class="fa fa-user"></i> Nouvelle Entreprise</a>

                    <button type="button" class="btn btn-success" style="float: right"><i class="fa fa-print"></i> Imprimer</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table">
                            <thead>
                            <tr>
                                <th>Raisons socials</th>
                                <th>Telehone</th>
                                <th>Adresses</th>
                                <th>Sessions</th>
                                <th>Categories</th>
                                <th>Compte</th>
                                <th>Carte</th>
                                @if(Session::get('role') == "Administrateur")
                                <th>Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody id="form_entreprise_device">
                            @foreach($ets as $et)
                            <tr>
                                <td>{{$et->raison_social}}</td>
                               <td>{{$et->phone}}</td>
                                <td>{{$et->address}}</td>
                                @if($et->namerole)
                                <td>{{$et->namerole}}</td>
                                @else
                                <td>aucun</td>
                                @endif
                                @if($et->name)
                                <td>{{$et->name}}</td>
                                @else
                                <td>aucun</td>
                                @endif
                                @if($et->account_number)
                                <td>{{$et->account_number}}</td>
                                @else
                                <td>aucun</td>
                                @endif
                                @if($et->code_number)
                                <td>{{$et->code_number}}</td>
                                @else
                                <td>aucun</td>
                                @endif
                               <td>
                               <a href="{{ route('showEntreprise', ['user_id' => $et->id]) }}" class="btn btn-success" ><i class="fa fa-eye"></i></a>
                                @if(Session::get('role') == "Administrateur")
                                    <a href="" id="attribution" id_entreprise="{{$et->id}}" raison="{{$et->raison_social}}" class="btn btn-info" data-toggle="modal" data-target="#myModal1"><i class="fa fa-arrow-right"></i></a>
                                    <a href="{{ route('editEntreprise', ['user_id' => $et->id]) }}" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                                    <div id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog" style="max-width: 700px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 id="exampleModalLabel" class="modal-title"> Attribuer le TPE  </h2>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Attribuer un TPE a une Entreprise</p>
                                                    <div class="form-validate" id="post_entreprise_device">
                                                        <div class="form-group">
                                                            <label>Raison Social de l'entreprise</label>
                                                            <input type="text" id="id_entreprise" required data-msg="Entrer le numero de la carte s'il vous plait" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Debut de Possession</label>
                                                            <input type="date" id="starting_date" required data-msg="Entrer la date du debut de possession s'il vous plait" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Fin de Possession</label>
                                                            <input type="date" id="end_date" required data-msg="Entrer la date de fin de possession s'il vous plait" class="form-control">
                                                        </div>
                                                        <div class="form-group form-group-typeahead">
                                                            <input id="typeahead3" token="{{Session::get('access_token')}}" type="text" placeholder="Inscrivez les references de l'appareil s'il vous plait" class="form-control">
                                                        </div>
                                                        <pre class="mt-3">
                                                        </pre>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" id="postAttribution">Attribuer le Terminal Paiement</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
