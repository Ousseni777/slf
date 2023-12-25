<?php
ob_start();
session_start();
include './connectToDB.php';
$client_id = $_GET["id"];
$seller_id = $_SESSION['seller_id'];
$query_client = "SELECT * FROM `slf_user_client` WHERE cin = '{$client_id}' AND seller_id='$seller_id' ";
$result_client = $conn->query($query_client);


if ($result_client->num_rows > 0) {
    $client = $result_client->fetch_assoc();

    $_SESSION['cin_piece'] = $client['cin_piece'];
    $_SESSION['rib_piece'] = $client['rib_piece'];
    $_SESSION['adress_piece'] = $client['adress_piece'];
    $select_credit = "SELECT * FROM `credit_client` WHERE client_id='$client_id'";
    $result_select_credit = $conn->query($select_credit);
    $credits = mysqli_fetch_all($result_select_credit, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Bre</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="./assets/img/favicon.png" rel="icon">
    <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="./assets/css/style-form.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <style>
        .spinner-edit {
            position: absolute;
            z-index: 1;
            left: 56%;
            top: 45%;
            display: none;
        }

        .card-body .form-hide {
            display: none;
        }

        .success-text {
            display: none;
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

        #panelEdit {
            display: none;
        }

        .inputImage {
            display: none;
        }

        .labelInputImage:hover {
            cursor: pointer;
        }

        #mainPreloader {
            margin-left: 55%;
            margin-top: 25%;

        }

        @media (max-width: 1199px) {
            #mainPreloader {
                margin-left: 40%;
                margin-top: 85%;
                padding: 20px;
            }
        }

        .portfolio-wrap {
            transition: 0.3s;
            position: relative;
            overflow: hidden;
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
            height: 80px;
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

        .infoR {
            float: right;
            font-size: 14px;
            width: 40%;
            text-align: right;
            background-color: #f6f9ff;
            color: rgb(6, 161, 53);
            border: none;
        }

        .infoL {
            background-color: #f6f9ff;
            padding-left: 2%;
            padding-right: 2%;
        }

        /* .logo {

                width: 150px;
                height: 100px;
            } */

        .hr {
            width: 50%;
            margin-left: 25%;
        }


        /* .card-body .form-floating {
                display: none;
            } */

        .card-body:hover {
            background-color: #f6f9ff;
        }

        .right {
            float: right;
            margin-right: 3%;
            font-size: 35px;
        }

        .status {
            text-align: center;
            color: green;
            border-radius: 5px;
        }

        .sort {
            text-align: right;
        }

        #main {
            opacity: 0;
            transition: opacity .8s ease .3s;
        }

        #main.show {
            opacity: 1;
        }
    </style>

</head>

