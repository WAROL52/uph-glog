@php
    $userConnected=Session::get('user');
@endphp
<div class="card border border-5 border-primary rounded-5 rounded-start ">
    <div class="card-header">
        <img src="{{ Vite::asset('resources/template/image/femme.png') }}" alt="profil">
        <h3 class=" ">{{ $userConnected->nom }} {{ $userConnected->prenom }}</h3> 
    </div>
    <div class="card-body">
        <form class="Publier " action="/post" method="POST">
            @csrf
            <div class="form-group">
            <label for="titre">titre</label>
                <input type="text" class="form-control" name="titre" placeholder="titre" id="titre"/>                      
            </div>
            <div class="form-group">
                <label for="blog">votre blogue</label>
                <textarea id="" cols="30" rows="10" name="content" class="form-control" aria-label="With textarea"></textarea>                
            </div>
            <button type="submit" class="btn btn-primary">Publier?</button>
        </form>
    </div>
    <div class="card-footer text-muted">
      Ecrivez et publiez votre articles...
    </div>
  </div>