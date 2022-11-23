{{-- {{ dd($commentaire) }} --}}
@php
    use Illuminate\Support\Facades\DB;
    $user = DB::select('select * from user where id=?', [$commentaire->id_user])[0];
    $reponseCommentaires = DB::select('select * from commentaire where id_post=? and id_commentaire=?', [$post->idpost, $commentaire->id]);
    if (sizeof($reponseCommentaires)) {
        // dd($reponseCommentaires);
    }
    $userConnected = Session::get('user');
    $jaime = DB::select('select * from vue_nombre_de_jaime_com where id_com = ? ', [$commentaire->id]);
    if (sizeof($jaime)) {
        $jaime = $jaime[0];
        $jaime = $jaime->nombre_de_jaime;
    } else {
        $jaime = 0;
    }
    
    $ilike = false;
    $idJaime = 0;
    if ($userConnected) {
        $has = DB::select('select * from jaime_commentaire where id_com = ? and aimer_par=?', [$commentaire->id, $userConnected->id]);
        if (sizeof($has)) {
            $ilike = true;
            $idJaime = $has[0]->id;
        }
    }
    
@endphp
<div class="row my-3 ">
    <div class="col-1">
        <a href="/"><img class="" src="{{ Vite::asset('resources/template/image/femme.png') }}" height="40"
                width="40"srcset=""></a>
    </div>
    <div class="col-11 m-0 p-0">
        <div class="card border border-0 border-start">
            <div class="card-header py-0 border border-0 ">
                <a href="/user/{{ $user->id }}" class="h5">{{ $user->nom }} {{ $user->prenom }}</a> <span
                    class="text-muted badge">{{ $commentaire->create_at }} | 2 days
                    ago</span>
            </div>
            <div class="card-body border  border-1  rounded-pill">
                <p class="card-text" id="text-commentaire-{{ $commentaire->id }}">{{ $commentaire->text }}</p>
            </div>
            <div class="card-footer border border-0 py-0 bg-white ">
                <div class="collapse" id="collapseExample-rep-{{ $commentaire->id }}">
                    <div class="card card-body p-0 border border-0 ">
                        <form action="/add-reponse-commentaire/{{ $post->idpost }}-{{ $commentaire->id }}"
                            method="post">
                            @csrf
                            Reponse:
                            <div class="input-group input-group-sm ">
                                <input type="text" name="texte"
                                    class="form-control border border-1 border-primary rounded-5 rounded-end"
                                    placeholder="Votre commentaire..." aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                                <button
                                    class="btn btn-outline-primary border border-1 border-primary rounded-5 rounded-start"
                                    type="submit" id="button-addon2">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="collapse" id="collapseExample-modif-{{ $commentaire->id }}">
                    <div class="card p-0 card-body border border-0 ">
                        <form action="/update-reponse-commentaire/{{ $commentaire->id }}" method="post">
                            @csrf
                            Modifier:
                            <div class="input-group input-group-sm ">
                                <input type="text" name="texte"
                                    id="input-target-{{ $commentaire->id }}"
                                    class="form-control border border-1 border-primary rounded-5 rounded-end"
                                    placeholder="Votre commentaire..." aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                                <button
                                    class="btn btn-outline-primary border border-1 border-primary rounded-5 rounded-start"
                                    type="submit" id="button-addon2">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-bg-outline-primary">
                    @if ($userConnected)
                        @if ($ilike)
                            <a href="/delete-jaime-commentaire/{{ $idJaime }}"
                                class="card-link">{{ $jaime }}
                                Je n'aime plus</a>
                        @else
                            <a href="/add-jaime-commentaire/{{ $userConnected->id }}-{{ $commentaire->id }}"
                                class="card-link">{{ $jaime }} J'aime</a>
                        @endif
                        <a class="card-link" data-bs-toggle="collapse"
                            href="#collapseExample-rep-{{ $commentaire->id }}" role="button" aria-expanded="false"
                            aria-controls="collapseExample-rep-{{ $commentaire->id }}" href="#">Repondre</a>
                        @if ($userConnected->id == $user->id)
                            <a class="card-link btn-modif" data-bs-toggle="collapse"
                                href="#collapseExample-modif-{{ $commentaire->id }}" role="button"
                                aria-expanded="false" aria-controls="collapseExample-modif-{{ $commentaire->id }}"
                                href="#" input-target="#input-target-{{ $commentaire->id }}"  text-target="#text-commentaire-{{ $commentaire->id }}">Modifier</a>
                        @endif
                        @if ($userConnected->id == $user->id or $userConnected->id == $post->id_user)
                            <a class="card-link" href="/delete-reponse-commentaire/{{ $commentaire->id }}">Supprimer</a>
                        @endif
                    @else
                        <a href="#" class="card-link disabled">{{ $jaime }} J'aime</a>
                        <a class="card-link disabled" href="#">Repondre</a>
                    @endif
                </div>
                <div class="p-0">
                    @if (sizeof($reponseCommentaires))
                        <p class="my-0">
                            <a class="link link-primary" data-bs-toggle="collapse"
                                href="#collapseExample-{{ $commentaire->id }}" role="button" aria-expanded="false"
                                aria-controls="collapseExample-{{ $commentaire->id }}">
                                @if (sizeof($reponseCommentaires) > 1)
                                    {{ sizeof($reponseCommentaires) }} Réponses
                                @else
                                    {{ sizeof($reponseCommentaires) }} Réponse
                                @endif
                            </a>
                        </p>
                        <div class="collapse border border-0 my-0 p-0 " id="collapseExample-{{ $commentaire->id }}">
                            <div class="card card-body border p-0 border-0 my">
                                @foreach ($reponseCommentaires as $repCom)
                                    @include('components.commentaire', ['commentaire' => $repCom])
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
