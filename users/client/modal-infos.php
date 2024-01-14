<style>
    .form-hide{
        display: none;
    }
</style>
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
                        <form action="#" enctype="multipart/form-data" id="form-client-infos" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title" onclick="displayElement('.civilite')"><i
                                                    class="bi bi-person left"></i>Civilité<i
                                                    class="bi right bi-dash civilite-bi"></i>
                                            </h5>
                                            <div class="col-12  form-hide form-floating mb-3 civilite">
                                                <input type="text" name="LNAME" class="form-control" id="lname"
                                                    >
                                                <label for="lname" class="form-label">Nom</label>
                                            </div>
                                            <div class="col-12  form-hide form-floating mb-3 civilite">
                                                <input type="text" name="FNAME" class="form-control" id="fname"
                                                    >
                                                <label for="fname" class="form-label">Prénom</label>
                                            </div>
                                            <div class="col-6  form-hide form-floating mb-3 civilite">

                                                <span> Titre</span>
                                                <br>
                                                <div class="form-check" style="float: left;">
                                                    <input class="form-check-input" type="radio" name="TITLE"
                                                        id="titleM" value="Homme" checked>
                                                    <label class="form-check-label" for="titleM">
                                                    Homme
                                                    </label>
                                                </div>
                                                <div class="form-check" style="float: right;">
                                                    <input class="form-check-input" type="radio" name="TITLE"
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
                                            <h5 class="card-title" onclick="displayElement('.reference')"><i
                                                    class="bi bi-file-earmark-text left"></i>Reférence<i
                                                    class="bi right bi-plus reference-bi"></i>
                                            </h5>
                                            <div class="col-12  form-hide form-floating mb-3 reference">
                                                <input type="text" name="CLIENT_CIN" class="form-control" id="cin" >
                                                <label for="cin" class="form-label">Numéro
                                                    CIN / Carte de
                                                    séjour</label>
                                            </div>
                                            <div class="col-12  form-hide form-floating mb-3 reference">
                                                <input type="text" name="INCOME" class="form-control" id="income"
                                                    >
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
                                                <select name="REGION" onchange="loadTowns()" class="form-select"
                                                    id="idRegion" aria-label="State">
                                                </select>
                                                <label for="idRegion" class="form-label">Votre région !
                                                </label>
                                            </div>
                                            <div class="col-12  form-hide form-floating mb-3 coordonnee">
                                                <select name="TOWN" class="form-select" id="idTown">

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
                                <a href="<?php echo $_SESSION['page'] ?>" class="btn btn-secondary">Revenir</a>
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
