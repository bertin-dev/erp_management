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
                <li class="breadcrumb-item active">Personnel SMOPAYE</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Personnel SMOPAYE       </h1>
            </header>
            <div class="card">
                <div class="card" id="ajouter_du_staff">
                    <div class="card-header">
                        <a href="{{route('createUser')}}" id="creation_du_staff" class="btn btn-primary"><i class="icon-user"></i> Nouveau Personnel </a>
                        <button onclick="window.history.back()" class="btn btn-warning" style="margin-left:12px; float: right"><i class="fa fa-arrow-left"></i> Retourner</button>
                        <button type="button" class="btn btn-danger" style="float: right"><i class="fa fa-print"></i> Imprimer</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" style="width: 100%;" class="table">
                            <thead>
                            <tr>
                                <th>Noms et prenoms</th>
                                <th>Groupe</th>
                                <th>Telephone</th>
                                <th>Date de creation </th>
                                <th>Fonctions</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="liste_des_staffs">
                            @foreach($staffs as $staff)
                                @if(array_key_exists(0, $staff->particulier))
                                <tr>
                                    <td>{{ $staff->particulier[0]->lastname }} {{ $staff->particulier[0]->firstname }}</td>
                                    <td>
                                        @foreach($staff->particulier[0]->roles as $role) 
                                            <b>{{ $role->name }}</b>
                                        @endforeach 
                                    </td>
                                    <td>{{ $staff->phone }}</td>
                                    <td>{{date('d-m-Y h:m:s', strtotime($staff->particulier[0]->created_at))}}</td>
                                    <td>{{ $staff->particulier[0]->fonction }}</td>
                                    <td>
                                    <a href="{{ route('detailUser',['user_id'=>$staff->particulier[0]->id])}}" id="staff_view" class="btn btn-success" data-staffid="{{ $staff->particulier[0]->id }}"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('deleteUser',['user_id'=>$staff->particulier[0]->id])}}" class="btn btn-danger" data-staffid="{{$staff->particulier[0]->id}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection