<div class="modal fade" id="modal-infos-client" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
    <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderInfos" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="pagetitle">
                    <h1>Infos de l'emprunteur</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="sim">Simulation</a></li>
                            <li class="breadcrumb-item">Emprunteur</li>
                        </ol>
                    </nav>
                </div><!-- End Page Title -->
                <a href="<?php echo $_SESSION['page'] ?>" class="btn-close" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- <h2>Conditions d'Utilisation</h2> -->
                    <section class="section">

                        <form action="#" id="form-infos-client" enctype="multipart/form-data" method="POST">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title infos-client" onclick="displayElement('.civilite')"><i
                                                    class="bi bi-person left"></i>Civilité<i
                                                    class="bi right bi-plus civilite-bi"></i></h5>
                                            <div class="col-12 form-floating form-hide mb-3 civilite">
                                                <input type="text" name="lname" placeholder="" class="form-control"
                                                    id="lname" required oninvalid="displayError()">
                                                <label for="lname" class="form-label">Nom</label>
                                            </div>
                                            <div class="col-12 form-floating form-hide mb-3 civilite">
                                                <input type="text" name="fname" placeholder="" class="form-control"
                                                    id="fname" required oninvalid="displayError()">
                                                <label for="fname" class="form-label">Prénom</label>
                                            </div>
                                            <div class="col-12 form-floating form-hide mb-3 civilite">

                                                <span> Titre</span>
                                                <br>
                                                <div class="form-check" style="float: left;">
                                                    <input class="form-check-input" type="radio" name="title"
                                                        id="titleM" value="Homme" checked>
                                                    <label class="form-check-label" for="titleM">
                                                        Homme
                                                    </label>
                                                </div>
                                                <div class="form-check" style="float: right;">
                                                    <input class="form-check-input" type="radio" name="title"
                                                        id="titleF" value="Femme">
                                                    <label class="form-check-label" for="titleF">
                                                        Femme
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title infos-client" onclick="displayElement('.reference')">
                                                <i class="bi bi-file-earmark-text left"></i>Reférence<i
                                                    class="bi right bi-plus reference-bi"></i>
                                            </h5>
                                            <div class="col-12 form-floating form-hide mb-3 reference">
                                                <input type="text" name="cin" placeholder="" class="form-control"
                                                    id="cin" required oninvalid="displayError()">
                                                <label for="cin" class="form-label">Numéro CIN / Carte de
                                                    séjour</label>
                                            </div>
                                            <div class="col-12 form-floating form-hide mb-3 reference">
                                                <input type="text" name="income" placeholder="" class="form-control"
                                                    id="income" required oninvalid="displayError()">
                                                <label for="income" class="form-label">Total revenus mensuels
                                                    (net en DH)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title infos-client" onclick="displayElement('.coordonnee')">
                                                <i class="bi bi-geo-alt left"></i>Coordonnées<i
                                                    class="bi right bi-plus coordonnee-bi"></i>
                                            </h5>
                                            <div class="col-12 form-floating form-hide mb-3 coordonnee">
                                                <select name="region" onchange="loadTowns()" class="form-select"
                                                    id="idRegion" aria-label="State">
                                                </select>
                                                <label for="yourRegion" class="form-label">Votre région !
                                                </label>
                                            </div>
                                            <div class="col-12 form-floating form-hide mb-3 coordonnee">
                                                <select name="town" class="form-select" placeholder="" id="idTown">

                                                </select>
                                                <label for="yourTown" class="form-label">Votre ville actuelle
                                                    !</label>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title infos-client" onclick="displayElement('.contact')"><i
                                                    class="bi bi-telephone left"></i>Contact <i
                                                    class="bi right bi-plus contact-bi"></i></h5>
                                            <div class="col-12 form-floating form-hide mb-3 contact">
                                                <input type="text" name="email" placeholder="" class="form-control"
                                                    id="email" required oninvalid="displayError()">
                                                <label for="email" class="form-label">Adresse email</label>
                                            </div>
                                            <div class="col-12 form-floating form-hide mb-3 contact">
                                                <input type="text" name="phone" placeholder="" class="form-control"
                                                    id="phone" required oninvalid="displayError()">
                                                <label for="phone" class="form-label">Téléphone</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title infos-client"
                                                onclick="displayElement('.justificatifs')"><i
                                                    class="bi bi-file-earmark-text left"></i>Justificatifs<i
                                                    class="bi right bi-plus justificatifs-bi"></i></h5>

                                            <div class="col-12 form-floating form-hide mb-3 justificatifs">
                                                <input type="file" name="yourCIN" class="form-control"
                                                    accept="image/x-png,image/gif,image/jpeg,image/jpg" id="yourCIN"
                                                    required oninvalid="displayError()">
                                                <label for="yourCIN" class="form-label">Numéro CIN / Carte de
                                                    séjour</label>
                                            </div>

                                            <div class="col-12 form-floating form-hide mb-3 justificatifs">
                                                <input type="file" name="yourRIB" class="form-control"
                                                    accept="image/x-png,image/gif,image/jpeg,image/jpg" id="yourRIB"
                                                    required oninvalid="displayError()">
                                                <label for="yourRIB" class="form-label">Spécimen Chèque ou RIB
                                                </label>
                                            </div>
                                            <div class="col-12 form-floating form-hide mb-3 justificatifs">
                                                <input type="file" name="yourAdresse"
                                                    accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                    class="form-control" id="yourAdresse" required
                                                    oninvalid="displayError()">
                                                <label for="yourAdresse" class="form-label">Justificatif
                                                    d'adresse </label>
                                            </div>


                                        </div>
                                    </div>


                                </div>

                                <div class="card error-text">
                                    <p>Veuillez renseigner tous les champs !</p>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <a href="<?php echo $_SESSION['page'] ?>" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Revenir</a>
                                <button type="submit" class="btn btn-primary btn-send-infos-client" name=""> <i class="bi bi-plus-circle"></i> Ajouter
                                    ce client</button>
                            </div>
                        </form>
                    </section>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalCreditSuccessfully" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header row">
                <?php if (isset($_SESSION['updated'])) { ?>
                    <!-- <h2 class="card-title"> </h2> -->
                    <div class="pagetitle" style="text-align: center;">
                        <h1>Demande modifiée</h1>

                    </div><!-- End Page Title -->
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <div class="valide">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>

                            <p>La demande N°
                                <?php echo $_SESSION['temp'] ?> a été modifiée avec succès !

                                <?php unset($_SESSION['updated']);
                                unset($_SESSION['temp']); ?>
                            </p>
                            <h5>L'intitulé sera contacté dans 48h</h5>
                            <p>Votre confiance, notre source de motivation !</p>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="pagetitle" style="text-align: center;">
                        <h1>Demande ajoutée</h1>

                    </div><!-- End Page Title -->
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <div class="valide">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>

                            <p>La demande N°
                                <?php echo $_SESSION['temp'] ?> a été ajoutée au nom du client N°
                                <?php echo $_SESSION['author_temp'] ?>
                                <?php unset($_SESSION['author_temp']);
                                unset($_SESSION['temp']); ?>
                            </p>
                            <h5>L'intitulé sera contacté dans 48h</h5>
                            <p>Votre confiance, notre source de motivation !</p>
                        </div>
                    </div>
                <?php } ?>
                <a href="<?php echo $_SESSION['page'] ?>" class="btn btn-secondary">OK</a>

            </div>

        </div>
    </div>
