<div class="col-md-8">
    <div class="blog" >
    <!-- entete blogue -->
        <div class="blog-header d-flex justify-content-between">
        <!-- image / nom / prenom -->
            <img src=" {{ Vite::asset('resources/template/image/femme.png') }}" alt="" height="50" width="50"srcset="">
            <h4>Nom Prenom</h4>
            <!-- bouton editer et supprimer -->
            <div class="form-group BtnEdit">
                <!-- modal edit -->
                <button type="button" class="btn btn-default fa fa-edit " data-bs-toggle="modal" data-bs-target="#ModalEdit"></button>
                <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalEditLabel">Modifier</h5>
                            <button type="button" class="btn-close  btn btn-default" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                        </div>                      
                        <div class="modal-body">
                            <form class="EditBlogue ">
                                <!-- MODAL INPUT -->  
                                <div class="form-group">
                                <label for="titre">titre</label>
                                    <input type="text" class="form-control" placeholder="titre" id="titre"/>                      
                                </div>
                                <div class="form-group">
                                    <label for="blog">votre blogue</label>
                                    <textarea name="blog" id="" cols="30" rows="10" class="form-control" aria-label="With textarea"></textarea>                
                                </div>
                            </form>
                            <!-- MODAL INPUT FIN -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default Annuler" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-default Save">Enregistrer</button>
                        </div>
                        </div>
                    </div>
                </div>  
                <!-- buttion suppression -->
                <button type="button" class="fa fa-trash btn btn-default"></button>
            </div>
        </div>
        <!-- ito NY CONTENU BE -->
        <div class="blog-body">
        <!-- TITRE ETO -->
            <h4>titre </h4>
            <!-- HEURE DE PUBLICATION -->
            <span class="time" > 05/02/2000 </span>
            <!-- BLABLABLA -->
            <p class="All">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Accusamus dolorem ad ipsam, est quod laboriosam 
                impedit nobis voluptatum omnis officia dolor rerum
                commodi accu
                santium necessitatibus a repellat nisi. Nihil, sequi.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Accusamus dolorem ad ipsam, est quod laboriosam 
                impedit nobis voluptatum omnis officia dolor rerum
                commodi accu
                santium necessitatibus a repellat nisi. Nihil, sequi.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Accusamus dolorem ad ipsam, est quod laboriosam 
                impedit nobis voluptatum omnis officia dolor rerum
                commodi accu
                santium necessitatibus a repellat nisi. Nihil, sequi.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Accusamus dolorem ad ipsam, est quod laboriosam 
                impedit nobis voluptatum omnis officia dolor rerum
                commodi accu
                santium necessitatibus a repellat nisi. Nihil, sequi.
            </p>
        </div>
        <!-- TAPITRA ETO NY CONTENU BE -->
        <div class="blog-footer row">
            <div class="input-group col">
                <!-- PARTIE COMMENTAIRE -->
                <input type="text" class="form-control" placeholder="commentaire" />
                <button class="btn btn-outline-primary" type="button" > <i  class="fa fa-send"></i></button>
            </div>
            <div class="reaction col d-flex justify-content-between ">
                <!-- PARTIE REACTION -->
                <input id="jaime" type="checkbox" value="">
                <label class="fa fa-thumbs-up" for="jaime" ></label>  
                <input type="checkbox" name=""  id="favoris"> 
                <label for="favoris" class="fa fa-bookmark" data-bs-toggle="tooltip" data-bs-placement="top" title="ajout au favoris"></label>
                <input type="checkbox"  id="partage">
                <label for="partage" class="fa  fa-share" data-bs-toggle="tooltip" data-bs-placement="top" title="partager"></label>
            </div>
        </div>
        <!-- PARTIE SOUS COMMENTAIRE -->
        <div class="Sous">
            <div class="SousCommentaire">
                <img src="{{ Vite::asset('resources/template/image/femme.png') }}" alt="" height="30" width="30"srcset=""> <br>
                <span class="time" > 05/02/2000 </span>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis natus incidunt 
                    nesciunt labore ex quam, 
                    dolorem eius aliquid cum enim quod veritatis veniam dignissimos tempore autem 
                    magnam sapiente impedit. Hic!</p>
            </div>
            <div class="input-group InputSousCommentaire">
                <input type="text" class="form-control" placeholder="commentaire" />
                <button class="btn btn-outline-primary" type="button"><i class="fa fa-send"></i></button>
            </div>
        </div>
    </div>
</div>