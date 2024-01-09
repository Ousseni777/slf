<div class="modal fade" id="modalInfos" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">

    <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderInfos" role="status">
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
                        <form action="#" enctype="multipart/form-data" id="formInfos" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title" onclick="displayElement('.civilite')"><i
                                                    class="bi bi-person left"></i>Civilité<i
                                                    class="bi right bi-plus civilite-bi"></i>
                                            </h5>
                                            <div class="col-12  form-hide form-floating mb-3 civilite">
                                                <input type="text" name="lname" class="form-control" id="lname"
                                                    required>
                                                <label for="lname" class="form-label">Nom</label>
                                            </div>
                                            <div class="col-12  form-hide form-floating mb-3 civilite">
                                                <input type="text" name="fname" class="form-control" id="fname"
                                                    required>
                                                <label for="fname" class="form-label">Prénom</label>
                                            </div>
                                            <div class="col-6  form-hide form-floating mb-3 civilite">

                                                <span> Titre</span>
                                                <br>
                                                <div class="form-check" style="float: left;">
                                                    <input class="form-check-input" type="radio" name="title"
                                                        id="titleM" value="Masculin" checked>
                                                    <label class="form-check-label" for="titleM">
                                                        Masculin
                                                    </label>
                                                </div>
                                                <div class="form-check" style="float: right;">
                                                    <input class="form-check-input" type="radio" name="title"
                                                        id="titleF" value="Masculin">
                                                    <label class="form-check-label" for="titleF">
                                                        Feminin
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title" onclick="displayElement('.reference')"><i
                                                    class="bi bi-file-earmark-text left"></i>Reférence<i
                                                    class="bi right bi-plus reference-bi"></i>
                                            </h5>
                                            <div class="col-12  form-hide form-floating mb-3 reference">
                                                <input type="text" name="cin" class="form-control" id="cin" required>
                                                <label for="cin" class="form-label">Numéro
                                                    CIN / Carte de
                                                    séjour</label>
                                            </div>
                                            <div class="col-12  form-hide form-floating mb-3 reference">
                                                <input type="text" name="income" class="form-control" id="income"
                                                    required>
                                                <label for="income" class="form-label">Total
                                                    revenus mensuels
                                                    (net en DH)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">

                                            <h5 class="card-title" onclick="displayElement('.coordonnee')"><i
                                                    class="bi bi-geo-alt left"></i>Coordonnées<i
                                                    class="bi right bi-plus coordonnee-bi"></i>
                                            </h5>
                                            <div class="col-12  form-hide form-floating mb-3 coordonnee">
                                                <select name="" style="display: none ;" id="isNew"></select>
                                                <select name="region" onchange="loadTowns()" class="form-select"
                                                    id="idRegion" aria-label="State">
                                                </select>
                                                <label for="idRegion" class="form-label">Votre région !
                                                </label>
                                            </div>
                                            <div class="col-12  form-hide form-floating mb-3 coordonnee">
                                                <select name="town" class="form-select" id="idTown">

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
                                <a href="./sim-cl?tag=chrono" class="btn btn-secondary">Revenir</a>
                                <button type="submit" class="btn btn-primary btn-send-infos" id="btn-continuous"
                                    name="infos_pieces">Continuer

                                </button>
                            </div>
                        </form>

                    </section>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
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
</script>