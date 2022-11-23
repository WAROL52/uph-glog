<div class="card mx-auto my-5 border-primary border rounded-5 rounded-start " style="width: 500px;" >
    <div class="card-header   text-bg-primary ">
        <h2>
            Se Connecter
        </h2>
    </div>
    <div class="card-body">
        <form action="/login" method="POST"  >
            @csrf
            <div class="form-group">
              <label for="Name">E-mail</label>
              <input type="email" class="form-control" required name="email" id="Name">
            </div>
            <div class="form-group">
              <label for="Pass">Mot de passe</label>
              <input type="password" required name="mdp" class="form-control" id="Pass">
            </div>
            <div class="form-group d-flex justify-content-end">
                <a href="inscription">S'inscrire</a>
            </div>
            <div id="link">
                <a href="mdp-oublier">Mot de passe oublié?</a>
            </div> 
            <div class="subscribe d-flex justify-content-center ">
                <button type="submit" class="btn btn-default Inscription">Se connecter</button> 
            </div> 
        </form> 
    </div>
  </div>