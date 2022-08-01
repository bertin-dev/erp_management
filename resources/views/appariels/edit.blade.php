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

                <li class="breadcrumb-item active">Modification de l'appariel: {{$device->serial_number}}   </li>

            </ul>

        </div>

    </div>

    <section>

        <div class="container-fluid">

            <p>Modifier les informations concernant l'appariel: {{$device->serial_number}}</p>

            <form class="form-validate" method="POST" action="{{route('updateDevice', ['device_id'=>$device->id]) }}">

            @csrf

            @method('PUT')

                <div class="form-group">

                    <label>Type appareil</label>

                    <select name="device_type" class="form-control" required data-msg="Veuillez selectionner le genre s'il vous plait">

                        <option>TPE</option>

                        <option>Kit NFC</option>

                        <option>Telephone</option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Designation du l'appariel</label>

                    <input value="{{$device->designation}}" name="designation" type="text" placeholder="Designation de l'appariel" required data-msg="Entrer la designation de l'appareil s'il vous plait" class="form-control">

                </div>

                <div class="form-group">

                    <label>Numero de serie</label>

                    <input value="{{$device->serial_number}}" name="serial_number" type="text" placeholder="Numero de serie de l'appariel" required data-msg="Entrer le numero de l'appareil s'il vous plait" class="form-control">

                </div>

                <div class="form-group">

                    <label>Fournisseur</label>

                    <input value="{{$device->provider}}" name="provider" type="text" placeholder="fournisseur" required data-msg="Entrer le fournisseur" class="form-control">

                </div>

                

                <div class="form-group">

                    <label>Passerel</label>

                    <input value="{{$device->passerel}}" name="passerel" type="text" placeholder="passerel" required data-msg="Entrer la passerel" class="form-control">

                </div>

                

                <div class="form-group">

                    <label>Branche</label>

                    <input value="{{$device->branch}}" name="branch" type="text" placeholder="branch" required data-msg="Entrer la designation de l'appareil s'il vous plait" class="form-control">

                </div>



                

                <div class="form-group">

                    <label>Fabricant</label>

                    <input value="{{$device->manifacturer}}" name="manifacturer" type="text" placeholder="manifacturer" required data-msg="Entrer la designation de l'appareil s'il vous plait" class="form-control">

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

    </section>

@endsection