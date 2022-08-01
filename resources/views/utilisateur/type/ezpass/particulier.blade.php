@extends('layouts.index')
@section('content')
<!-- navbar-->
@include('layouts.navbar')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Utilisateurs E-ZPASS   </li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Utilisateurs E-ZPASS </h1>
            </header>
            <div class="card">
                <div class="card-header">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success" style="background-color: white;border-color: white; color: black"><i class="icon-user"></i>Nouvel utilisateur E-ZPASS</button>
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog" style="max-width: 681px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 id="exampleModalLabel" class="modal-title">Nouvel utilisateur E-ZPASS</h2>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Entrer les informations concernant le Nouvel utilisateur E-ZPASS</p>
                                    <form class="form-validate">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" placeholder="Nom" required data-msg="Entrer le nom s'il vous plait" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Prenom</label>
                                            <input type="text" placeholder="Prenom"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input type="text" placeholder="Telephone" data-mask="(999) 9-99-99-99-99" required data-msg="Entrer le numero de telephone s'il vous plait"class="form-control"><span class="font-13 text-muted">(327) 697-99-99-99</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Genre</label>
                                            <select name="account" class="form-control" required data-msg="Veuillez selectionner le genre sùil vous plait">
                                                <option>Feminin</option>
                                                <option>Masculin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Addresse</label>
                                            <input type="text" placeholder="address" required data-msg="Entrer votre addresse s'il vous plait" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Piece d'identification</label>
                                            <select name="account" class="form-control" required data-msg="Veuillez selectionner une piece d'identification">
                                                <option></option>
                                                <option>CNI</option>
                                                <option>Passport</option>
                                                <option>Carte de sejour</option>
                                                <option>recipicee</option>
                                                <option>carte d'eleve</option>

                                            </select>
                                            <label>Numero de la piece</label>
                                            <input type="text" placeholder="Numero" required data-msg="Entrer votre addresse s'il vous plait" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label>Session</label>
                                            <select name="account" class="form-control" required data-msg="Veuillez selectionner une session s'il vous plait">
                                                <option></option>
                                                <option>Utilisateur</option>
                                                <option>Accepteur</option>
                                                <option>Administrateur</option>
                                                <option>Agent</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Groupe utilisateur</label>
                                            <select name="account" class="form-control" required data-msg="Veuillez selectionner une categorie d'utilisateur s'il vous plait">
                                                <option>Groupe utilisateur</option>
                                                <option>moto_taxis</option>
                                                <option>chauffeur</option>
                                                <option>particulier</option>
                                                <option>smopaye</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de carte</label>
                                            <input type="text" placeholder="numero de carte" required data-msg="Entrer votre addresse s'il vous plait" class="form-control">
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
                        <table id="datatable1" style="width: 100%;" class="table">
                            <thead>
                            <tr>
                                <th>Nom et prenom</th>
                                <th>Telephone</th>
                                <th>Genre</th>
                                <th>N° compte</th>
                                <th>N° carte</th>
                                <th>Date de creation</th>
                                <th>Etat</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($particuliers as $particulier)
                            <tr>
                                <td>{{$particulier->lastname}} {{$particulier->firstname}}</td>
                                <td>{{$particulier->user->phone}}</td>
                                <td>{{$particulier->gender}}</td>
                                @if($particulier->user->compte)
                                <td>{{$particulier->user->compte->account_number}}</td>
                                @else
                                <td>aucun</td>
                                @endif
                                @if(array_key_exists(0, $particulier->user->cards))
                                <td>{{$particulier->user->cards[0]->code_number}}</td>
                                @else
                                <td>aucune</td>
                                @endif
                                <td>{{date('d-m-Y h:m:s', strtotime($particulier->user->created_at))}}</td>
                                <td>{{$particulier->user->state}}</td>
                                <td> 
                                    <a href="{{ route('detailUser', ['user_id'=>$particulier->id]) }}" class="btn btn-warning"><i class="fa fa-eye"></i> Voir profil </a> 
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