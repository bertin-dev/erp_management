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
                <li class="breadcrumb-item active">Numéro de Carte : {{$carte->code_number}}</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h1 display">Mr/Mme: {{$carte->user->particulier[0]->lastname}} {{$carte->user->particulier[0]->firstname}}</h1>
                <h2 class="h2 display">CNI: {{$carte->user->particulier[0]->cni}}</h2>
                <h3 class="display">SEXE: {{$carte->user->particulier[0]->gender}}</h3>
                <h3 class="display">TEL: {{$carte->user->phone}}</h3>
            </header>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width: 100%;" class="table">
                            <thead>
                            <tr>
                                <th>N° carte</th>
                                <th>N° Serie</th>
                                <th>Etat</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <td>
                                    {{$carte->code_number}} 
                                </td>
                                <td>
                                    {{$carte->serial_number}}
                                </td>
                                <td>
                                    {{$carte->card_state}}
                                </td>
                                <td>
                                    {{$carte->type}}
                                </td>
                                <td>
                                    <a href="/device/{{$carte->id}}/edit" class="btn btn-warning" ><i class="fa fa-edit"></i>Desattribuer</a>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection