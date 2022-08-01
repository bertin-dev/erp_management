@extends('layouts.index')
@section('content')
<!-- navbar-->
@include('layouts.navbar')
      <!-- Counts Section -->
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
                <li class="breadcrumb-item active">Tarif E-ZPass    </li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Nos grilles tarifaires</h1>
            </header>
            <div class="card">
                <div class="card-header">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fa fa-plus"></i> Nouvelle tarification</button>
                    <button type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-info" style="float:right"><i class="fa fa-list"></i> Categorie des tarifs</button>
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog" style="max-width: 700px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 id="exampleModalLabel" class="modal-title">Nouvelle tarification  </h2>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Entrer les informations concernant la nouvelle  tarification</p>
                                    <form class="form-validate" method="POST" action="{{ route('storeTarifs') }}">
                                    @csrf
                                    @method('POST')
                                        <div class="form-group">
                                            <label>Catégorie du Tarif</label>
                                            <select  id="categorie_id_tarif" name="categorie_id[]" multiple class="form-control">
                                                @foreach($categories as $categorie)
                                                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Role associer a la catégorie</label>
                                            <select  id="role_id_tarif" name="role_id" class="mr-3 form-control form-control transaction" >
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Type du Tarif</label>
                                            <select  id="type_tarif" name="type_tarif" class="mr-3 form-control form-control transaction" >
                                                    <option value="%"> Montant (%) </option>
                                                    <option value="FCFA" selected> Montant (FCFA)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tranche minimale</label>
                                            <input type="number" placeholder="tranche minimale" required data-msg="Entrer la tranche minimale s'il vous plait" class="form-control" name="tranche_min">
                                        </div>
                                        <div class="form-group">
                                            <label>Tranche maximale</label>
                                            <input type="number" placeholder="tranche maximale" required data-msg="Entrer la tranche maximale s'il vous plait" class="form-control" name="tranche_max">
                                        </div>
                                        <div class="form-group">
                                            <label>Tarif jour</label>
                                            <input type="number" placeholder="Tarif jour" required data-msg="Entrer le tarif jour s'il vous plait" class="form-control" name="tarif_day">
                                        </div>
                                        <div class="form-group">
                                            <label>Tarif nuit</label>
                                            <input type="number" placeholder="tarif nuit" required data-msg="Entrer le tarif nuit  s'il vous plait" class="form-control" name="tarif_night">
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
                    <div id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade bd-example-modal-xl">
                        <div role="document" class="modal-dialog modal-xl" style="max-width:700px">
                            <div class="modal-content">
                                <div id="categorieTarifaire" class="modal-header">
                                    <form class="modal-title form-inline">
                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Nom categorie</label>
                                            <input id="nameCategorie" type="text" placeholder="nom categorie" class="mr-3 form-control form-control transaction">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Role</label>
                                            <select  id="role_id" name="categorie" class="mr-3 form-control form-control transaction" >
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <button id="saveCategorie" class="mr-3 btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Toutes les categories de tarifications</p>
                                    <div class="table-responsive">
                                        <table style="width: 100%;" class="table">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Designation</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody id="liste_des_categories" token="{{Session::get('access_token')}}">
                                            @foreach($categories as $categorie)
                                                <tr>
                                                    <td>{{ $categorie->id }}</td>
                                                    <td>{{ $categorie->name }}</td>
                                                    <td>
                                                    <a href="/categorie/{{ $categorie->id }}/edit" id="tarif_view" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button id="categorie_delete" type="button" class="btn btn-danger" data-categorieid="{{$categorie->id}}"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-warning" style="float: right; margin-right:10px;"><i class="fa fa-print"></i> Imprimer</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tranche minimale</th>
                                <th>Tranche maximale</th>
                                <th>Tarif jour</th>
                                <th>Tarif nuit</th>
                                <th>Categorie</th>
                                <th>Role</th>
                                <th>Date de creation</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="liste_des_tarifs">
                            @foreach($tarifs as $tarif)
                                <tr>
                                    <td>{{ $tarif->id }}</td>
                                    <td>{{ $tarif->tranche_min }}</td>
                                    <td>{{ $tarif->tranche_max }}</td>
                                    <td>{{ $tarif->tarif_day }} {{$tarif->type_tarif}}</td>
                                    <td>{{ $tarif->tarif_night }} {{$tarif->type_tarif}}</td>
                                    <td><b>{{ $tarif->categorie->name }}</b></td>
                                    @if(!is_null($tarif->role))
                                    <td><b>{{ $tarif->role->name }}</b></td>
                                    @else
                                    <td>Aucun role</td>
                                    @endif
                                    <td>{{ $tarif->created_at }}</td>
                                    <td>
                                    <a href=" {{ route('editTarif', ['tarif_id'=>$tarif->id]) }}" id="tarif_view" class="btn btn-warning" data-tarifid="{{ $tarif->id }}"><i class="fa fa-edit"></i></a>
                                    <button id="tarif_delete" token="{{Session::get('access_token')}}" type="button" class="btn btn-danger" data-tarifid="{{$tarif->id}}"><i class="fa fa-trash"></i></button>
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
