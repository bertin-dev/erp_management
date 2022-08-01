@extends('layouts.index')

@section('content')

<!-- navbar-->

    @include('layouts.navbar')

    <!-- Breadcrumb-->

    <div class="breadcrumb-holder">

        <div class="container-fluid">

            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="/">Accueil</a></li>

                <li class="breadcrumb-item"><a href="/roles">roles</a></li>

                <li class="breadcrumb-item active">{{$role->name}}</li>

            </ul>

        </div>

    </div>

    <section id="roles" >

        <div class="container-fluid">

            <!-- Page Header-->

            <p>Edition du rôle "{{$role->name}}"</p>

                <form class="form-validate" method="POST" action="{{ route('updateRole', ['role_id'=>$role->id]) }}">

                    @csrf

                    @method('PUT')

                    <div class="form-group">

                        <label>Nom du groupe</label>

                        <input id="role_name_add" name="name" type="text" required data-msg="Entrer la designation du rôle" class="form-control" value="{{$role->name}}">

                    </div>



                    <div class="form-group">

                        <label>Slugter du groupe</label>

                        <input id="role_slug_add" name="slug" type="text" required data-msg="le slugter est obligatoire" class="form-control" value="{{$role->slug}}">

                    </div>

                                        

                    <div class="form-group">
                        <label class="form-control-label">Ajouter les permissions</label>
                        <select id="roles_permissions_add" name="permissions[]"  multiple class="form-control">
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

    </section>

@endsection