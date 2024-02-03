
<div class="tab-pane fade profile-edit pt-3" id="profile-edit">
    <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderInfos" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="container" id="panelEdit">
        <section class="section">

            <form action="#" id="form-client-infos" enctype="multipart/form-data" method="POST">

                <div class="row">
                    <div class="success-text" id="success-infos">
                        <div class="alert alert-success" role="alert" style="text-align:center;">
                            <h4 class="alert-heading">Client N°
                                <?php echo $client['CLIENT_CIN'] ?> modifié !
                            </h4>
                        </div>
                    </div>
                    <div class="card error-text">
                        <p>Veuillez renseigner tous les champs !</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <input type="text" value="<?php echo $client['CLIENT_ID'] ?>" name="CLIENT_ID"
                                style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title infos-client" onclick="displayElement('.civilite')"><i
                                        class="bi bi-person left"></i>Civilité<i
                                        class="bi right bi-dash civilite-bi"></i></h5>
                                <div class="col-12 form-floating form-hide active mb-3 civilite">
                                    <input type="text" name="LNAME" placeholder=""
                                        value="<?php echo $client['LNAME'] ?>" class="form-control" id="lname" required>
                                    <label for="lname" class="form-label">Nom</label>
                                </div>
                                <div class="col-12 form-floating form-hide active mb-3 civilite">
                                    <input type="text" name="FNAME" placeholder=""
                                        value="<?php echo $client['FNAME'] ?>" class="form-control" id="fname" required>
                                    <label for="fname" class="form-label">Prénom</label>
                                </div>
                                <div class="col-12 form-floating form-hide active mb-3 civilite">

                                    <span> Titre</span>
                                    <br>
                                    <div class="form-check" style="float: left;">
                                        <?php if ($client['TITLE'] == "Homme") { ?>
                                            <input class="form-check-input" type="radio" name="TITLE" id="titleM"
                                                value="Homme" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="radio" name="TITLE" id="titleM"
                                                value="Homme">
                                        <?php } ?>
                                        <label class="form-check-label" for="titleM">
                                            Homme
                                        </label>
                                    </div>
                                    <div class="form-check" style="float: right;">
                                        <?php if ($client['TITLE'] == "Femme") { ?>
                                            <input class="form-check-input" type="radio" name="TITLE" id="titleF"
                                                value="Femme" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="radio" name="TITLE" id="titleF"
                                                value="Femme">
                                        <?php } ?>
                                        <label class="form-check-label" for="titleF">
                                            Femme
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title infos-client" onclick="displayElement('.reference')"><i
                                        class="bi bi-file-earmark-text left"></i>Reférence<i
                                        class="bi right bi-dash reference-bi"></i></h5>
                                <div class="col-12 form-floating form-hide active mb-3 reference">
                                    <input type="text" name="CLIENT_CIN" placeholder="" id="cin" value="<?php echo $client['CLIENT_CIN'] ?>"
                                        class="form-control" required>
                                    <label for="cin" class="form-label">Numéro CIN / Carte
                                        de
                                        séjour</label>
                                </div>
                                <div class="col-12 form-floating form-hide active mb-3 reference">
                                    <input type="text" name="INCOME" placeholder=""
                                        value="<?php echo $client['INCOME'] ?>" class="form-control" id="income"
                                        required>
                                    <label for="income" class="form-label">Total revenus
                                        mensuels
                                        (net en DH)</label>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title infos-client" onclick="displayElement('.contact')"><i
                                        class="bi bi-telephone left"></i>Contact <i
                                        class="bi right bi-dash contact-bi"></i></h5>
                                <div class="col-12 form-floating form-hide active mb-3 contact">
                                    <input type="text" name="EMAIL" placeholder=""
                                        value="<?php echo $client['EMAIL'] ?>" class="form-control" id="email" required>
                                    <label for="email" class="form-label">Adresse
                                        email</label>
                                </div>
                                <div class="col-12 form-floating form-hide active mb-3 contact">
                                    <input type="text" name="PHONE" placeholder=""
                                        value="<?php echo $client['PHONE'] ?>" class="form-control" id="phone" required>
                                    <label for="phone" class="form-label">Téléphone</label>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title infos-client" onclick="displayElement('.coordonnee')"><i
                                        class="bi bi-geo-alt left"></i>Coordonnées<i
                                        class="bi right bi-dash coordonnee-bi"></i></h5>
                                <div class="col-12 form-floating form-hide active mb-3 coordonnee">
                                    <select name="REGION" onchange="loadTowns()" class="form-select" id="idRegion"
                                        aria-label="State">

                                    </select>
                                    <label for="yourRegion" class="form-label">Votre région
                                        !
                                    </label>
                                </div>
                                <div class="col-12 form-floating form-hide active mb-3 coordonnee">
                                    <select name="TOWN" class="form-select" placeholder="" id="idTown">

                                    </select>
                                    <label for="yourTown" class="form-label">Votre ville
                                        actuelle
                                        !</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <input style="display: none;" type="text" name="flagUpdate"
                                value="<?php echo $client['CLIENT_ID'] ?>">
                            <button type="submit" class="btn btn-outline-success btn-send-infos" name="">Sauvegarder les
                                modifications</button>
                        </div>
                    </div>
                </div>
                <div class="card errors">

                </div>

            </form>
        </section>

    </div>


</div>