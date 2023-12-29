<?php


$client_id = "OUP-1677027504S";
// $seller_id = $_SESSION['seller_id'];
$query_client = "SELECT * FROM `slf_user_client` WHERE client_id = '{$client_id}' ";
$result_client = $conn->query($query_client);
$client = $result_client->fetch_assoc();
// $_SESSION['page'] = "detail-cl?id=".$client_id;


// $_SESSION['cin_piece'] = $client['cin_piece'];
// $_SESSION['rib_piece'] = $client['rib_piece'];
// $_SESSION['adress_piece'] = $client['adress_piece'];
$select_credit = "SELECT * FROM `credit_client` WHERE client_id='$client_id'";
$result_select_credit = $conn->query($select_credit);
$credits = mysqli_fetch_all($result_select_credit, MYSQLI_ASSOC);
?>

<style>
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
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Mes
                                    infos
                                    personnelles</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-pieces">Mes
                                    Justificatifs</button>
                            </li>
                            <!-- <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="collapse" data-bs-target="#track-demand">Suivre mes
                                    demandes</button>
                            </li> -->
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview">Mes
                                    demandes</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores
                                    cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure
                                    rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at
                                    unde.</p>

                                <h5 class="card-title">Profile Details</h5>


                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-3 col-md-4 label">Company</div>
                                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job</div>
                                    <div class="col-lg-9 col-md-8">Web Designer</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8">USA</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit show active pt-3" id="profile-edit">

                                <div class="container" id="panelEdit">

                                    <div class="pagetitle">

                                        <h1><a href="<?php echo $_SESSION['page'] ?>"><i
                                                    class="bi bi-arrow-left"></i></a> Panel
                                            modification (Ref client
                                            : <b>
                                                <?php echo $client['client_id'] ?>
                                            </b>) </h1>
                                        <nav>
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="sim-fx?tag=fx">Simulation </a></li>
                                                <li class="breadcrumb-item">Référence Emprunteur </li>
                                            </ol>
                                        </nav>
                                    </div><!-- End Page Title -->
                                    <!-- <h2>Conditions d'Utilisation</h2> -->
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
                                                                    class="bi right bi-plus civilite-bi"></i></h5>
                                                            <div class="col-12 form-floating form-hide mb-3 civilite">
                                                                <input type="text" name="lname" placeholder=""
                                                                    value="<?php echo $client['lname'] ?>"
                                                                    class="form-control" id="lname" required>
                                                                <label for="lname" class="form-label">Nom</label>
                                                            </div>
                                                            <div class="col-12 form-floating form-hide mb-3 civilite">
                                                                <input type="text" name="fname" placeholder=""
                                                                    value="<?php echo $client['fname'] ?>"
                                                                    class="form-control" id="fname" required>
                                                                <label for="fname" class="form-label">Prénom</label>
                                                            </div>
                                                            <div class="col-12 form-floating form-hide mb-3 civilite">

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
                                                                    class="bi right bi-plus reference-bi"></i></h5>
                                                            <div class="col-12 form-floating form-hide mb-3 reference">
                                                                <input type="text" name="cin" placeholder=""
                                                                    value="<?php echo $client['cin'] ?>"
                                                                    class="form-control" required>
                                                                <label for="cin" class="form-label">Numéro CIN / Carte
                                                                    de
                                                                    séjour</label>
                                                            </div>
                                                            <div class="col-12 form-floating form-hide mb-3 reference">
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
                                                                    class="bi right bi-plus contact-bi"></i></h5>
                                                            <div class="col-12 form-floating form-hide mb-3 contact">
                                                                <input type="text" name="email" placeholder=""
                                                                    value="<?php echo $client['email'] ?>"
                                                                    class="form-control" id="email" required>
                                                                <label for="email" class="form-label">Adresse
                                                                    email</label>
                                                            </div>
                                                            <div class="col-12 form-floating form-hide mb-3 contact">
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
                                                                    class="bi right bi-plus coordonnee-bi"></i></h5>
                                                            <div class="col-12 form-floating form-hide mb-3 coordonnee">
                                                                <select name="region" onchange="loadTowns()"
                                                                    class="form-select" id="idRegion"
                                                                    aria-label="State">
                                                                    <!-- <option value="<?php echo $client['region'] ?>"><?php echo $client['region'] ?></option> -->
                                                                </select>
                                                                <label for="yourRegion" class="form-label">Votre région
                                                                    !
                                                                </label>
                                                            </div>
                                                            <div class="col-12 form-floating form-hide mb-3 coordonnee">
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

                            <div class="tab-pane fade pt-3" id="profile-pieces">

                                <div class="card">
                                    <div class="card-body row">
                                        <h5 class="card-title infos-client col-lg-12"
                                            onclick="displayElement('.justificatifs')">
                                            <i class="bi bi-file-earmark-text left"></i>Justificatifs<i
                                                class="bi right bi-plus justificatifs-bi"></i>
                                        </h5>

                                        <div class="col-lg-4 justificatifs">
                                            <div class="portfolio-wrap col-8 form-control">
                                                <img id="preview-inputImageCIN"
                                                    src="users/agency/images/<?php echo $client["cin_piece"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["cin_piece"] ?>"
                                                        class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                                                </div>

                                            </div>
                                            <label class="btn btn-outline-primary" for="inputImageCIN"><i
                                                    class="bi bi-file-image"></i>Changer</label>
                                            <input type="file" name="yourCIN"
                                                accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                class="form-control inputImage" id="inputImageCIN" required>
                                        </div>
                                        <div class="col-lg-4 justificatifs">
                                            <div class="portfolio-wrap col-8 form-control">
                                                <img id="preview-inputImageRib"
                                                    src="users/agency/images/<?php echo $client["rib_piece"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["rib_piece"] ?>"
                                                        class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                                                </div>

                                            </div>
                                            <label class="btn btn-outline-primary" for="inputImageRib"><i
                                                    class="bi bi-file-image"></i>Changer</label>
                                            <input type="file" name="yourRIB"
                                                accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                class="form-control inputImage" id="inputImageRib" required>
                                        </div>
                                        <div class="col-lg-4 justificatifs">
                                            <div class="portfolio-wrap col-8 form-control">
                                                <img id="preview-inputImageAdress"
                                                    src="users/agency/images/<?php echo $client["adress_piece"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["adress_piece"] ?>"
                                                        class="portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                                </div>
                                            </div>
                                            <label class="btn btn-outline-primary" for="inputImageAdress"><i
                                                    class="bi bi-file-image"></i>Changer</label>

                                            <input type="file" name="yourAdress"
                                                accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                class="form-control inputImage" id="inputImageAdress" required>
                                        </div>


                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="profileImage"
                                        class="col-md-4 col-lg-3 col-form-label">Justificatifs</label>
                                    <div class="col-md-8 col-lg-3">
                                        <span>CIN / Carte séjour</span>
                                        <img class="mt-3" src="users/client/images/cin.jpg"
                                            style="width: 130px; height: 100px;" alt="Profile">

                                        <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm"
                                                title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                                                    class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-3">
                                        <span>RIB</span>
                                        <img class="mt-3" src="users/client/images/rib.png"
                                            style="width: 130px; height: 100px;" alt="Profile">
                                        <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm"
                                                title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                                                    class="bi bi-trash"></i></a>

                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-3">
                                        <span>Adresse</span>
                                        <img class="mt-3" src="users/client/images/adress.png"
                                            style="width: 130px; height: 100px;" alt="Profile">
                                        <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm"
                                                title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                                                    class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<script>

    window.addEventListener("load", function () {
        $(".control").hide();
        // displayPreloader();
        loadRegions();
    });

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

    function loadRegions() {
        $(".form-hide").show();
        $.ajax({
            url: "users/region_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: "edit-region", REGION_POSTALE: "<?php echo $client['region'] ?>" },
            success: function (data) {
                $("#idRegion").html(data);

                const RegionID = $("#idRegion").val();

                $.ajax({
                    url: "users/region_retriever.php",
                    method: "POST",
                    data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
                    success: function (data) {
                        console.log(data);
                        $("#idTown").html(data);
                    }
                });
            }
        });
    }

    function loadTowns() {
        const RegionID = $("#idRegion").val();
        $.ajax({
            url: "users/region_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
            success: function (data) {
                $("#idTown").html(data);
            }
        });
    }

</script>