<style>
    .group {
        text-align: center;
        padding-left: 5%;
    }

    .form-check {
        margin: 2%;
        padding: 2%;
    }

    .valide {
        text-align: center;
        width: 100%;
    }

    .valide i {

        color: greenyellow;
        font-size: 100px;
    }

    .alert-success {
        text-align: center;
        padding: 5%;
    }
</style>

<form action="tabs">
    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
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

                <div class="modal-body">
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
                                        <input type="password" name="password" class="form-control" id="password"
                                            required>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword2" class="form-label">Ré-saisir le mot de passe</label>
                                        <input type="password" name="password2" class="form-control" id="yourPassword2"
                                            required>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </section>
                </div>

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
                    <h5 class="modal-title" id="exampleModalLabel">Appartenance</h5>

                </div>
                <div class="modal-body">

                    <section class="section py-4">
                        <div class="container">

                            <div class="col-lg-12">
                                <div class="card-body">

                                    
                                    <div class="col-12 form-floating mb-3">
                                        <select class="form-select" id="brand" name="brand" aria-label="State">

                                        </select>
                                        <label for="floatingSelect">Vendeur</label>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>
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
                    <h5 class="modal-title" id="exampleModalLabel">Infos personnelles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <section class="section py-6">
                            <div class="container">

                                <div class="col-lg-12">
                                    <div class="card-body">

                                        <div class="group col-12" style="display : flex;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="title" id="titleM"
                                                    value="Masculin" checked>
                                                <label class="form-check-label" for="titleM">
                                                    Masculin
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="title" id="titleF"
                                                    value="Masculin">
                                                <label class="form-check-label" for="titleF">
                                                    Feminin
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12 form-floating mb-3">
                                            <input type="text" name="yourFullName" class="form-control"
                                                id="yourFullName" required>
                                            <label for="yourFullName" class="form-label">Votre nom complet</label>
                                        </div>

                                        <div class="col-12 form-floating mb-3">
                                            <input type="text" name="yourCIN" class="form-control" id="yourCIN"
                                                required>
                                            <label for="yourCIN" class="form-label">Numéro CIN / Carte de séjour</label>
                                        </div>
                                        

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="accepter" required>
                                            <label class="form-check-label" for="accepter">
                                                J'ai lu et j'accepte les conditions générales d'utilisation figurant sur
                                                les informations légales, notamment la mention relative à la protection
                                                des données personnelles
                                            </label>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="showModal(2)">Précédent</button>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </div>
        </div>
    </div>

</form>


<script>

    window.addEventListener("load", function () {

        loadRegions();
        loadVendeurs();
    });

</script>
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>

<script type="text/javascript" src="ax_script.js"></script>