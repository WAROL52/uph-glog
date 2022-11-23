@extends('layouts.app')

@section('content')
<div class="container-fluid" >
    <div class=" row ">
      <div class="col">
        <form action="/inscription" method="POST" class="FormulaireInscription">
            @csrf
            <div class="form-group">
                <label for="Nom">Nom </label>
                <input type="text" name="nom" class="form-control" id="Nom">
            </div>
            <div class="form-group">
                <label for="Prenom">Prénom </label>
                <input type="text" name="prenom" class="form-control" id="Prenom">
            </div>
            <div class="form-group">
                <label for="mail">Mail </label>
                <input type="mail" name="email" class="form-control" id="mail">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe </label>
                <input type="password" name="mdp" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe </label>
                <input type="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="Date">Date de naissance </label>
                <input type="date" name="date_naissance" class="form-control" id="Date">
            </div>
            <div class="form-check">
                <label class="form-check-label" for="homme">
                  <input type="radio" class="form-check-input" id="homme" name="sexe" value="Homme"> Homme
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="femme">
                    <input type="radio" class="form-check-input" id="femme" name="sexe" value="Femme">Femme
                </label>
            </div>
            <div class="sub">
                <button type="submit" class="btn btn-default Inscri"><strong>S'inscrire</strong></button>
            </div>  
        </form>
      </div>
      <div class="col ImageAnimation">
            <img src="{{ Vite::asset('resources/template/image/inscription.png') }}" class="" alt="" srcset="">
      </div>
  </div>    
    
</div>
@endsection