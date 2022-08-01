@extends('layouts.index')

@section('content')

<!-- navbar-->

    @include('layouts.navbar')

<!-- Breadcrumb-->

    <div class="breadcrumb-holder">

        <div class="container-fluid">

            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>

                <li class="breadcrumb-item active">Les Permissions des Utilisateurs</li>

            </ul>

        </div>

    </div>

    <section id="permissions" >

        <div class="container-fluid">

            <!-- Page Header-->

            <header>

                <h1 class="h3 display">Permissions des Utilisateurs</h1>

            </header>

            <div class="card">

                <div class="card-header" id="creation_du_permission">

                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success" style="background-color: white;border-color: white; color: black"><i class="glyphicon-credit-card"></i>Nouveau groupe</button>

                    <div id="myModal" tabindex="-1" permission="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">

                        <div permission="document" class="modal-dialog" style="max-width: 700px">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h2 id="exampleModalLabel" class="modal-title">Entrer les informations concernant le nouveau groupe</h2>

                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"></span></button>

                                </div>

                                <div class="modal-body">

                                    <p>Entrer une nouvelle permission</p>

                                    <form class="form-validate" method="POST" action="{{route('storePermission')}}">

                                        @csrf

                                        @method('POST')

                                        <div class="form-group">

                                            <label>Nom de la permission</label>

                                            <input id="permission_name_add" type="text" name="name" required data-msg="Entrer la designation" class="form-control">

                                        </div>



                                        <div class="form-group">

                                            <label>Slugter de la permission</label> 

                                            <input id="permission_slug_add" name="slug" type="text" required data-msg="le slugter est obligatoire" class="form-control">

                                        </div>                                        

                                    <div class="form-group">

                                        <button id="submit" class="btn btn-primary">Enregistrer</button>

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

                                <th>Id</th>

                                <th>Noms</th>

                                <th>Slug</th>

                                <th>Actions</th>

                            </tr>

                            </thead>

                            <tbody id="liste_des_permissions">

                                @foreach($permissions as $permission)

                                <tr>

                                    <td>{{ $permission->id }}</td>

                                    <td>{{ $permission->name }}</td>

                                    <td>{{ $permission->slug }}</td>

                                    <td>

                                        <a href="{{ route('editPermission', ['permission'=>$permission->id])}}" id="permission_edit" class="btn btn-warning" data-permissionid="{{ $permission->id }}"><i class="fa fa-edit"></i></a>

                                        <button id="permission_delete" type="button" class="btn btn-danger" data-permissionid="'+element.id+'"><i class="fa fa-trash"></i></button>

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