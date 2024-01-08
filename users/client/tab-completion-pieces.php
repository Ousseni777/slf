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
        /* display: none; */
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
        <h1>Complétez vos informations personnelles pour finaliser votre demande </h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Infos</li>
                <li class="breadcrumb-item active">Justificatifs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



    <section class="section profile mt-3">
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

                            <?php include("edit-infos.php") ?>
                            <?php include("tab-overview-credit.php") ?>

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
                                            <div class="container">
                                                <!-- <h2>Conditions d'Utilisation</h2> -->
                                                <section class="section">

                                                    <form action="#" id="form-infos-client"
                                                        enctype="multipart/form-data" method="POST">

                                                        <div
                                                            class="row d-flex flex-column align-items-center justify-content-center">
                                                            <div class="col-md-8 col-lg-6 row mt-3">
                                                                <!-- <span>CIN / Carte séjour</span> -->
                                                                <div
                                                                    class="portfolio-wrap col-8 form-control d-flex flex-column align-items-center justify-content-center py-4">

                                                                    <img id="preview-inputImageCIN" class="mt-3"
                                                                        src="users/client/images/cin.jpg"
                                                                        style="width: 130px; height: 100px;"
                                                                        alt="Profile">

                                                                </div>
                                                                <label class="btn btn-outline-primary"
                                                                    for="inputImageCIN"><i class="bi bi-upload"></i>
                                                                    Charger
                                                                    le CIN</label>

                                                                <input type="file" name="yourCIN"
                                                                    accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                                    class="form-control inputImage" id="inputImageCIN"
                                                                    required>

                                                            </div>
                                                            <div class="col-md-8 col-lg-6 row mt-3">
                                                                <!-- <span>RIB</span> -->
                                                                <div
                                                                    class="portfolio-wrap col-8 form-control d-flex flex-column align-items-center justify-content-center py-4">

                                                                    <img id="preview-inputImageRib" class="mt-3"
                                                                        src="users/client/images/rib.png"
                                                                        style="width: 130px; height: 100px;"
                                                                        alt="Profile">

                                                                </div>

                                                                <label class="btn btn-outline-primary"
                                                                    for="inputImageRib"><i class="bi bi-upload"></i>
                                                                    Charger
                                                                    le RIB</label>
                                                                <input type="file" name="yourRIB"
                                                                    accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                                    class="form-control inputImage" id="inputImageRib"
                                                                    required>

                                                            </div>
                                                            <div class="col-md-8 col-lg-6 row mt-3">
                                                                <!-- <span>Adresse</span> -->
                                                                <div
                                                                    class="portfolio-wrap col-8 form-control d-flex flex-column align-items-center justify-content-center py-4">

                                                                    <img id="preview-inputImageAdress" class="mt-3"
                                                                        src="users/client/images/adress.png"
                                                                        style="width: 130px; height: 100px;"
                                                                        alt="Profile">

                                                                </div>

                                                                <label class="btn btn-outline-primary"
                                                                    for="inputImageAdress"><i class="bi bi-upload"></i>
                                                                    Charger l'adresse</label>

                                                                <input type="file" name="yourAdress"
                                                                    accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                                    class="form-control inputImage"
                                                                    id="inputImageAdress" required>
                                                            </div>
                                                            <!-- <div class="col-lg-3"></div> -->
                                                            <div class="card errors">

</div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" id="back">Revenir</button>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-send-pieces"
                                                                name="btn-send-pieces">Terminer</button>
                                                        </div>
                                                    </form>
                                                </section>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>
                </div>

            </div>

            <?php include("tab-recap.php") ?>
        </div>
    </section>


</main><!-- End #main -->



<script>


    document.getElementById("back").addEventListener("click", function () {
        $("#modalPieces").modal('hide');
    })
    document.getElementById("nav-link-track").addEventListener("click", function () {
        $("#profile-new").hide();
    })

    document.getElementById("nav-link-pieces").addEventListener("click", function () {
        $("#profile-new").show();

    })
    document.getElementById("nav-link-infos").addEventListener("click", function () {
        $("#profile-new").hide();
    })

    document.getElementById("nav-link-new").addEventListener("click", function () {
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