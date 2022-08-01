@extends('layouts.index')
@section('content')
<!-- navbar-->
    @include('layouts.navbar')
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                <li class="breadcrumb-item"><a href="/staffs">personnels</a></li>
                <li class="breadcrumb-item active">{{$staff->enterprise->raison_social}}</li>
            </ul>
        </div>
    </div>
    <section id="staffs" >
        <div class="container-fluid">
            <!-- Page Header-->
            <p>Edition de l'utilisateur "{{$staff->enterprise->raison_social}}"</p>
            <form class="form-validate" method="POST" action=" {{ route('updateEntreprise', ['user_id'=>$staff->enterprise->id])}}">
                    @csrf
                    @method('PUT')
                                            <div class="form-group">
                                                <label>Raison Social</label>
                                                <input value="{{$staff->enterprise->raison_social}}" id="raison_social" name="raison_social" type="text" placeholder="Raison Social" required data-msg="Entrer la raison social" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>RCCM</label>
                                                <input value="{{$staff->enterprise->rccm}}" id="rccm" name="rccm" type="text" placeholder="RCCM" required data-msg="Entrer le RCCM s'il vous plait"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input value="{{$staff->enterprise->status}}" id="status" name="status" type="text" placeholder="status" required data-msg="Entrer le status s'il vous plait" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input value="{{$staff->user->phone}}" id="phone" name="phone" type="text" placeholder="Telephone" required data-msg="Entrer le numero de telephone s'il vous plait"class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Adresse</label>
                                                <input value="{{$staff->user->address}}" id="address" name="address" type="text" placeholder="localisation de l'entreprise" required data-msg="Entrer le numero de telephone s'il vous plait"class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Categorie Utilisateur</label>
                                                <select id="liste_des_categories" name="categorie" class="form-control" required data-msg="Veuillez selectionner un role d'utilisateur s'il vous plait">
                                                    @foreach($staff->categories as $categorie)
                                                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Role Utilisateur</label>
                                                <select id="liste_des_roles" token="{{Session::get('access_token')}}" name="role" class="form-control" required data-msg="Veuillez selectionner un role d'utilisateur s'il vous plait">
                                                    @foreach($roles as $role)
                                                    <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group" id="bloc_de_permissions">
                                                <label>Selectionner les permissions</label>
                                                <div id="liste_des_permissions_cochable">
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" id="submit">Enregistrer</button>
                                            </div>
                                        </form>
        </div>
    </section>
@endsection