<body>

    <?php
    include 'header.php';

    include 'siderbar.php';
    ?>

    <main class="main" id="main">
        <section class="section">

            <div class="container" id="panelEdit">
                <div class="spinner-border text-danger spinner-edit" id="preloaderForEdit" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="pagetitle">

                    <h1><a href="<?php echo $_SESSION['page'] ?>"><i class="bi bi-arrow-left"></i></a> Panel
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
                                                class="bi right bi-plus civilite-bi"></i></h5>
                                        <div class="col-12 form-floating form-hide mb-3 civilite">
                                            <input type="text" name="lname" placeholder=""
                                                value="<?php echo $client['lname'] ?>" class="form-control" id="lname"
                                                required>
                                            <label for="lname" class="form-label">Nom</label>
                                        </div>
                                        <div class="col-12 form-floating form-hide mb-3 civilite">
                                            <input type="text" name="fname" placeholder=""
                                                value="<?php echo $client['fname'] ?>" class="form-control" id="fname"
                                                required>
                                            <label for="fname" class="form-label">Prénom</label>
                                        </div>
                                        <div class="col-12 form-floating form-hide mb-3 civilite">

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
                                                class="bi right bi-plus reference-bi"></i></h5>
                                        <div class="col-12 form-floating form-hide mb-3 reference">
                                            <input type="text" name="cin" placeholder=""
                                                value="<?php echo $client['cin'] ?>" class="form-control" id="cin"
                                                required>
                                            <label for="cin" class="form-label">Numéro CIN / Carte de
                                                séjour</label>
                                        </div>
                                        <div class="col-12 form-floating form-hide mb-3 reference">
                                            <input type="text" name="income" placeholder=""
                                                value="<?php echo $client['income'] ?>" class="form-control" id="income"
                                                required>
                                            <label for="income" class="form-label">Total revenus mensuels
                                                (net en DH)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title infos-client" onclick="displayElement('.coordonnee')"><i
                                                class="bi bi-geo-alt left"></i>Coordonnées<i
                                                class="bi right bi-plus coordonnee-bi"></i></h5>
                                        <div class="col-12 form-floating form-hide mb-3 coordonnee">
                                            <select name="region" onchange="loadTowns()" class="form-select"
                                                id="idRegion" aria-label="State">
                                                <!-- <option value="<?php echo $client['region'] ?>"><?php echo $client['region'] ?></option> -->
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

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title infos-client" onclick="displayElement('.contact')"><i
                                                class="bi bi-telephone left"></i>Contact <i
                                                class="bi right bi-plus contact-bi"></i></h5>
                                        <div class="col-12 form-floating form-hide mb-3 contact">
                                            <input type="text" name="email" placeholder=""
                                                value="<?php echo $client['email'] ?>" class="form-control" id="email"
                                                required>
                                            <label for="email" class="form-label">Adresse email</label>
                                        </div>
                                        <div class="col-12 form-floating form-hide mb-3 contact">
                                            <input type="text" name="phone" placeholder=""
                                                value="<?php echo $client['phone'] ?>" class="form-control" id="phone"
                                                required>
                                            <label for="phone" class="form-label">Téléphone</label>
                                        </div>
                                    </div>
                                </div>

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

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-outline-success btn-send-infos-client"
                                        name="">Sauvegarder les modifications</button>
                                </div>
                            </div>




                        </div>

                    </form>
                </section>

            </div>
            <div class="row mt-5" id="panelDetail">
                <div class="pagetitle">
                    <h1><a href="<?php echo $_SESSION['page'] ?>"><i class="bi bi-arrow-left"></i></a> Ref client : <b>
                            <?php echo $client['client_id'] ?>
                        </b> </h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="sim-fx?tag=fx">Simulation</a></li>
                            <li class="breadcrumb-item">Emprunteur</li>
                        </ol>
                    </nav>
                </div><!-- End Page Title -->
                <!-- <div class="col-3"></div> -->

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body mt-3">
                            <span class="infoL"> Identifiant du client : </span>
                            <input type="text" readonly value="<?php echo $client['client_id'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL"> Nom : </span> <input type="text" readonly
                                value="<?php echo $client['lname'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL"> Prénom : </span> <input type="text" readonly
                                value="<?php echo $client['fname'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">CIN / Carte de séjour : </span> <input type="text" readonly
                                value="<?php echo $client['cin'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">Email : </span> <input type="text" readonly
                                value="<?php echo $client['email'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">Téléphone : </span> <input type="text" readonly
                                value="<?php echo $client['phone'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">Revenue mensuel : </span> <input type="text" readonly
                                value="<?php echo $client['income'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">Ville de résidence : </span> <input type="text" readonly
                                value="<?php echo $client['town'] ?>" class="infoR">
                        </div>


                    </div>

                </div>
                <div class="row col-lg-4">

                    <div class="col-lg-12 card">
                        <div class="card-body">
                            <h5 class="card-title">#Référence des crédit</h5>
                            <?php if (count($credits) > 0) {
                                foreach ($credits as $credit) { ?>
                                    <a href="./detail-cr?id=<?php echo $credit['credit_id'] ?>" class="form-control status">#
                                        <?php echo $credit['credit_id'] ?>
                                    </a>
                                <?php }
                            } else { ?>
                                <p class="status mt-5">Aucune demande n'a été effectuée pour ce client</p>
                            <?php } ?>
                        </div>
                    </div>


                    <div class="col-lg-12">

                        <button class="btn btn-primary" id="btn-edit"><i
                                class="bi bi-pencil-square"></i>Modifier</button>
                        <button class="btn btn-danger"><i class="bi bi-x-circle"></i>Supprimer</button>

                    </div>

                </div>


            </div>
        </section>
    </main>
    <div class="main spinner-grow text-danger" id="mainPreloader" role="status">
        <span class="visually-hidden">Loading...</span>
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

    <?php include 'users/agency/new-client.php'; ?>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>

    <!-- <script type="text/javascript" src="ax_script_auto.js"></script> -->
    <script type="text/javascript" src="assets/js/main-form.js"></script>

    <!-- Template Main JS File -->
    <!-- <script src="assets/js/main.js"></script> -->
    <script>

        window.addEventListener("load", function () {
            $(".control").hide();
            displayPreloader();
            <?php if (isset($_GET['edit']) && $_GET['edit'] == 1) {
                echo '$("#panelEdit").show();
                $("#panelDetail").hide();';
                echo 'loadRegions();';
            } ?>
        });

        btnEdit = document.getElementById('btn-edit');
        btnEdit.addEventListener("click", function () {
            loadRegions();

            $("#panelEdit").show();
            $("#panelDetail").hide();
        });

        const form_client = document.getElementById("form-client"),
            btnSend = form_client.querySelector(".btn-send-infos-client"),
            errorText = form_client.querySelector(".error-text"),
            successTextInfo = document.getElementById("success-infos");

        form_client.onsubmit = (e) => {
            e.preventDefault();
        }

        btnSend.onclick = () => {

            form_client.style.pointerEvents = "none";
            $('#preloaderForEdit').show();
            errorText.style.display = "none";
            form_client.style.opacity = .5;


            setTimeout(function () {
                $('#preloaderForEdit').hide();
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "./users/agency/edit-infos.php", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {

                            let responseData = JSON.parse(xhr.responseText);
                            let data = responseData.status.trim();

                            if (data === "success") {
                                $("#successMessage").html(responseData.message);
                                $("#feedbackModal").modal("show");
                                // successTextInfo.style.display = "block";
                            } else {
                                form_client.style.pointerEvents = "all";
                                form_client.style.opacity = 1;
                                errorText.style.display = "block";

                                errorText.innerHTML = responseData.message;

                            }
                        }
                    }
                }
                let formData = new FormData(form_client);
                xhr.send(formData);
            }, 2000);


        }


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
        function displayPreloader() {


            $('#main').hide();
            $('#mainPreloader').show();
            document.getElementById('main').classList.remove('show');


            setTimeout(function () {
                $('#mainPreloader').hide();

                $('#main').show();
                document.getElementById('main').classList.add('show');
            }, 800);


        }

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

</body>

</html>
<?php
ob_end_flush();
?>