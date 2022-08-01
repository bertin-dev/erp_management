@extends('layouts.index')
@section('content')
<!-- navbar-->
    @include('layouts.navbar')
<div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"> carte E-ZPASS non utilisees  </li>
            </ul>
        </div>
    </div>
    <section id="carte_libre_attribuer">
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">CARTE E-ZPASS NON UTILISEES   </h1>
            </header>
            <div class="card">
                <div class="card-header">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success" style="background-color: white;border-color: white; color: black"><i class="glyphicon-credit-card"></i>Nouvelle Carte   </button>
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog" style="max-width: 700px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 id="exampleModalLabel" class="modal-title"> Nouvelle carte  </h2>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Entrer les informations concernant la nouvelle carte</p>
                                    <form class="form-validate" method="POST" action="/card/">
                                        @csrf
                                        @method('POST');

                                        <div class="form-group">
                                            <label>Numero de carte</label>
                                            <input name="code_number" type="text" placeholder="Numero de carte" required data-msg="Entrer le numero de la carte s'il vous plait" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de serie</label>
                                            <input name="serial_number" type="text" placeholder="Numero de serie de la carte" required data-msg="Entrer le numero de la carte s'il vous plait" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>date d'expiration</label>
                                            <input name="end_date" type="date" class="form-control input-datepicker" required data-msg="Entrer la date de creation de la carte"  class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Enregistrer" class="btn btn-primary">
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
                        <table id="datatable1" style="width: 100%;" class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Numero de carte</th>
                                <th>Numero de serie</th>
                                <th>Date de creation</th>
                                <th>Date d'expiration</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cartes as $carte)
                                <tr>
                                    <td>{{$carte->code_number}}</td>
                                    <td>{{$carte->serial_number}}</td>
                                    <td>{{$carte->starting_date}}</td>
                                    <td>{{$carte->end_date}}</td>
                                    <td>
                                        <button id="postattribuer" code_number="{{$carte->code_number}}" type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-default" ><i class="glyphicon-credit-card"></i>Attribuer la carte </button>
                                        <a href="{{ route('editCarte', ['card_id' => $carte->id]) }}" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog" style="max-width: 700px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 id="exampleModalLabel" class="modal-title"> Attribuer la carte </h2>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Attribuer une carte a un utlisateur</p>
                                                    <form class="form-validate">
                                                        <div class="form-group">
                                                            <label>Numero de carte</label>
                                                            <input id="code_number" type="text" required data-msg="Entrer le numero de la carte s'il vous plait" class="form-control">
                                                        </div>
                                                        <div class="form-group form-group-typeahead">
                                                            <input id="typeahead4" token="{{Session::get('access_token')}}" type="text" placeholder="Inscrivez le nom  d'un utilisateur s'il vous plait" class="form-control">
                                                        </div>
                                                        <pre class="mt-3">
                                                        </pre>
                                                        <div class="form-group">
                                                            <button id="AttributionCarte" class="btn btn-primary">Attribuer la Carte</button>
                                                        </div>
                                                      </form>
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
        </div>
    </section>
@endsection