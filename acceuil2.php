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
       <link href="assets/css/style-form.css" rel="stylesheet">
    <style>
        .btn-choice{
            position: relative;
            margin-left: 2%;
         
        }
        .bi-left{
            font-size: 40px;
            position: absolute;
            left: 2%;
            top: 0;
        }
        .bi-right{
            font-size: 20px;
            position: absolute;
            right: 5%;
            top: 10px;
        }
    </style>

</head>

<body>
    <?php include 'header.php'; ?>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="row d-flex align-items-center">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Pétite mensualité</h1>
                    <h1>Grand sourire</h1>
                    <h2>L'offre à ne pas rater, en quelques clics seulement, votre simulation est prête</h2>
                    <div>
                        <a href="#about" class="btn-get-started scrollto">Je commence ma simulation</a>
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/img/salafin.jpg" class="img-fluid animated" alt="...">

                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/salafin2.jpg" class="img-fluid animated" alt="...">

                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/salafin3.jpg" class="img-fluid animated" alt="...">

                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div><!-- End Slides with captions -->
                    <!-- <img src="assets/img/salafin.jpg" class="img-fluid animated" alt=""> -->
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: 5px;" >
            <a href="./sim-fx?tag=fx" class="col-lg-3 btn btn-outline-danger btn-choice" style="padding: 1% 0 ;" > <i class="bi bi-app-indicator bi-left"></i> Crédit AUTO  <i class="bi bi-chevron-right bi-right"></i></a>
            <a href="./index2" class="col-lg-3 btn btn-outline-danger btn-choice"  style="padding: 1% 0 ;"><i class="bi bi-app-indicator bi-left"></i>Crédit PERSONNEL <i class="bi bi-chevron-right bi-right"></i></a>
            <a href="#" class="col-lg-3 btn btn-outline-danger btn-choice" style="padding: 1% 0 ;"><i class="bi bi-app-indicator bi-left"></i>Crédit RENOUVELABLE <i class="bi bi-chevron-right bi-right"></i></a>
        </div>

    </section><!-- End Hero -->

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