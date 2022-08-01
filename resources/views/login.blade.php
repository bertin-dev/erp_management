@extends('layouts.full')
@section('content')
<div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>E-ZPass by Smopaye</span><strong class="text-primary">CONNEXION</strong></div>
            <p>le bonheur dans l'innovation</p>
            <form method="POST" action="{{url('store')}}" class="text-left form-validate">
              @csrf
              @method('POST')
              <div class="form-group-material">
                <input id="phone" type="text" name="phone" required data-msg="entrer votre numéro de téléphone" class="input-material">
                <label for="phone" class="label-material">Telephone</label>
              </div>
              <div class="form-group-material">
                <input id="mot-de-passe" type="Password" name="password" required data-msg="Please enter your Mot de Passe" class="input-material">
                <label for="mot-de-passe" class="label-material">Mot de Passe</label>
              </div>
              <div class="form-group text-center"><button id="login" class="btn btn-primary" type="submit">Se connecter</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form><a href="#" class="forgot-pass">Mot de Passe Oublier?</a>
          </div>
          <div class="copyrights text-center">
            <p>Designer par <a href="#" class="external">Equipe de SMOPAYE</a>                        </p>
          </div>
        </div>
      </div>
    </div>
@endsection