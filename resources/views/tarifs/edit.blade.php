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
            <p>Modifier les informations concernant la tarification n°: {{$tarif->id}}</p>
            <form class="form-validate" method="POST" action="{{ route('updateTarif', ['tarif_id'=>$tarif->id]) }}">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label>Catégorie du Tarif</label>
                    <select  id="categorie_id_tarif" name="categorie_id" class="mr-3 form-control form-control transaction" >
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
                    <input type="number" placeholder="tranche minimale" required data-msg="Entrer la tranche minimale s'il vous plait" class="form-control" value="{{$tarif->tranche_min}}" name="tranche_min">
                </div>
                <div class="form-group">
                    <label>Tranche maximale</label>
                    <input type="number" placeholder="tranche maximale" required data-msg="Entrer la tranche maximale s'il vous plait" class="form-control" value="{{$tarif->tranche_max}}" name="tranche_max">
                </div>
                <div class="form-group">
                    <label>Tarif jour</label>
                    <input type="number" placeholder="Tarif jour" required data-msg="Entrer le tarif jour s'il vous plait" class="form-control" value="{{$tarif->tarif_day}}" name="tarif_day">
                </div>
                <div class="form-group">
                    <label>Tarif nuit</label>
                    <input type="number" placeholder="tarif nuit" required data-msg="Entrer le tarif nuit  s'il vous plait" class="form-control" value="{{$tarif->tarif_night}}" name="tarif_night">
                </div>
                <div class="form-group">
                    <input type="submit" value="Enregistrer" class="btn btn-primary">
                </div>
            </form>
        </div>
    </section>
@endsection