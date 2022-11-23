{{-- {{ dd($post) }} --}}
@php
    use Illuminate\Support\Facades\DB;
    $user = Session::get('user');
    $commentaires = DB::select('select * from commentaire where id_post=? and id_commentaire=-1 ', [$post->idpost]);
    $jaimes = DB::select('select * from vue_nombre_de_jaime_post where id_post=?', [$post->idpost]);
    if (sizeof($jaimes)) {
        $jaimes = $jaimes[0]->nombre_de_jaime;
    } else {
        $jaimes = 0;
    }
    $ilike = false;
    $idlike=0;
    if ($user) {
        $has = DB::select('select * from jaimes_post where aimer_par = ? and id_post=?', [$user->id, $post->idpost]);
        if (sizeof($has)) {
            $ilike = true;
            $idlike=$has[0]->id;
        }
    }
@endphp
<div class="card  my-3  border border-5 border-primary rounded-5 rounded-start ">
    <div class="card-header text-bg-primary ">
        <a href="/user/{{ $post->id_user }}" class="link-dark text-decoration-none text-white">
            <h3>
                <img class="" src="{{ Vite::asset('resources/template/image/femme.png') }}" height="40"
                    width="40"srcset="">
                <span>{{ $post->nom }} {{ $post->prenom }}</span>
            </h3>
        </a>
    </div>
    <div class="card-body">
        <h3 class="card-title">{{ $post->titre }}</h3>
        <span class="text-muted badge">{{ $post->create_at }} | 2 days ago</span>
        <p class="card-text">{{ substr($post->content, 0, 250) }}...</p>
        {{-- <p class="card-text">{{$post->content }}</p> --}}
        <a href="#" class="link">Voir plus</a>
    </div>
    <div class="card-footer ">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="btn-group d-flex justify-content-between" role="group" aria-label="Basic example">
                    @if ($user)
                        @if ($ilike)
                            <a type="button" href="/remove-jaime-post/{{ $idlike }}"
                                class="btn btn-outline-primary">Je n'aime plus<span
                                    class="badge text-bg-secondary">{{ $jaimes }}</span> </a>
                        @else
                            <a type="button" href="/add-jaime-post/{{ $post->idpost }}"
                                class="btn btn-outline-primary">J'aime <span
                                    class="badge text-bg-secondary">{{ $jaimes }}</span> </a>
                        @endif

                        <a type="button" class="btn btn-outline-primary"
                            href="#input-add-comment-{{ $post->idpost }}">Commenter</a>
                    @else
                        <a type="button" disabled href="/add-jaime-post/{{ $post->idpost }}"
                            class="btn btn-outline-primary disabled">J'aime <span
                                class="badge text-bg-secondary">{{ $jaimes }}</span> </a>
                        <a type="button" disabled class="btn btn-outline-primary disabled"
                            href="#input-add-comment-{{ $post->idpost }}">Commenter</a>
                    @endif
                    <button type="button" class="btn btn-outline-primary">Plus</button>
                </div>
            </li>
            @if ($user)
                <li class="list-group-item">
                    <div>
                        <div class="row my-1">
                            <div class="col-1 ">
                                <img class="" src="{{ Vite::asset('resources/template/image/femme.png') }}"
                                    height="32" width="32"srcset="">
                            </div>
                            <div class="col-11 m-0">

                                <form idpost="{{ $post->idpost }}"
                                    action="/add-post-commentaire/{{ $user->id }}/{{ $post->idpost }}"
                                    class="rimax-form-add-commentaire" method="POST">
                                    @csrf
                                    <div class="input-group input-group-sm ">
                                        <input type="text" id="input-add-comment-{{ $post->idpost }}"
                                            class="form-control border border-1 border-primary rounded-5 rounded-end  "
                                            placeholder="Votre commentaire..." name="texte"
                                            aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button
                                            class="btn btn-outline-primary border border-1 border-primary rounded-5 rounded-start"
                                            type="submit" id="button-addon2">Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="one-of-commentaire-{{ $post->idpost }}">
                            @if (sizeof($commentaires))
                                @include('components.commentaire', ['commentaire' => $commentaires[0]])
                            @endif
                        </div>
                        <div class="collapse border border-0" id="collapseExample-{{ $post->idpost }}">
                            <div class="card card-body border border-0 p-0 "
                                id="list-of-commentaire-{{ $post->idpost }}">
                                @for ($i = 1; $i < sizeof($commentaires); $i++)
                                    @include('components.commentaire', [
                                        'commentaire' => $commentaires[$i],
                                    ])
                                @endfor
                            </div>
                        </div>
                        @if (sizeof($commentaires) > 1)
                            <p>
                                <a class="" data-bs-toggle="collapse" href="#collapseExample-{{ $post->idpost }}"
                                    role="button" aria-expanded="false"
                                    aria-controls="collapseExample-{{ $post->idpost }}">
                                    Voir {{ sizeof($commentaires) - 1 }} autres commentaires...
                                </a>
                            </p>
                        @endif
                    </div>
                </li>
            @endif

        </ul>
    </div>
</div>
