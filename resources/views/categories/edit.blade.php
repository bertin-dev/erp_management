@extends('layouts.index')

@section('content')

<!-- navbar-->

    @include('layouts.navbar')

    <!-- Breadcrumb-->

    <div class="breadcrumb-holder">

        <div class="container-fluid">

            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="/">Accueil</a></li>

                <li class="breadcrumb-item"><a href="/roles">categories</a></li>

                <li class="breadcrumb-item active">{{$categorie->name}}</li>

            </ul>

        </div>

    </div>

    <section id="roles" >

        <div class="container-fluid">

            <!-- Page Header-->

            <p>Edition de la catégorie "{{$categorie->name}}"</p>

                <form class="form-validate" method="POST" action="{{ route('updateCategorie', ['categorie_id'=>$categorie->id]) }}">

                    @csrf

                    @method('PUT')

                    <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Nom categorie</label>
                                            <input id="nameCategorie" type="text" placeholder="nom categorie" class="mr-3 form-control form-control transaction">
                                        </div>

                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Bonus</label>
                                            <input id="bonusCategorie" type="text" placeholder="bonus categorie" class="mr-3 form-control form-control transaction">
                                        </div>

                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Remise</label>
                                            <input id="remiseCategorie" type="text" placeholder="remise sur la categorie" class="mr-3 form-control form-control transaction">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inlineFormInputGroup" class="sr-only">Role</label>
                                            <select  id="role_id" name="categorie" class="mr-3 form-control form-control transaction" >
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
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