<?php
ob_start();
session_start();
include './connectToDB.php';
$id_vendeur = $_GET["id"];
$query_seller = "SELECT * FROM `slf_user_salafin` WHERE seller_id='{$id_vendeur}' ";
$result_seller = $conn->query($query_seller);
// $_SESSION['page'] = "detail-sl?id=".$id_vendeur;

if ($result_seller->num_rows > 0) {
    $seller = $result_seller->fetch_assoc();
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

            <div class="row mt-5" id="panelDetail">
                <div class="pagetitle">
                    <h1><a href="<?php echo $_SESSION['page'] ?>"><i class="bi bi-arrow-left"></i></a> Ref vendeur : <b>
                            <?php echo $seller['seller_id'] ?>
                        </b> </h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Vendeur</li>
                            <li class="breadcrumb-item active">Detail vendeur</li>
                        </ol>
                    </nav>
                </div><!-- End Page Title -->
                <!-- <div class="col-3"></div> -->

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body mt-3">
                            <span class="infoL"> Identifiant du vendeur : </span>
                            <input type="text" readonly value="<?php echo $seller['seller_id'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">CIN / Carte de séjour : </span> <input type="text" readonly
                                value="<?php echo $seller['cin'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">Email : </span> <input type="text" readonly
                                value="<?php echo $seller['email'] ?>" class="infoR">
                        </div>

                        <div class="card-body">
                            <span class="infoL">Téléphone : </span> <input type="text" readonly
                                value="<?php echo $seller['phone'] ?>" class="infoR">
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
    <div class="main spinner-grow text-danger" id="mainPreloader" role="status">
        <span class="visually-hidden">Loading...</span>
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