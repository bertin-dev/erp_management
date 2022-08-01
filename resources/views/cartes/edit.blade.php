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
                <li class="breadcrumb-item active">Carte Electronique E-ZPass    </li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <p>Modifier les informations concernant la carte n°: {{$carte->code_number}}</p>
            <form class="form-validate" method="POST" action="{{ route('updateCarte', ['card_id' => $carte->id]) }}">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label>Numero de carte</label>
                    <input name="code_number" type="text" placeholder="code number" required data-msg="Entrer le numéro de carte s'il vous plait" class="form-control" value="{{$carte->code_number}}">
                </div>
                <div class="form-group">
                    <label>Numéro de série</label>
                    <input name="serial_number" type="text" placeholder="serial_number" required data-msg="Entrer la numero de serie s'il vous plait" class="form-control" value="{{$carte->serial_number}}">
                </div>
                <div class="form-group">
                    <label>date d'expiration</label>
                    <input name="end_date" type="text" placeholder="aaaa-mm-jj" required data-msg="Entrer la date d'expiration s'il vous plait" class="form-control" value="{{$carte->end_date}}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Enregistrer" class="btn btn-primary">
                </div>
            </form>
        </div>
    </section>
@endsection