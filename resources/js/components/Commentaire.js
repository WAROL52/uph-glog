import { html } from "../rimax.es";

export function Commentaire({user,post,commentaire}) {
    return html`
        <div class="row my-3">
            <div class="col-1 ">
                <a href="/"
                    ><img
                        class=""
                        src="{{ Vite::asset('resources/template/image/femme.png') }}"
                        height="40"
                        width="40"
                        srcset=""
                /></a>
            </div>
            <div class="col-11 m-0">
                <div class="card border border-0 ">
                    <div class="card-header py-0 border border-0 ">
                        <a href="/user/${ user.id }" class="h5"
                            >${user.nom} ${user.prenom}</a
                        >
                        <span class="text-muted badge"
                            >${post.create_at} | 2 days ago</span
                        >
                    </div>
                    <div class="card-body border  border-1  rounded-pill">
                        <p class="card-text">${ commentaire.text }</p>
                    </div>
                    <div class="card-footer border border-0 py-0 bg-white ">
                        <div class="input-group input-group-sm " hidden>
                            <input
                                type="text"
                                class="form-control border border-1 border-primary rounded-5 rounded-end"
                                placeholder="Votre commentaire..."
                                aria-label="Recipient's username"
                                aria-describedby="button-addon2"
                            />
                            <button
                                class="btn btn-outline-primary border border-1 border-primary rounded-5 rounded-start"
                                type="button"
                                id="button-addon2"
                            >
                                Envoyer
                            </button>
                        </div>
                        <div class="text-bg-outline-primary">
                            <a href="/" class="card-link">J'aime</a>
                            <a class="card-link" href="/">Repondre</a>
                            <a class="card-link" href="/">Modifier</a>
                            <a class="card-link" href="/">Supprimer</a>
                        </div>
                        <div>
                            @if (sizeof($reponseCommentaires))
                            <p>
                                <a
                                    class="link link-primary"
                                    data-bs-toggle="collapse"
                                    href="#collapseExample-{{ $commentaire->id }}"
                                    role="button"
                                    aria-expanded="false"
                                    aria-controls="collapseExample-{{ $commentaire->id }}"
                                >
                                    @if (sizeof($reponseCommentaires) > 1) {{
                                    sizeof($reponseCommentaires) }} Réponses
                                    @else {{ sizeof($reponseCommentaires) }}
                                    Réponse @endif
                                </a>
                            </p>
                            <div
                                class="collapse"
                                id="collapseExample-{{ $commentaire->id }}"
                            >
                                <div class="card card-body">
                                    @foreach ($reponseCommentaires as $repCom)
                                    @include('components.commentaire',
                                    ['commentaire' => $repCom]) @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}
