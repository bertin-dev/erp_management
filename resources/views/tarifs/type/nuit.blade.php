@extends('layouts.index')
@section('content')
<!-- navbar-->
    @include('layouts.navbar')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
                <li class="breadcrumb-item active"> carte E-ZPASS deja utilisees  </li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">CARTE E-ZPASS DEJA UTILISEES </h1>
            </header>
            <div class="card">
                <div class="card-header">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success" style="background-color: white;border-color: white; color: black"><i class="glyphicon-credit-card"></i>Nouvelle Carte   </button>
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog" style="max-width: 700px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 id="exampleModalLabel" class="modal-title"> Nouvelle card  </h2>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Entrer les informations concernant la nouvelle carte</p>
                                    <form class="form-validate">
                                        <div class="form-group">
                                            <label>Numero de carte</label>
                                            <input type="text" placeholder="Numero de carte" required data-msg="Entrer le numero de la carte s'il vous plait" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de serie</label>
                                            <input type="text" placeholder="Numero de serie de la carte" required data-msg="Entrer le numero de la carte s'il vous plait" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>date de creation</label>
                                            <input type="date" value="10/20/2017" class="form-control input-datepicker" required data-msg="Entrer la date de creation de la carte">
                                        </div>
                                        <div class="form-group">
                                            <label>date d'expiration</label>
                                            <input type="text" value="10/20/2017" class="form-control input-datepicker" required data-msg="Entrer la date de creation de la carte"  class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Signin" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" style="float: right">Imprimer</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table">
                            <thead>
                            <tr>
                                <th>Numero de carte</th>
                                <th>Numero de serie</th>
                                <th>Date de creation</th>
                                <th>Date d'expiration</th>
                                <th>UNITE</th>
                                <th>DEPOT</th>
                                <th>Nom du possesseur de la carte</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartes as $carte)
                            <tr>
                                <td>{{$carte->code_number}}</td>
                                <td>{{$carte->code_number}}</td>
                                <td>{{$carte->starting_date}}</td>
                                <td>{{$carte->end_date}}</td>
                                <td>{{$carte->unity}}</td>
                                <td>{{$carte->deposit}}</td>
                                @if($carte->user->particulier)
                                <td>{{$carte->user->particulier[0]->firstname}}</td>
                                @endif
                                @if($carte->user->enterprise)
                                <td>{{$carte->user->enterprise[0]->raison_social}}</td>
                                @endif
                                <td> <button type="button" class="btn btn-success" ><i class="icon-trash"></i>Modifier</button>
                                    <button type="button" class="btn btn-danger" >supprimer</button>
                                    <button data-toggle="dropdown" type="button" class="btn btn-primary dropdown-toggle">Autres<span class="caret"></span></button>
                                    <div class="dropdown-menu"><a href="#" class="dropdown-item">Historique de transaction</a><a href="#" class="dropdown-item">historique sous comptes</a><a href="#" class="dropdown-item">Something else here</a>
                                        <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Separated link</a>
                                    </div>
                                </td>
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