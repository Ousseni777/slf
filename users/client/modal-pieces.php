<div class="modal fade" id="modalPieces" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
    <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderPieces" role="status">
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
                <div class="row d-flex flex-column align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 row mt-3">
                        <!-- <span>CIN / Carte séjour</span> -->
                        <div
                            class="portfolio-wrap col-8 form-control d-flex flex-column align-items-center justify-content-center py-4">

                            <img id="preview-inputImageCIN" class="mt-3" src="users/client/images/cin.jpg"
                                style="width: 130px; height: 100px;" alt="Profile">

                        </div>
                        <label class="btn btn-outline-primary" for="inputImageCIN"><i class="bi bi-upload"></i> Charger
                            le CIN</label>

                        <input type="file" name="yourCIN" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                            class="form-control inputImage" id="inputImageCIN" required>

                    </div>
                    <div class="col-md-8 col-lg-6 row mt-3">
                        <!-- <span>RIB</span> -->
                        <div
                            class="portfolio-wrap col-8 form-control d-flex flex-column align-items-center justify-content-center py-4">

                            <img id="preview-inputImageRib" class="mt-3" src="users/client/images/rib.png"
                                style="width: 130px; height: 100px;" alt="Profile">

                        </div>

                        <label class="btn btn-outline-primary" for="inputImageRib"><i class="bi bi-upload"></i> Charger
                            le RIB</label>
                        <input type="file" name="yourRIB" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                            class="form-control inputImage" id="inputImageRib" required>

                    </div>
                    <div class="col-md-8 col-lg-6 row mt-3">
                        <!-- <span>Adresse</span> -->
                        <div
                            class="portfolio-wrap col-8 form-control d-flex flex-column align-items-center justify-content-center py-4">

                            <img id="preview-inputImageAdress" class="mt-3" src="users/client/images/adress.png"
                                style="width: 130px; height: 100px;" alt="Profile">

                        </div>

                        <label class="btn btn-outline-primary" for="inputImageAdress"><i class="bi bi-upload"></i>
                            Charger l'adresse</label>

                        <input type="file" name="yourAdress" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                            class="form-control inputImage" id="inputImageAdress" required>
                    </div>
                    <!-- <div class="col-lg-3"></div> -->

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalInfos">Retour</button>
                <button type="submit" class="btn btn-primary btn-send-pieces" name="btn-send-pieces">Terminer</button>
            </div>

        </div>
    </div>
</div>

<script>

    const formPieces = document.getElementById("formPieces"),
        btnContinuous = formPieces.querySelector(".btn-send-pieces"),
        errorTextPieces = formPieces.querySelector(".errors");

    formPieces.onsubmit = (e) => {
        e.preventDefault();
    }

    btnContinuous.onclick = () => {
        formPieces.style.pointerEvents = "none";
        $('#mainPreloaderPieces').show();
        errorTextPieces.style.display = "none";
        formPieces.style.opacity = .5;

        setTimeout(function () {
            $('#mainPreloaderPieces').hide();
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./users/client/save-pieces.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {

                        let data = xhr.response.trim();
                        if (data === "success") {

                            $("#modalPieces").modal("hide");
                        } else {
                            formPieces.style.pointerEvents = "all";
                            formPieces.style.opacity = 1;
                            errorTextPieces.style.display = "block";
                            errorTextPieces.innerHTML = data;

                        }
                    }
                }
            }

            let formData = new FormData(formPieces);
            xhr.send(formData);
        }, 2000);

    }
</script>