<form action="">
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Terminez les options de connexion</h5>
              <p class="text-center small">Veuillez definir un nouveau mot de passe afin d'accéder à
                l'espace
                client</p>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


          <section class="section py-4">
            <div class="container">

              <div class="col-lg-12">
                <div class="card-body">

                  <div class="col-12 form-floating mb-3">
                    <input type="text" name="id_unique" class="form-control" id="id_unique"
                      value="<?php echo $id_unique ?>" disabled>
                    <label for="id_unique" class="form-label">Votre identifiant est : </label>
                  </div>

                  <div class="col-12">
                    <label for="password" class="form-label">Votre mot de passe !</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                  </div>
                  <div class="col-12">
                    <label for="yourPassword2" class="form-label">Ré-saisir le mot de passe</label>
                    <input type="password" name="password2" class="form-control" id="yourPassword2" required>

                  </div>

                </div>

              </div>

            </div>

          </section>


          <div class="modal-footer">

            <button type="button" class="btn btn-primary" onclick="showModal(2)">Suivant</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true" data-bs-backdrop="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Situation géographique</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="showModal(1)">Précédent</button>
            <button type="button" class="btn btn-primary" onclick="showModal(3)">Suivant</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true" data-bs-backdrop="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Boîte Modale 3</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Contenu de la Boîte Modale 3.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="showModal(2)">Précédent</button>
            <button type="button" class="btn btn-primary" onclick="showModal(4)">Suivant</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true" data-bs-backdrop="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Boîte Modale 4</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Contenu de la Boîte Modale 4.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="showModal(3)">Précédent</button>
            <button type="button" class="btn btn-primary" onclick="showModal(5)">Suivant</button>
          </div>
        </div>
      </div>
    </div>
  </form>