</div>

<div class="modal fade mt-5" id="feedbackModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row modal-header" style="text-align: center;">
                <i class="col-12 bi bi-check-circle" style="font-size: 100px;"></i>
                <div class="col-12">
                    <div class="row">
                        <p class="info-dialog" id="successMessage"> </p>
                    </div>

                    <a href="<?php echo $_SESSION['page'] ?>" class="btn btn-secondary" id="back">OK</a>

                </div>

            </div>


        </div>
    </div>
</div>

<script>
    //Infos personnelle
    const form_info = document.getElementById("form-infos-client"),
        btn_send = form_info.querySelector(".btn-send-infos-client"),
        errorTextInfo = form_info.querySelector(".error-text");
    // successTextInfo = document.getElementById("success-infos");

    form_info.onsubmit = (e) => {
        e.preventDefault();
    }

    btn_send.onclick = () => {

        form_info.style.pointerEvents = "none";
        $('#mainPreloaderInfos').show();
        errorTextInfo.style.display = "none";
        form_info.style.opacity = .5;

        setTimeout(function () {
            $('#mainPreloaderInfos').hide();
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./users/agency/save-infos.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {

                        let responseData = JSON.parse(xhr.responseText);
                        let data = responseData.status.trim();
                        if (data === "success") {
                            $("#successMessage").html(responseData.message);
                            $("#modal-infos-client").modal('hide');
                            $("#feedbackModal").modal("show");
                            // successTextInfo.style.display = "block";
                        } else {
                            form_info.style.pointerEvents = "all";
                            form_info.style.opacity = 1;
                            errorTextInfo.style.display = "block";

                            errorTextInfo.innerHTML = responseData.message;

                        }
                    }
                }
            }
            let formData = new FormData(form_info);
            xhr.send(formData);
        }, 2000);


    }

</script>