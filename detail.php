<?php
ob_start();
session_start();
include './connectToDB.php';
$credit_id = $_GET["id"];
$query_credit = "SELECT * FROM `credit_client` WHERE credit_id = '{$credit_id}'";
$result_credit = $conn->query($query_credit);


if ($result_credit->num_rows > 0) {
    $credit = $result_credit->fetch_assoc();
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

    <style>
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

        .list-group-item .infoR {
            float: right;
            font-size: 14px;
            width: 40%;
            text-align: right;
            color: rgb(6, 161, 53);
            border: none;
        }

        .infoBareme {
            width: 50%;

        }

        /* .logo {

                width: 150px;
                height: 100px;
            } */

        .hr {
            width: 50%;
            margin-left: 25%;
        }

        .inputFlag {
            width: 100px;
            text-align: center;
            border-radius: 5px;
        }


        .form-check {
            margin: 2%;
            width: 30%;
        }

        .form-check label {
            width: 100%;

        }

        #controlProfession,
        #controlValueDuration,
        #controlValueApport {
            display: none;
        }

        .card-title {
            padding-bottom: 0;
        }

        .control-bi:hover {
            cursor: pointer;
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

        .border-left {
            border-left: 3px rgba(0, 0, 0, .05) solid;
            border-right: 3px rgba(0, 0, 0, .05) solid;

            border-radius: 5px;
        }

        .label {
            font-size: 12px;
            border: 1px palevioletred solid;
            padding: 2px;
            border-radius: 5px;
            /* background-color: gray; */
            margin: .5%;
            margin-top: 1.3%;
            font-weight: bold;
            color: palevioletred;
        }

        .left {
            margin-left: 5%;
            margin-right: 2%;
            width: 50px;
            height: 50px;
            border-radius: 50%;

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
    include 'header-cl.php';

    include 'siderbar-cl.php';
    ?>

    <main class="main" id="main">
        <section class="section">
            <div class="pagetitle">
                <h1>Récapitulatif de votre demande de crédit</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="sim">Simulation</a></li>
                        <li class="breadcrumb-item">Emprunteur</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row mt-5">
                <!-- <div class="col-3"></div> -->
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <!-- List group with active and disabled items -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="infoL"> Référence de la demande : </span>
                                    <input type="text" id="infoBrand" name="product" readonly
                                        value="<?php echo $credit['credit_id'] ?>" class="infoR">
                                </li>
                                <li class="list-group-item"><span class="infoL"> Date demande crédit : </span> <input
                                        type="text" id="infoBrand" name="up_date" readonly
                                        value="<?php echo $credit['up_date'] ?>" class="infoR">
                                </li>
                                <li class="list-group-item"><span class="infoL"> Type de crédit : </span> <input
                                        type="text" id="infoBrand" name="product" readonly
                                        value="<?php echo $credit['project'] ?>" class="infoR">
                                </li>

                                <li class="list-group-item"><span class="infoL">Montant demandé (DH) : </span> <input
                                        type="text" id="infoAmount" name="amount" readonly
                                        value="<?php echo $credit['amount'] ?>" class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Durée du crédit (mois) : </span> <input
                                        type="text" id="infoDuration" name="duration" readonly
                                        value="<?php echo $credit['duration'] ?>" class="infoR">
                                </li>
                                <li class="list-group-item"><span class="infoL">Mensualité : </span> <input type="text"
                                        id="infoMonthly" name="monthly" readonly
                                        value="<?php echo $credit['monthly'] ?>" class="infoR"></li>

                                <li class="list-group-item"><span class="infoL">Frais de dossier : </span>
                                    <input type="text" name="app_fees" class="infoR" readonly
                                        value="<?php echo $credit['app_fees'] ?>" id="infoFD">
                                </li>
                                <li class="list-group-item"><span class="infoL">Apport TOTAL : </span> <input
                                        type="text" id="infoApport" name="down_pmt" readonly
                                        value="<?php echo $credit['down_pmt'] ?>" class="infoR"></li>

                            </ul><!-- End Clean list group -->
                        </div>

                    </div>

                </div>
                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Statut de la demande</h5>
                            <input type="text" id="infoApport" name="down_pmt" readonly
                                value="<?php echo $credit['state'] ?>" class="form-control status">

                        </div>
                        <!-- <div class="card-body">
                            <h5 class="card-title">Date de traitement</h5>
                            <input type="text" id="infoApport" name="down_pmt" readonly
                                value="<?php echo $credit['up_date'] ?>" class="status">

                        </div> -->
                        <div class="card-body">
                            <h5 class="card-title">Cause du rejet</h5>
                            <textarea name="reason" id="" cols="30" rows="7" readonly class="form-control">
                                <?php echo $credit['reason'] ?>
                            </textarea>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-4">

                    <button class="btn btn-primary"><i class="bi bi-pencil-square"></i>Modifier</button>
                    <button class="btn btn-danger"><i class="bi bi-x-circle"></i>Supprimer</button>

                </div>
            </div>
        </section>
    </main>
    <div class="main spinner-grow text-danger" id="mainPreloader" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>


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
            // loadRegions();
            displayPreloader();
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
    </script>

</body>

</html>
<?php
ob_end_flush();
?>