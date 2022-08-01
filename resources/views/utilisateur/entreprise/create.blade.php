@extends('layouts.index')
@section('content')
<!-- navbar-->
    @include('layouts.navbar')
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{route('entreprise')}}">Entreprises</a></li>
                <li class="breadcrumb-item active">Creation</li>
            </ul>
        </div>
    </div>
    <section id="staffs" >
        <div class="container-fluid">
            <!-- Page Header-->
            <p>Entrer les informations concernant la nouvelle entreprise</p>
                                    
                            <form class="form-validate" method="POST" action="{{ route('storeEnterprise') }}">
                                    @csrf
                                    @method('POST')
                                        <div class="form-group">
                                            <label>Nom de l'entreprise </label>
                                            <input name="raison_social" type="text" placeholder="Nom" required data-msg="Entrer le nom de l'entrepise s'il vous plait" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Juridique </label>
                                            <input name="status" type="text" required data-msg="Entrer le status juridique s'il vous plait" placeholder="EX: SA, SARL,SAS"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Numero RCCM</label>
                                            <input name="rccm" type="text" required data-msg="Entrer le numero RCCM s'il vous plait" placeholder="EX: RC/YAO/2018/B/820"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input name="phone" type="text" placeholder="Telephone" data-mask="(999) 9-99-99-99-99" required data-msg="Entrer le numero de telephone s'il vous plait"class="form-control"><span class="font-13 text-muted">(327) 697-99-99-99</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input  name="address" placeholder="Addresse" name="form2-address" type="text" required data-msg="Entrer l'addresse s'il vous plait" class="form-control">
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
                                                <label>Role ou Session Utilisateur</label>
                                                <select id="liste_des_roles" token="{{Session::get('access_token')}}" name="role" class="form-control" required data-msg="Veuillez selectionner un role d'utilisateur s'il vous plait">
                                                    @foreach($roles as $role)
                                                    <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        <div class="form-group">
                                            <input type="submit" value="ENREGISTRER" class="btn btn-lg btn-primary">
                                        </div>
                                    </form>
        </div>
    </section>
@endsection