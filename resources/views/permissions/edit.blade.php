@extends('layouts.index')

@section('content')

<!-- navbar-->

    @include('layouts.navbar')

    <!-- Breadcrumb-->

    <div class="breadcrumb-holder">

        <div class="container-fluid">

            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="/">Accueil</a></li>

                <li class="breadcrumb-item"><a href="/permissions">permissions</a></li>

                <li class="breadcrumb-item active">{{$permission->name}}</li>

            </ul>

        </div>

    </div>

    <section id="permissions" >

        <div class="container-fluid">

            <!-- Page Header-->

            <p>Edition du rôle "{{$permission->name}}"</p>

                <form class="form-validate" method="POST" action="{{ route('updatePermission', ['permission'=>$permission->id]) }}">

                    @csrf

                    @method('PUT')

                    <div class="form-group">

                        <label>Nom du groupe</label>

                        <input id="permission_name_add" name="name" type="text" required data-msg="Entrer la designation du rôle" class="form-control" value="{{$permission->name}}">

                    </div>



                    <div class="form-group">

                        <label>Slugter du groupe</label>

                        <input id="permission_slug_add" name="slug" type="text" required data-msg="le slugter est obligatoire" class="form-control" value="{{$permission->slug}}">

                    </div>

                    <div class="form-group">

                        <button id="submit" class="btn btn-primary">Enregistrer</button>

                    </div>

                </form>

        </div>

    </section>

@endsection