<style>
    .profile-new {
        padding: 20% 30%;
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

                            <div class="tab-pane fade profile-new card show active" id="profile-new">
                                <div class="card-body">
                                    <button class="btn btn-primary" style="padding: 5%;" data-bs-toggle="modal"
                                        data-bs-target="#modalInfos">Completez votre demande</button>
                                </div>
                            </div>
                            
                            <?php include("tab-overview.php") ?>

                            <div class="modal fade" id="modalInfos" role="dialog" tabindex="-1"
                                aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true"
                                data-bs-backdrop="false">

                                <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderInfos"
                                    role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="modal-dialog modal-dialog-scrollable">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="pagetitle">
                                                <h1>Infos personnelles</h1>
                                                <nav>
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item active">Infos</li>
                                                        <li class="breadcrumb-item">Justificatifs</li>
                                                    </ol>
                                                </nav>
                                            </div><!-- End Page Title -->
                                            <a href="./sim-cl?tag=chrono" class="btn-close" aria-label="Close"></a>
                                        </div>
                                        <div class="modal-body">

                                            <div class="container">
                                                <section class="section">
                                                    <form action="#" enctype="multipart/form-data" id="formInfos"
                                                        method="post">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"
                                                                            onclick="displayElement('.civilite')"><i
                                                                                class="bi bi-person left"></i>Civilité<i
                                                                                class="bi right bi-plus civilite-bi"></i>
                                                                        </h5>
                                                                        <div
                                                                            class="col-12  form-hide form-floating mb-3 civilite">
                                                                            <input type="text" name="lname"
                                                                                class="form-control" id="lname"
                                                                                required>
                                                                            <label for="lname"
                                                                                class="form-label">Nom</label>
                                                                        </div>
                                                                        <div
                                                                            class="col-12  form-hide form-floating mb-3 civilite">
                                                                            <input type="text" name="fname"
                                                                                class="form-control" id="fname"
                                                                                required>
                                                                            <label for="fname"
                                                                                class="form-label">Prénom</label>
                                                                        </div>
                                                                        <div
                                                                            class="col-6  form-hide form-floating mb-3 civilite">

                                                                            <span> Titre</span>
                                                                            <br>
                                                                            <div class="form-check"
                                                                                style="float: left;">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="title"
                                                                                    id="titleM" value="Masculin"
                                                                                    checked>
                                                                                <label class="form-check-label"
                                                                                    for="titleM">
                                                                                    Masculin
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check"
                                                                                style="float: right;">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="title"
                                                                                    id="titleF" value="Masculin">
                                                                                <label class="form-check-label"
                                                                                    for="titleF">
                                                                                    Feminin
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"
                                                                            onclick="displayElement('.reference')"><i
                                                                                class="bi bi-file-earmark-text left"></i>Reférence<i
                                                                                class="bi right bi-plus reference-bi"></i>
                                                                        </h5>
                                                                        <div
                                                                            class="col-12  form-hide form-floating mb-3 reference">
                                                                            <input type="text" name="cin"
                                                                                class="form-control" id="cin" required>
                                                                            <label for="cin" class="form-label">Numéro
                                                                                CIN / Carte de
                                                                                séjour</label>
                                                                        </div>
                                                                        <div
                                                                            class="col-12  form-hide form-floating mb-3 reference">
                                                                            <input type="text" name="income"
                                                                                class="form-control" id="income"
                                                                                required>
                                                                            <label for="income" class="form-label">Total
                                                                                revenus mensuels
                                                                                (net en DH)</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-body">

                                                                        <h5 class="card-title"
                                                                            onclick="displayElement('.coordonnee')"><i
                                                                                class="bi bi-geo-alt left"></i>Coordonnées<i
                                                                                class="bi right bi-plus coordonnee-bi"></i>
                                                                        </h5>
                                                                        <div
                                                                            class="col-12  form-hide form-floating mb-3 coordonnee">
                                                                            <select name="" style="display: none ;" id="isNew"></select>
                                                                            <select name="region" onchange="loadTowns()"
                                                                                class="form-select" id="idRegion"
                                                                                aria-label="State">
                                                                            </select>
                                                                            <label for="idRegion"
                                                                                class="form-label">Votre région !
                                                                            </label>
                                                                        </div>
                                                                        <div
                                                                            class="col-12  form-hide form-floating mb-3 coordonnee">
                                                                            <select name="town" class="form-select"
                                                                                id="idTown">

                                                                            </select>
                                                                            <label for="idTown" class="form-label">Votre
                                                                                ville actuelle
                                                                                !</label>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>


                                                            <div class="card errors">

                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="./sim-cl?tag=chrono"
                                                                class="btn btn-secondary">Revenir</a>
                                                            <button type="submit" class="btn btn-primary btn-send-infos"
                                                                id="btn-continuous" name="infos_pieces">Continuer

                                                            </button>
                                                        </div>
                                                    </form>

                                                </section>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
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


</main>


<script>


    document.getElementById("nav-link-track").addEventListener("click", function () {
        $("#profile-new").hide();
    })

    document.getElementById("nav-link-pieces").addEventListener("click", function () {
        $("#profile-new").show();

    })
    document.getElementById("nav-link-infos").addEventListener("click", function () {
        $("#profile-new").show();
    })

    document.getElementById("nav-link-new").addEventListener("click", function () {
        $("#profile-new").show();
    })

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

    const formInfos = document.getElementById("formInfos"),
        btnContinuous = formInfos.querySelector(".btn-send-infos"),
        errorText = formInfos.querySelector(".errors");

    formInfos.onsubmit = (e) => {
        e.preventDefault();
    }

    btnContinuous.onclick = () => {
        formInfos.style.pointerEvents = "none";
        $('#mainPreloaderInfos').show();
        errorText.style.display = "none";
        formInfos.style.opacity = .5;
        console.log("cliquer");

        setTimeout(function () {
            $('#mainPreloaderInfos').hide();
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./users/client/save-infos.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {

                        let data = xhr.response.trim();
                        if (data === "success") {

                            $("#modalInfos").modal("hide");
                            $("#modalPieces").modal("show");
                        } else {
                            formInfos.style.pointerEvents = "all";
                            formInfos.style.opacity = 1;
                            errorText.style.display = "block";
                            errorText.innerHTML = data;

                        }
                    }
                }
            }

            let formData = new FormData(formInfos);
            xhr.send(formData);
        }, 2000);

    }

    function loadRegionsNew() {
        $.ajax({
            url: "users/region_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: "region"},
            success: function (data) {
                $("#idRegion").html(data);

                const RegionID = $("#idRegion").val();

                $.ajax({
                    url: "users/region_retriever.php",
                    method: "POST",
                    data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
                    success: function (data) {
                        // console.log(data);
                        $("#idTown").html(data);
                    }
                });
            }
        });
    }


</script>