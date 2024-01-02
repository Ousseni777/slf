<style>
    ::-webkit-scrollbar {
        width: 2px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: purple;
        /* border-radius: 6px; */

    }

    .error-text {
        color: #721c24;
        padding: 8px 10px;
        text-align: center;
        border-radius: 5px;
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        margin-bottom: 10px;
        display: none;
    }

    .profile-new {
        padding: 20% 30%;
    }

    .inputImage {
        display: none;
    }

    .labelInputImage:hover {
        cursor: pointer;
    }

    .card-body .form-hide {
        display: none;
    }

    .portfolio-wrap {
        transition: 0.3s;
        position: relative;
        overflow: hidden;
        /* padding: 5%; */
        z-index: 1;
    }


    .portfolio-wrap::before {
        content: "";
        background: rgba(255, 255, 255, 0.5);
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        transition: all ease-in-out 0.3s;
        z-index: 2;
        opacity: 0;
    }

    .portfolio-wrap img {
        height: 160px;
        width: 96%;
        margin: 2%;
    }

    .portfolio-wrap .portfolio-links {
        opacity: 1;
        left: 0;
        right: 0;
        bottom: -60px;
        z-index: 3;
        position: absolute;
        transition: all ease-in-out 0.3s;
        display: flex;
        justify-content: center;
    }

    .portfolio-wrap .portfolio-links a {
        color: #fff;
        font-size: 28px;
        text-align: center;
        background: rgba(20, 157, 221, 0.75);
        transition: 0.3s;
        width: 100%;
    }

    .portfolio-wrap .portfolio-links a:hover {
        background: rgba(20, 157, 221, 0.95);
    }

    .portfolio-wrap .portfolio-links a+a {
        border-left: 1px solid #37b3ed;
    }

    .portfolio-wrap:hover::before {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 1;
    }

    .portfolio-wrap:hover .portfolio-links {
        opacity: 1;
        bottom: 0;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Complétez vos informations personnelles pour finaliser votre demande</h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Infos</li>
                <li class="breadcrumb-item active">Justificatifs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



    <section class="section profile mt-5">
        <div class="row">


            <div class="col-xl-9">

                <div class="card">
                    <div class="card-body pt-3">
                    <?php include("nav-tabs.php") ?>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade profile-new card show" id="profile-new">
                                <div class="card-body">
                                    <button class="btn btn-primary" style="padding: 5%;" data-bs-toggle="modal"
                                        data-bs-target="#modalPieces">Finalisez votre demande</button>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit show active pt-3" id="profile-edit">

                                <div class="container" id="panelEdit">
                                    <section class="section">

                                        <form action="#" id="form-client" enctype="multipart/form-data" method="POST">

                                            <div class="row">
                                                <div class="success-text" id="success-infos">
                                                    <div class="alert alert-success" role="alert"
                                                        style="text-align:center;">
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
                                                        <input type="text" value="<?php echo $client['client_id'] ?>"
                                                            name="client_id" style="display: none;">
                                                        <div class="card-body">
                                                            <h5 class="card-title infos-client"
                                                                onclick="displayElement('.civilite')"><i
                                                                    class="bi bi-person left"></i>Civilité<i
                                                                    class="bi right bi-dash civilite-bi"></i></h5>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 civilite">
                                                                <input type="text" name="lname" placeholder=""
                                                                    value="<?php echo $client['lname'] ?>"
                                                                    class="form-control" id="lname" required>
                                                                <label for="lname" class="form-label">Nom</label>
                                                            </div>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 civilite">
                                                                <input type="text" name="fname" placeholder=""
                                                                    value="<?php echo $client['fname'] ?>"
                                                                    class="form-control" id="fname" required>
                                                                <label for="fname" class="form-label">Prénom</label>
                                                            </div>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 civilite">

                                                                <span> Titre</span>
                                                                <br>
                                                                <div class="form-check" style="float: left;">
                                                                    <?php if ($client['title'] == "Homme") { ?>
                                                                        <input class="form-check-input" type="radio"
                                                                            name="title" id="titleM" value="Homme" checked>
                                                                    <?php } else { ?>
                                                                        <input class="form-check-input" type="radio"
                                                                            name="title" id="titleM" value="Homme">
                                                                    <?php } ?>
                                                                    <label class="form-check-label" for="titleM">
                                                                        Homme
                                                                    </label>
                                                                </div>
                                                                <div class="form-check" style="float: right;">
                                                                    <?php if ($client['title'] == "Femme") { ?>
                                                                        <input class="form-check-input" type="radio"
                                                                            name="title" id="titleF" value="Femme" checked>
                                                                    <?php } else { ?>
                                                                        <input class="form-check-input" type="radio"
                                                                            name="title" id="titleF" value="Femme">
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
                                                            <h5 class="card-title infos-client"
                                                                onclick="displayElement('.reference')"><i
                                                                    class="bi bi-file-earmark-text left"></i>Reférence<i
                                                                    class="bi right bi-dash reference-bi"></i></h5>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 reference">
                                                                <input type="text" name="cin" placeholder=""
                                                                    value="<?php echo $client['cin'] ?>"
                                                                    class="form-control" required>
                                                                <label for="cin" class="form-label">Numéro CIN / Carte
                                                                    de
                                                                    séjour</label>
                                                            </div>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 reference">
                                                                <input type="text" name="income" placeholder=""
                                                                    value="<?php echo $client['income'] ?>"
                                                                    class="form-control" id="income" required>
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
                                                            <h5 class="card-title infos-client"
                                                                onclick="displayElement('.contact')"><i
                                                                    class="bi bi-telephone left"></i>Contact <i
                                                                    class="bi right bi-dash contact-bi"></i></h5>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 contact">
                                                                <input type="text" name="email" placeholder=""
                                                                    value="<?php echo $client['email'] ?>"
                                                                    class="form-control" id="email" required>
                                                                <label for="email" class="form-label">Adresse
                                                                    email</label>
                                                            </div>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 contact">
                                                                <input type="text" name="phone" placeholder=""
                                                                    value="<?php echo $client['phone'] ?>"
                                                                    class="form-control" id="phone" required>
                                                                <label for="phone" class="form-label">Téléphone</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title infos-client"
                                                                onclick="displayElement('.coordonnee')"><i
                                                                    class="bi bi-geo-alt left"></i>Coordonnées<i
                                                                    class="bi right bi-dash coordonnee-bi"></i></h5>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 coordonnee">
                                                                <select name="region" onchange="loadTowns()"
                                                                    class="form-select" id="idRegion"
                                                                    aria-label="State">

                                                                </select>
                                                                <label for="yourRegion" class="form-label">Votre région
                                                                    !
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="col-12 form-floating form-hide active mb-3 coordonnee">
                                                                <select name="town" class="form-select" placeholder=""
                                                                    id="idTown">

                                                                </select>
                                                                <label for="yourTown" class="form-label">Votre ville
                                                                    actuelle
                                                                    !</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <button type="submit"
                                                            class="btn btn-outline-success btn-send-infos-client"
                                                            name="">Sauvegarder les modifications</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </section>

                                </div>


                            </div>


                            <?php include("tab-overview.php") ?>

                            <div class="modal fade" id="modalPieces" role="dialog" tabindex="-1"
                                aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true"
                                data-bs-backdrop="false">
                                <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderPieces"
                                    role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="success-text" id="success-pieces">
                                        <div class="alert alert-success" role="alert" style="text-align:center;">
                                            <h4 class="alert-heading">Félicitation !</h4>
                                            <p>Vos données personnelles ont été envoyées avec succès, merci de nous
                                                faire part les justificatifs !
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="pagetitle">
                                                <h1>Justificatifs</h1>
                                                <nav>
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item">Infos</li>
                                                        <li class="breadcrumb-item active">Justificatifs</li>
                                                    </ol>
                                                </nav>
                                            </div><!-- End Page Title -->
                                            <a href="./sim-cl?tag=chrono" class="btn-close" aria-label="Close"></a>
                                        </div>
                                        <div class="modal-body">
                                            <div
                                                class="row d-flex flex-column align-items-center justify-content-center">
                                                <div class="col-md-8 col-lg-6 row mt-3">
                                                    <!-- <span>CIN / Carte séjour</span> -->
                                                    <div
                                                        class="portfolio-wrap col-8 form-control d-flex flex-column align-items-center justify-content-center py-4">

                                                        <img id="preview-inputImageCIN" class="mt-3"
                                                            src="users/client/images/cin.jpg"
                                                            style="width: 130px; height: 100px;" alt="Profile">

                                                    </div>
                                                    <label class="btn btn-outline-primary" for="inputImageCIN"><i
                                                            class="bi bi-upload"></i> Charger
                                                        le CIN</label>

                                                    <input type="file" name="yourCIN"
                                                        accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                        class="form-control inputImage" id="inputImageCIN" required>

                                                </div>
                                                <div class="col-md-8 col-lg-6 row mt-3">
                                                    <!-- <span>RIB</span> -->
                                                    <div
                                                        class="portfolio-wrap col-8 form-control d-flex flex-column align-items-center justify-content-center py-4">

                                                        <img id="preview-inputImageRib" class="mt-3"
                                                            src="users/client/images/rib.png"
                                                            style="width: 130px; height: 100px;" alt="Profile">

                                                    </div>

                                                    <label class="btn btn-outline-primary" for="inputImageRib"><i
                                                            class="bi bi-upload"></i> Charger
                                                        le RIB</label>
                                                    <input type="file" name="yourRIB"
                                                        accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                        class="form-control inputImage" id="inputImageRib" required>

                                                </div>
                                                <div class="col-md-8 col-lg-6 row mt-3">
                                                    <!-- <span>Adresse</span> -->
                                                    <div
                                                        class="portfolio-wrap col-8 form-control d-flex flex-column align-items-center justify-content-center py-4">

                                                        <img id="preview-inputImageAdress" class="mt-3"
                                                            src="users/client/images/adress.png"
                                                            style="width: 130px; height: 100px;" alt="Profile">

                                                    </div>

                                                    <label class="btn btn-outline-primary" for="inputImageAdress"><i
                                                            class="bi bi-upload"></i>
                                                        Charger l'adresse</label>

                                                    <input type="file" name="yourAdress"
                                                        accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                        class="form-control inputImage" id="inputImageAdress" required>
                                                </div>
                                                <!-- <div class="col-lg-3"></div> -->

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#modalInfos">Retour</button>
                                            <button type="submit" class="btn btn-primary btn-send-pieces"
                                                name="btn-send-pieces">Terminer</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


</main><!-- End #main -->



<script>

    window.addEventListener("load", function () {
        $(".form-hide").show();
        $("#profile-new").hide();
        loadRegions();
    });
    document.getElementById("nav-link-track").addEventListener("click", function () {
        $("#profile-new").hide();
    })

    document.getElementById("nav-link-pieces").addEventListener("click", function () {
        $("#profile-new").show();

    })
    document.getElementById("nav-link-infos").addEventListener("click", function () {
        $("#profile-new").hide();
    })
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



</script>