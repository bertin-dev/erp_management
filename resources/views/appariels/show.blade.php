@extends('layouts.index')
@section('content')
<!-- navbar-->
@include('layouts.navbar')
      <!-- Counts Section -->
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="dasboard">Accueil</a></li>
                <li class="breadcrumb-item active">Numéro de serie de l'appariel : {{$device->serial_number}}</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h1 display">Numero: {{$device->serial_number}}</h1>
                <h2 class="h2 display">Type: {{$device->device_type}}</h2>
                <h3 class="h3 display">Fournisseur: {{$device->provider}}</h3>
                <h4 class="h4 display">Fabriquant: {{$device->manifacturer}}</h4>
                <h4 class="h4 display">Branch: {{$device->branch}}</h4>
            </header>
            @if(array_key_exists(0, $device->user_device))
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width: 100%;" class="table">
                            <thead>
                            <tr>
                                <th>Entreprise</th>
                                <th>Debut de possession</th>
                                <th>Fin de possession</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <td>
                                    {{$device->entreprises[0]->raison_social}}
                                </td>
                                <td>
                                    {{$device->user_device[0]->starting_possession}}
                                </td>
                                <td>
                                    {{$device->user_device[0]->end_possession}}
                                </td>
                                <td>
                                <a href="/device/{{$device->id}}/edit" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                                <a href="/device/{{ $device->id }}/edit" id="device_attrib" class="btn btn-warning" data-deviceid="{{ $device->id }}"><i class="fa fa-settings"></i>Attribuer</a>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection