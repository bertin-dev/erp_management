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
                <li class="breadcrumb-item active">Campagnes E-ZPass    </li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Campagnes</h1>
            </header>
            <div class="card">
                <div class="card-header">
                <div>
                <form class="form-validate form-inline" method="POST" action="{{route('postCampagne')}}">

                                    @csrf

                                    @method('POST')
                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Date de début</label>
                                            <input id="dateDebutCampagne" type="date" class="mr-3 form-control form-control transaction" name="dateDebutCampagne">
                                        </div>

                                        <div class="form-group">
                                        <label for="inlineFormInputGroup" class="sr-only">Date de Fin</label>
                                            <input id="dateFinCampagne" type="date" class="mr-3 form-control form-control transaction" name="dateFinCampagne">
                                        </div>

                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Remise</label>
                                            <input id="remiseCampagne" type="number" placeholder="remise de la campagne" class="mr-3 form-control form-control transaction" name="remiseCampagne">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Categorie</label>
                                            <select  id="categorie_id" name="categorie" class="mr-3 form-control form-control transaction" >
                                                @foreach($categories as $categorie)
                                                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <button id="saveCategorie" type="submit" class="mr-3 btn btn-primary">Enregistrer</button>
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
                                                <th>Categorie</th>
                                                <th>Remise</th>
                                                <th>Date de Debut</th>
                                                <th>Date de Fin</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody id="liste_des_categories" token="{{Session::get('access_token')}}">
                                            @foreach($campagnes as $campagne)
                                                <tr>
                                                    <td>{{ $campagne->id }}</td>
                                                    <td>{{ $campagne->categorie->name }}</td>
                                                    <td>{{ $campagne->discount }} %</td>
                                                    <td>{{ $campagne->starting_date }}</td>
                                                    <td>{{ $campagne->end_date }}</td>
                                                    <td>
                                                    <a href="/campagne/{{ $campagne->id }}/edit" id="tarif_view" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button id="campagne_delete" type="button" class="btn btn-danger" data-categorieid="{{$campagne->id}}"><i class="fa fa-trash"></i></button>
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
