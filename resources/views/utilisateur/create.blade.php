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
                <li class="breadcrumb-item active">Creation</li>
            </ul>
        </div>
    </div>
    <section id="staffs" >
        <div class="container-fluid">
            <!-- Page Header-->
            <p>Nouveau utilisateur</p>
            <form class="form-validate" method="POST" action="{{ route('storeUser') }}">
                    @csrf
                    @method('POST')
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input value="" id="firstname" name="firstname" type="text" placeholder="Nom" required data-msg="Entrer le nom s'il vous plait" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Prenom</label>
                                                <input value="" id="lastname" name="lastname" type="text" placeholder="Prenom"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input value="" id="phone" name="phone" type="text" placeholder="Telephone" required data-msg="Entrer le numero de telephone s'il vous plait"class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input value="" id="email" name="email"  placeholder="Email" name="form2-email" type="email" required data-msg="Entrer un mail valide s'il vous plait" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>CNI</label>
                                                <input value="" id="cni" name="cni" placeholder="numéro carte nationale d'identité" name="cni" type="text" required data-msg="Entrer un mail valide s'il vous plait" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Localisation</label>
                                                <input value="" id="address"  placeholder="adresse de domiciliation" name="address" type="text" required data-msg="Entrer un mail valide s'il vous plait" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Fonction</label>
                                                <input value="" id="fonction"  placeholder="fonction" name="fonction" type="text" required data-msg="Entrer un mail valide s'il vous plait" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Genre</label>
                                                <select id="genre" name="gender" class="form-control" required data-msg="Veuillez selectionner une fonction s'il vous plait">
                                                    <option value="masculin">MASCULIN</option>
                                                    <option value="feminin">FEMININ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Categorie Utilisateur</label>
                                                <select id="liste_des_categories" name="categorie" class="form-control" required data-msg="Veuillez selectionner un role d'utilisateur s'il vous plait">
                                                    @foreach($categories as $categorie)
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