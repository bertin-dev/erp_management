@extends('layouts.index')

@section('content')

<!-- navbar-->

    @include('layouts.navbar')

<!-- Breadcrumb-->

    <div class="breadcrumb-holder">

        <div class="container-fluid">

            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>

                <li class="breadcrumb-item active">Les groupe de personnel SMOPAYE</li>

            </ul>

        </div>

    </div>

    <section id="roles" >

        <div class="container-fluid">

            <!-- Page Header-->

            <header>

                <h1 class="h3 display">Les groupes de personnel SMOPAYE</h1>

            </header>

            <div class="card">

                <div class="card-header" id="creation_du_role">

                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success" style="background-color: white;border-color: white; color: black"><i class="glyphicon-credit-card"></i>Nouveau groupe</button>

                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">

                        <div role="document" class="modal-dialog" style="max-width: 700px">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h2 id="exampleModalLabel" class="modal-title">Entrer les informations concernant le nouveau groupe</h2>

                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"></span></button>

                                </div>

                                <div class="modal-body">

                                    <p>Entrer les informations concernant le Nouveau groupe</p>

                                    <form class="form-validate" method="POST" action="{{route('postRole')}}">

                                        @csrf

                                        @method('POST')

                                        <div class="form-group">

                                            <label>Nom du groupe</label>

                                            <input id="role_name_add" type="text" name="role_name" required data-msg="Entrer la designation du rôle" class="form-control">

                                        </div>



                                        <div class="form-group">

                                            <label>Slugter du groupe</label>

                                            <input id="role_slug_add" name="role_slug" type="text" required data-msg="le slugter est obligatoire" class="form-control">

                                        </div>



                                        <div class="form-group">

                                            <label class="form-control-label">Ajouter les permissions</label>
                                            <select id="roles_permissions_add" name="roles_permissions[]"  multiple class="form-control">
                                                @foreach($permissions as $permission)
                                                <option value="{{$permission->id}}">{{$permission->name}}</option>
                                                @endforeach
                                            </select>
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

                                <th>Permissions</th>

                                <th>Actions</th>

                            </tr>

                            </thead>

                            <tbody id="liste_des_roles" token="{{Session::get('access_token')}}">

                                @foreach($roles as $role)

                                <tr>

                                    <td>{{ $role->id }}</td>

                                    <td>{{ $role->name }}</td>

                                    <td>{{ $role->slug }}</td>

                                    <td>

                                        @foreach($role->permissions as $permission) 

                                        <span name="{{$permission->name}}" id="{{ $permission->id }}" class="badge badge-primary">{{ $permission->name }}</span>

                                        @endforeach    

                                    </td>

                                    <td>

                                        <a href="{{ route('editRole', ['role_id'=>$role->id])}}" id="role_edit" class="btn btn-warning" data-roleid="{{ $role->id }}"><i class="fa fa-edit"></i></a>

                                        <button id="role_delete" type="button" class="btn btn-danger" data-roleid="{{$role->id}}"><i class="fa fa-trash"></i></button>

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