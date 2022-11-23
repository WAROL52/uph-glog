<div class="card border border-5 border-primary rounded-5 rounded-start ">
    <div class="card-header">
        <img src="{{ Vite::asset('resources/template/image/femme.png') }}" alt="profil">
        <h3 class=" ">{{ $user->nom }} {{ $user->prenom }}</h3>
    </div>
    <div class="card-body">
        <div class="col-sm-8">
            <div class="card-block">
                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Nom</p>
                        <h6 class="text-muted f-w-400">{{ $user->nom }}</h6>
                    </div>
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Prenom</p>
                        <h6 class="text-muted f-w-400">{{ $user->prenom }}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Email</p>
                        <h6 class="text-muted f-w-400">{{ $user->email }}</h6>
                    </div>
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Anniversaire</p>
                        <h6 class="text-muted f-w-400">{{ $user->date_naissance }}</h6>
                    </div>
                    <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">id</p>
                        <h6 class="text-muted f-w-400">{{ $user->id }}</h6>
                    </div>
                </div>
                <ul class="social-link list-unstyled m-t-40 m-b-10">
                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                            data-original-title="facebook" data-abc="true"><i
                                class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                            data-original-title="twitter" data-abc="true"><i
                                class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                            data-original-title="instagram" data-abc="true"><i
                                class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>