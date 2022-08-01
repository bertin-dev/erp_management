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
                <li class="breadcrumb-item active">Catégorie E-ZPass    </li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Nos Catégories d'Utilisateurs</h1>
            </header>
            <div class="card">
                <div class="card-header">
                <div id="categorieTarifaire">
                                    <form class="modal-title form-inline">
                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Nom categorie</label>
                                            <input id="nameCategorie" type="text" placeholder="nom categorie" class="mr-3 form-control form-control transaction">
                                        </div>

                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Bonus</label>
                                            <input id="bonusCategorie" type="text" placeholder="bonus categorie" class="mr-3 form-control form-control transaction">
                                        </div>

                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Remise</label>
                                            <input id="remiseCategorie" type="text" placeholder="remise sur la categorie" class="mr-3 form-control form-control transaction">
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
                        <button type="button" class="btn btn-warning" style="float: right; margin-right:10px;"><i class="fa fa-print"></i> Imprimer</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                                        <table id="datatable1" style="width: 100%;" class="table"> 
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Designation</th>
                                                <th>Role</th>
                                                <th>Bonus Points</th>
                                                <th>Remise (%)</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody id="liste_des_categories" token="{{Session::get('access_token')}}">
                                            @foreach($categories as $categorie)
                                                <tr>
                                                    <td>{{ $categorie->id }}</td>
                                                    <td>{{ $categorie->name }}</td>
                                                    <td>{{ $categorie->role->name }}</td>
                                                    <td>{{ $categorie->bonus_point }}</td>
                                                    <td>{{ $categorie->remise }}</td>
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
            </div>
        </div>
    </section>
@endsection
