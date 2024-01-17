<?php
session_start();
if (isset($_GET['tag'])) {
    $_SESSION['tag'] = $_GET['tag'];

} else {
    if (isset($_SESSION['tag'])) {
        unset($_SESSION['tag']);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ninestars Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/preloader.css" rel="stylesheet">
    <link href="styles/style-index.css" rel="stylesheet">
    <style>
        .value-min,
        .value-max {
            position: absolute;
            top: 60px;
            width: 60px;
            text-align: center;
            transform: translateX(-50%);
            background-color: #f8f9fa;
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            pointer-events: none;
        }

        .spinner-pieces {
            position: absolute;
            z-index: 1;
            left: 48%;
            top: 45%;
            display: none;
        }
    </style>

</head>

<body>


    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Bienvenu</h2>
                <p>FORMULES SUR MESURE</p>
                <h5>Choisir la solution de financement la mieux adaptée à vos projets</h5>
            </div>

            <div class="row mt-5">
                <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">

                    <img src="assets/img/app.png" class="img-fluid" style="height: 400px;" alt="" id="imgFluid"
                        data-aos="zoom-in">

                </div>

                <div class="row col-md-5 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box row">

                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="col-lg-12 title" style="margin-top: -10%;"><a href="">Simulation</a></h4>
                        <p class="col-lg-12 description" style="margin-top: -10%; color: gray; ">Des solutions de
                            crédits adaptées à votre projet : achat de voiture ou
                            crédit personel
                        </p>
                        <a href="acceuil2" class="row" >
                            <button class="col-lg-12 btn btn-outline-danger">Simulateur <i
                                class="bi bi-chevron-right"></i></button></a>
                    </div>

                </div>
                <div class="col-md-1"></div>

                <div class="row col-md-5 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box row">

                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="col-lg-12 title" style="margin-top: -10%;"><a href="">REVCF</a></h4>

                        <p class="col-lg-12 description" style="margin-top: -10%; color: gray; ">Besoin d'une revision
                            des conditions financières ?

                        </p>
                        <button class="col-lg-12 btn btn-outline-danger">REVCF <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Services Section -->



    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="jquery.min.js"></script>

</body>

</html>