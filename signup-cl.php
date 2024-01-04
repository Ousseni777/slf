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

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1 class="text-light"><a href="./"><span>SALAFIN</span></a></h1>
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#help">Comment ça marche</a></li>
                    <li><a class="nav-link scrollto" href="#services">Nos produit</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Nous contacter</a></li>
                    <li><a class="getstarted scrollto" href="login">Espace client</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-5 order-3 order-lg-3 d-flex flex-column justify-content-center">
                    <!-- <div class="col-lg-12 success-text">
                        <div class="alert alert-success" role="alert" style="text-align:center;">
                            <h4 class="alert-heading">Vérification de l'E-mail !</h4>
                            <p>Un mail de vérification vous a été envoyé, veuillez consulter votre e-mail</p>
                        </div>
                    </div> -->

                    <form class="row g-1 needs-validation" action="#" id="formRegister" method="post">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">DEMANDER MON CREDIT EN LIGNE</h5>
                            <p class="text-center small">Mes coordonnées</p>

                        </div>
                        <div class="error-text col-12"></div>
                        <div class="col-12 form-floating mb-3">
                            <input type="email" name="email" placeholder="Votre adresse mail" class="form-control"
                                id="yourEmail">
                            <label for="yourEmail" class="form-label">Votre adresse mail</label>
                        </div>
                        <div class="col-12 form-floating mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Votre N° Téléphone"
                                id="phone">
                            <label for="phone" class="form-label">Votre N° Téléphone</label>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-outline-primary w-100 btn-register" style="float: right;"
                                type="submit">Continuer</button>
                        </div>
                        <div class="col-12">
                            <p class="small mb-0">Déjà utilisateur ? <a href="login">Connectez-vous</a></p>
                        </div>
                    </form>

                </div>
                <div class="col-lg-1 order-2 order-lg-2"></div>
                <div class="col-lg-6 order-1 order-lg-1 hero-img">
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

    </section><!-- End Hero -->

</body>

</html>