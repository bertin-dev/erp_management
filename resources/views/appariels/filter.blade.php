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
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table">
                            <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Numero serie</th>
                                <th>Fournisseur</th>
                                <th>date creation</th>
                                <th>Entreprise d'attribution</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="liste_des_devices">
                            @foreach($devices as $device)
                            <tr>
                                <td>{{$device->device_type}}</td>
                                <td>{{$device->serial_number}}</td>
                                <td>{{$device->provider}}</td>
                                <td>{{$device->created_at}}</td>
                                <td>SANTA LUCIA</td>
                                <td style="width: 120px;">
                                    @if(!empty($device->entreprise))
                                    <button type="button" class="btn btn-warning" ><i class="icon-trash"></i>Desatribue</button>
                                    @else
                                    <a href="/device/{{$device->id}}" class="btn btn-success" ><i class="fa fa-eye"></i></a>
                                    <button id="device_delete" token="{{Session::get('access_token')}}" type="button" class="btn btn-danger" data-deviceid="{{$device->id}}"><i class="fa fa-trash"></i></button>
                                    @endif
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