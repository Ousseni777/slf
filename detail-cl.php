<?php
ob_start();
session_start();
include './connectToDB.php';
$CLIENT_ID_UK = $_GET["id"];
$SELLER_ID_UK = $_SESSION['SELLER_ID_UK'];
$query_client = "SELECT * FROM `slf_user_client` WHERE CLIENT_CIN = '{$CLIENT_ID_UK}' AND SELLER_ID='$SELLER_ID_UK' ";
$result_client = $conn->query($query_client);
// $_SESSION['page'] = "detail-cl?id=".$CLIENT_ID_UK;

if ($result_client->num_rows > 0) {
    $client = $result_client->fetch_assoc();

    $_SESSION['CIN_PIECE'] = $client['CIN_PIECE'];
    $_SESSION['RIB_PIECE'] = $client['RIB_PIECE'];
    $_SESSION['ADRESS_PIECE'] = $client['ADRESS_PIECE'];
    $select_credit = "SELECT * FROM `credit_client` WHERE CLIENT_ID='$CLIENT_ID_UK'";
    $result_select_credit = $conn->query($select_credit);
    $credits = mysqli_fetch_all($result_select_credit, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <TITLE>Components / Bre</TITLE>
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
            position: fixed;
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
    <div class="spinner-border text-danger spinner-edit" id="preloaderForEdit" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    <?php
    include 'header.php';

    include 'siderbar.php';
    ?>

    <main class="main" id="main">

        <section class="section">

            <div class="container" id="panelEdit">

                <div class="pageTITLE">

                    <h1><a href="<?php echo $_SESSION['page'] ?>"><i class="bi bi-arrow-left"></i></a> Panel
                        modification (Ref client
                        : <b>
                            <?php echo $client['CLIENT_ID_UK'] ?>
                        </b>) </h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="sim-fx?tag=fx">Client </a></li>
                            <li class="breadcrumb-item active">Référence Emprunteur </li>
                        </ol>
                    </nav>
                </div><!-- End Page TITLE -->
                <!-- <h2>Conditions d'Utilisation</h2> -->
                <section class="section">

                    <form action="#" id="form-client" enctype="multipart/form-data" method="POST">

                        <div class="row">
                            <div class="success-text" id="success-infos">
                                <div class="alert alert-success" role="alert" style="text-align:center;">
                                    <h4 class="alert-heading">Client N°
                                        <?php echo $client['CLIENT_CIN'] ?> modifié !
                                    </h4>
                                </div>
                            </div>
                            <div class="card error-text">
                                <p>Veuillez renseigner tous les champs !</p>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <input type="text" value="<?php echo $client['CLIENT_ID_UK'] ?>" name="CLIENT_ID_UK"
                                        style="display: none;">
                                    <div class="card-body">
                                        <h5 class="card-TITLE infos-client" onclick="displayElement('.civilite')"><i
                                                class="bi bi-person left"></i>Civilité<i
                                                class="bi right bi-plus civilite-bi"></i></h5>
                                        <div class="col-12 form-floating form-hide mb-3 civilite">
                                            <input type="text" name="LNAME" placeholder=""
                                                value="<?php echo $client['LNAME'] ?>" class="form-control" id="LNAME"
                                                required>
                                            <label for="LNAME" class="form-label">Nom</label>
                                        </div>
                                        <div class="col-12 form-floating form-hide mb-3 civilite">
                                            <input type="text" name="FNAME" placeholder=""
                                                value="<?php echo $client['FNAME'] ?>" class="form-control" id="FNAME"
                                                required>
                                            <label for="FNAME" class="form-label">Prénom</label>
                                        </div>
                                        <div class="col-12 form-floating form-hide mb-3 civilite">

                                            <span> Titre</span>
                                            <br>
                                            <div class="form-check" style="float: left;">
                                                <?php if ($client['TITLE'] == "Homme") { ?>
                                                    <input class="form-check-input" type="radio" name="TITLE" id="TITLEM"
                                                        value="Homme" checked>
                                                <?php } else { ?>
                                                    <input class="form-check-input" type="radio" name="TITLE" id="TITLEM"
                                                        value="Homme">
                                                <?php } ?>
                                                <label class="form-check-label" for="TITLEM">
                                                    Homme
                                                </label>
                                            </div>
                                            <div class="form-check" style="float: right;">
                                                <?php if ($client['TITLE'] == "Femme") { ?>
                                                    <input class="form-check-input" type="radio" name="TITLE" id="TITLEF"
                                                        value="Femme" checked>
                                                <?php } else { ?>
                                                    <input class="form-check-input" type="radio" name="TITLE" id="TITLEF"
                                                        value="Femme">
                                                <?php } ?>
                                                <label class="form-check-label" for="TITLEF">
                                                    Femme
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-TITLE infos-client" onclick="displayElement('.reference')"><i
                                                class="bi bi-file-earmark-text left"></i>Reférence<i
                                                class="bi right bi-plus reference-bi"></i></h5>
                                        <div class="col-12 form-floating form-hide mb-3 reference">
                                            <input type="text" name="CLIENT_CIN" placeholder=""
                                                value="<?php echo $client['CLIENT_CIN'] ?>" class="form-control"
                                                required>
                                            <label for="CLIENT_CIN" class="form-label">Numéro CIN / Carte de
                                                séjour</label>
                                        </div>
                                        <div class="col-12 form-floating form-hide mb-3 reference">
                                            <input type="text" name="INCOME" placeholder=""
                                                value="<?php echo $client['INCOME'] ?>" class="form-control" id="INCOME"
                                                required>
                                            <label for="INCOME" class="form-label">Total revenus mensuels
                                                (net en DH)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-TITLE infos-client" onclick="displayElement('.coordonnee')"><i
                                                class="bi bi-geo-alt left"></i>Coordonnées<i
                                                class="bi right bi-plus coordonnee-bi"></i></h5>
                                        <div class="col-12 form-floating form-hide mb-3 coordonnee">
                                            <select name="REGION" onchange="loadTowns()" class="form-select"
                                                id="idRegion" aria-label="State">
                                                <!-- <option value="<?php echo $client['REGION'] ?>"><?php echo $client['REGION'] ?></option> -->
                                            </select>
                                            <label for="yourRegion" class="form-label">Votre région !
                                            </label>
                                        </div>
                                        <div class="col-12 form-floating form-hide mb-3 coordonnee">
                                            <select name="TOWN" class="form-select" placeholder="" id="idTown">

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
                                        <h5 class="card-TITLE infos-client" onclick="displayElement('.contact')"><i
                                                class="bi bi-telePHONE left"></i>Contact <i
                                                class="bi right bi-plus contact-bi"></i></h5>
                                        <div class="col-12 form-floating form-hide mb-3 contact">
                                            <input type="text" name="EMAIL" placeholder=""
                                                value="<?php echo $client['EMAIL'] ?>" class="form-control" id="EMAIL"
                                                required>
                                            <label for="EMAIL" class="form-label">Adresse EMAIL</label>
                                        </div>
                                        <div class="col-12 form-floating form-hide mb-3 contact">
                                            <input type="text" name="PHONE" placeholder=""
                                                value="<?php echo $client['PHONE'] ?>" class="form-control" id="PHONE"
                                                required>
                                            <label for="PHONE" class="form-label">TéléPHONE</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body row">
                                        <h5 class="card-TITLE infos-client col-lg-12"
                                            onclick="displayElement('.justificatifs')">
                                            <i class="bi bi-file-earmark-text left"></i>Justificatifs<i
                                                class="bi right bi-plus justificatifs-bi"></i>
                                        </h5>

                                        <div class="col-lg-4 justificatifs">
                                            <div class="portfolio-wrap col-8 form-control">
                                                <img id="preview-inputImageCIN"
                                                    src="users/agency/images/<?php echo $client["CIN_PIECE"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["CIN_PIECE"] ?>"
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
                                                    src="users/agency/images/<?php echo $client["RIB_PIECE"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["RIB_PIECE"] ?>"
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
                                                    src="users/agency/images/<?php echo $client["ADRESS_PIECE"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["ADRESS_PIECE"] ?>"
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
                <div class="pageTITLE">
                    <h1><a href="<?php echo $_SESSION['page'] ?>"><i class="bi bi-arrow-left"></i></a> Ref client : <b>
                            <?php echo $client['CLIENT_ID_UK'] ?>
                        </b> </h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Client</li>
                            <li class="breadcrumb-item active">Detail client</li>
                        </ol>
                    </nav>
                </div><!-- End Page TITLE -->
                <!-- <div class="col-3"></div> -->

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body mt-3">
                            <span class="infoL"> Identifiant du client : </span>
                            <input type="text" readonly value="<?php echo $client['CLIENT_ID_UK'] ?>"
                                class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL"> Nom : </span> <input type="text" readonly
                                value="<?php echo $client['LNAME'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL"> Prénom : </span> <input type="text" readonly
                                value="<?php echo $client['FNAME'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">CIN / Carte de séjour : </span> <input id="cin_client"  type="text" readonly
                                value="<?php echo $client['CLIENT_CIN'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">EMAIL : </span> <input type="text" readonly
                                value="<?php echo $client['EMAIL'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">TéléPHONE : </span> <input type="text" readonly
                                value="<?php echo $client['PHONE'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">Revenue mensuel : </span> <input type="text" readonly
                                value="<?php echo $client['INCOME'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">Ville de résidence : </span> <input type="text" readonly
                                value="<?php echo $client['TOWN'] ?>" class="infoR">
                        </div>


                    </div>

                </div>
                <div class="row col-lg-4">

                    <div class="col-lg-12 card">
                        <div class="card-body">
                            <h5 class="card-TITLE">#Référence des crédit</h5>
                            <?php if (count($credits) > 0) {
                                foreach ($credits as $credit) { ?>
                                    <a href="./detail-cr?id=<?php echo $credit['CREDIT_ID_UK'] ?>" class="form-control status">#
                                        <?php echo $credit['CREDIT_ID_UK'] ?>
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
                        <button class="btn btn-danger" id="btn-delete"><i class="bi bi-x-circle"></i>Supprimer</button>

                    </div>

                </div>


            </div>
        </section>
    </main>
    <div class="main spinner-grow text-danger" id="mainPreloader" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    <div class="modal fade mt-5" id="deleteModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row modal-header" style="text-align: center;">
                    <i class="col-12 bi bi-exclamation-circle" style="font-size: 100px;"></i>
                    <div class="col-12">
                        <div class="row">
                            <p class="info-dialog">Vous allez supprimer le client CIN : <span id="idDemande"></span>
                                <!-- <?php echo $_COOKIE['CLIENT_CIN'] ?> -->
                            </p>
                            <p>Cette action est irreversible !</p>
                        </div>

                        <form action="#" class="row" id="form-delete" method="post">
                            <div class="error-text col-12"></div>
                            <input type="text" style="display: none ;" name="CLIENT_CIN" value="" id="CLIENT_CIN">
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="confirmation" id="accepter"
                                    required>
                                <label class="form-check-label" for="accepter">
                                    Oui j'en suis sûr !
                                </label>
                            </div>

                            <div class="col-12 mt-5">
                                <a href="<?php echo $_SESSION['page'] ?>" class="btn btn-secondary">Revenir</a>
                                <input type="submit" name="exec-action" class="btn btn-primary btn-delete-action"
                                    value="Valider l'action">
                            </div>

                        </form>

                    </div>

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

        var deleteButton = document.getElementById('btn-delete');
        deleteButton.addEventListener("click", function () {
            valle = $("#cin_client").val();
            $("#idDemande").text(valle);
            $("#cin").val(valle);
            // document.cookie="cin="+valle;
            $("#deleteModal").modal("show");
            // e.preventDefault();
        });

        btnEdit = document.getElementById('btn-edit');
        btnEdit.addEventListener("click", function () {
            loadRegions();

            $("#panelEdit").show();
            $("#panelDetail").hide();
        });

        const form = document.getElementById("form-delete"),
            btnDelete = form.querySelector(".btn-delete-action"),
            errorTextDelete = form.querySelector(".error-text");


        form.onsubmit = (e) => {
            e.preventDefault();
        }

        btnDelete.onclick = () => {
            errorTextDelete.style.display = "none";
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./users/agency/delete-client.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {

                        let data = xhr.response.trim();
                        if (data === "success") {                            
                            location.href = "<?php echo $_SESSION['page'] ?>";
                        } else {
                            setTimeout(function () {
                                errorTextDelete.style.display = "block";
                                errorTextDelete.innerHTML = data;

                            }, 200);
                        }

                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);

        }

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
                data: { ID_SCRIPT: "edit-region", REGION_POSTALE: "<?php echo $client['REGION'] ?>" },
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