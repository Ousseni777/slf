<div class="tab-pane fade profile-edit show active pt-3" id="profile-edit">

    <div class="container" id="panelEdit">
        <section class="section">

            <form action="#" id="form-client" enctype="multipart/form-data" method="POST">

                <div class="row">
                    <div class="success-text" id="success-infos">
                        <div class="alert alert-success" role="alert" style="text-align:center;">
                            <h4 class="alert-heading">Client N°
                                <?php echo $client['cin'] ?> modifié !
                            </h4>
                        </div>
                    </div>
                    <div class="card error-text">
                        <p>Veuillez renseigner tous les champs !</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <input type="text" value="<?php echo $client['client_id'] ?>" name="client_id"
                                style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title infos-client" onclick="displayElement('.civilite')"><i
                                        class="bi bi-person left"></i>Civilité<i
                                        class="bi right bi-dash civilite-bi"></i></h5>
                                <div class="col-12 form-floating form-hide active mb-3 civilite">
                                    <input type="text" name="lname" placeholder=""
                                        value="<?php echo $client['lname'] ?>" class="form-control" id="lname" required>
                                    <label for="lname" class="form-label">Nom</label>
                                </div>
                                <div class="col-12 form-floating form-hide active mb-3 civilite">
                                    <input type="text" name="fname" placeholder=""
                                        value="<?php echo $client['fname'] ?>" class="form-control" id="fname" required>
                                    <label for="fname" class="form-label">Prénom</label>
                                </div>
                                <div class="col-12 form-floating form-hide active mb-3 civilite">

                                    <span> Titre</span>
                                    <br>
                                    <div class="form-check" style="float: left;">
                                        <?php if ($client['title'] == "Homme") { ?>
                                            <input class="form-check-input" type="radio" name="title" id="titleM"
                                                value="Homme" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="radio" name="title" id="titleM"
                                                value="Homme">
                                        <?php } ?>
                                        <label class="form-check-label" for="titleM">
                                            Homme
                                        </label>
                                    </div>
                                    <div class="form-check" style="float: right;">
                                        <?php if ($client['title'] == "Femme") { ?>
                                            <input class="form-check-input" type="radio" name="title" id="titleF"
                                                value="Femme" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="radio" name="title" id="titleF"
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
                                    <input type="text" name="cin" placeholder="" value="<?php echo $client['cin'] ?>"
                                        class="form-control" required>
                                    <label for="cin" class="form-label">Numéro CIN / Carte
                                        de
                                        séjour</label>
                                </div>
                                <div class="col-12 form-floating form-hide active mb-3 reference">
                                    <input type="text" name="income" placeholder=""
                                        value="<?php echo $client['income'] ?>" class="form-control" id="income"
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
                                    <input type="text" name="email" placeholder=""
                                        value="<?php echo $client['email'] ?>" class="form-control" id="email" required>
                                    <label for="email" class="form-label">Adresse
                                        email</label>
                                </div>
                                <div class="col-12 form-floating form-hide active mb-3 contact">
                                    <input type="text" name="phone" placeholder=""
                                        value="<?php echo $client['phone'] ?>" class="form-control" id="phone" required>
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
                                    <select name="region" onchange="loadTowns()" class="form-select" id="idRegion"
                                        aria-label="State">

                                    </select>
                                    <label for="yourRegion" class="form-label">Votre région
                                        !
                                    </label>
                                </div>
                                <div class="col-12 form-floating form-hide active mb-3 coordonnee">
                                    <select name="town" class="form-select" placeholder="" id="idTown">

                                    </select>
                                    <label for="yourTown" class="form-label">Votre ville
                                        actuelle
                                        !</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-outline-success btn-send-infos-client"
                                name="">Sauvegarder les modifications</button>
                        </div>
                    </div>
                </div>

            </form>
        </section>

    </div>


</div>

<script>
    
    function chargerImage(elementId) {
        var inputImage = document.getElementById(elementId);
        imagePreviewID = "preview-" + elementId;
        var imagePreview = document.getElementById(imagePreviewID);

        var fichierImage = inputImage.files[0];

        // Vérifiez si un fichier a été sélectionné
        if (fichierImage) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };

            // Lire le contenu du fichier comme une URL de données
            reader.readAsDataURL(fichierImage);
        }
    }

    // Fonction appelée lorsqu'on clique sur le bouton "Enregistrer"
    function sauvegarderImage(inputImage) {
        var inputImage = document.getElementById(inputImage);
        var fichierImage = inputImage.files[0];

        // Vérifiez si un fichier a été sélectionné
        if (fichierImage) {
            console.log('Image sélectionnée:', fichierImage);
        } else {
            console.log('Aucune image sélectionnée.');
        }
    }

    // Ajoutez un écouteur d'événement pour détecter les changements dans le champ d'entrée de type "file"
    document.getElementById('inputImageCIN').addEventListener('change', function () {
        chargerImage('inputImageCIN');
    });
    document.getElementById('inputImageRib').addEventListener('change', function () {
        chargerImage('inputImageRib');

    });
    document.getElementById('inputImageAdress').addEventListener('change', function () {
        chargerImage('inputImageAdress');

    });
    function displayElement(elt) {
        icone = elt + "-bi";
        if ($(elt).hasClass("active")) {
            $(elt).hide();
            $(elt).removeClass('active');
            $(icone).removeClass('bi-dash');
            $(icone).addClass('bi-plus');

        } else {
            $(elt).show();
            $(elt).addClass('active');
            $(icone).addClass('bi-dash');
            $(icone).removeClass('bi-plus');
        }
    }
</script>