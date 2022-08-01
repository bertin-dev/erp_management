@extends('layouts.index')

@section('content')

<!-- navbar-->

    @include('layouts.navbar')

<div class="breadcrumb-holder">

        <div class="container-fluid">

            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>

                <li class="breadcrumb-item active"> Equipements Electroniques </li>

            </ul>

        </div>

    </div>

    <section>

        <div class="container-fluid">

            <!-- Page Header-->

            <header>

                <h1 class="h3 display">Equipements Electroniques </h1>

            </header>

            <div class="card">

                <div class="card-header">

                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success" style="background-color: white;border-color: white; color: black"><i class="glyphicon-credit-card"></i>Nouvel  Appareil </button>

                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">

                        <div role="document" class="modal-dialog" style="max-width: 700px">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h2 id="exampleModalLabel" class="modal-title">Nouvel Appareil  </h2>

                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>

                                </div>

                                <div class="modal-body">

                                    <p>Entrer les informations concernant le Nouvel  Appareil</p>

                                    <form class="form-validate" method="POST" action="/device/">

                                        @csrf

                                        @method('POST')

                                            <div class="form-group">

                                                <label>Type appareil</label>

                                                <select name="device_type" class="form-control" required data-msg="Veuillez selectionner le genre s'il vous plait">

                                                    <option>TPE</option>

                                                    <option>Kit NFC</option>

                                                    <option>TELEPHONE</option>

                                                </select>

                                            </div>

                                            <div class="form-group">

                                                <label>Numero de serie</label>

                                                <input name="serial_number" type="text" placeholder="Numero de serie de l'appariel" required data-msg="Entrer le numero de l'appareil s'il vous plait" class="form-control">

                                            </div>

                                            <div class="form-group">

                                                <label>Fournisseur</label>

                                                <input  name="provider" type="text" placeholder="fournisseur" required data-msg="Entrer le fournisseur" class="form-control">

                                            </div>

                                            

                                            <div class="form-group">

                                                <label>Passerel</label>

                                                <input name="passerel" type="text" placeholder="passerel" required data-msg="Entrer la passerel" class="form-control">

                                            </div>

                                            

                                            <div class="form-group">

                                                <label>Branche</label>

                                                <input name="branch" type="text" placeholder="branch" required data-msg="Entrer la designation de l'appareil s'il vous plait" class="form-control">

                                            </div>



                                            

                                            <div class="form-group">

                                                <label>Fabricant</label>

                                                <input name="manifacturer" type="text" placeholder="manifacturer" required data-msg="Entrer la designation de l'appareil s'il vous plait" class="form-control">

                                            </div>

                                            

                                            <div class="form-group">

                                                <label>support</label>

                                                <select name="mobile" class="form-control" required data-msg="Veuillez selectionner le genre s'il vous plait">

                                                    <option>portable</option>

                                                    <option>fixe</option>

                                                </select>

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

                    <button onclick="window.history.back()" class="btn btn-warning" style="margin-left:12px; float: right"><i class="fa fa-arrow-left"></i> Retourner</button>

                    <button type="button" class="btn btn-danger" style="float: right"><i class="fa fa-print"></i> Imprimer</button>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table id="datatable1" style="width: 100%;" class="table">

                            <thead>

                            <tr>

                                <th>Designation</th>

                                <th>Type appareil</th>

                                <th>Numero serie</th>

                                <th>Fournisseur</th>

                                <th>Date creation</th>

                                <th>Status</th>

                                <th>Entreprise d'attribution</th>

                                <th>Action</th>

                            </tr>

                            </thead>

                            <tbody id="liste_des_devices">

                            @foreach($devices as $device)

                            <tr>

                                <td>{{$device->designation}}</td>

                                <td>{{$device->device_type}}</td>

                                <td>{{$device->serial_number}}</td>

                                <td>{{$device->provider}}</td>

                                <td>{{$device->created_at}}</td>

                                @if(array_key_exists(0, $device->entreprises))

                                <td>occupè</td>

                                @else

                                <td>libre</td>

                                @endif

                                @if(array_key_exists(0, $device->entreprises))

                                <td>{{$device->entreprises[0]->raison_social}}</td>

                                @else

                                <td>non attribuer</td>

                                @endif

                                <td>

                                    <a href="{{route('editDevice', ['device_id'=>$device->id])}}" class="btn btn-success" ><i class="fa fa-eye"></i></a>

                                    <button id="device_delete" token="{{Session::get('access_token')}}" type="button" class="btn btn-danger" data-deviceid="{{$device->id}}"><i class="fa fa-trash"></i></button>

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