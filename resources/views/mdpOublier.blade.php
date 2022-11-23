@extends('layouts.app')

@section('content')
<div class="container-fluid AcceuilNav">
    <div class="">
        <div class="card mx-auto my-5" style="width: 500px;" >
            <div class="card-header text-bg-primary ">
                <h2>
                    Mot de passe oublié
                </h2>
            </div>
            <div class="card-body">
                <form action="" >
                    <div class="form-group">
                      <label for="Name">E-mail</label>
                      <input type="email" class="form-control" id="Name">
                    </div>
                    <div class="subscribe d-flex justify-content-center ">
                        <button type="submit" class="btn btn-default Inscription">Envoyer</button> 
                    </div>
                </form> 
            </div>
          </div>
    </div>
</div> 
@endsection