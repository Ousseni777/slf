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

   <?php include "header-index.php" ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

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

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row justify-content-between">

                    <div class="col-lg-7 pt-5 pt-lg-0">
                        <h3 data-aos="fade-up">Simulateur de crédit</h3>
                        <p data-aos="fade-up" data-aos-delay="100">
                            SALAFIN vous propose des solutions de financement adaptées à vos besoins et votre situation
                            sans justificatifs d’utilisation.
                        </p>
                        <div class="col-lg-11 mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="200">

                            <p class="space"></p>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idProject" name="project"
                                            onchange="controller()" aria-label="State">
                                            <option value="auto">Crédit Auto</option>
                                            <option value="Crédit personnel">Crédit personnel</option>
                                            <option value="Crédit renouvelable">Crédit renouvelable</option>

                                        </select>

                                        <label for="floatingSelect">Quel est votre projet ?</label>
                                    </div>

                                </div>

                                <div class="form-group col-md-3 controlAutos" id="controlBrand">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idBrand" name="brand" onchange="loadProduct()"
                                            aria-label="State">

                                        </select>
                                        <label for="floatingSelect">Marque</label>
                                    </div>
                                </div>

                                <div class="form-group col-md-3 controlAutos" id="controlProduct">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idProduct" onchange="loadTariff()"
                                            name="product" aria-label="State">

                                        </select>
                                        <label for="floatingSelect">Produit</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3" id="controlProfession">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idProfession" onchange="calcFunctionAuto()"
                                            name="profession" aria-label="State">
                                            <option value="SALARIE">Salarié</option>
                                            <option value="FONCTIONNAIRE">Fonctionnaire</option>
                                            <option value="COMMERCANT">Commerçant</option>
                                            <option value="SOCIETE">Société</option>

                                        </select>

                                        <label for="floatingSelect">Dites-nous qui vous êtes ?</label>
                                    </div>

                                </div>
                                <div class="form-group col-md-4" style="display: none;">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idTariff" onchange="loadDuration()"
                                            name="tariff" aria-label="State">



                                        </select>
                                        <label for="floatingSelect">Tariff</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php include "./users/client/sim-credit-perso.php" ?>
                                <?php include "./users/client/sim-credit-auto.php" ?>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">

                        <img src="assets/img/app.png" class="img-fluid" alt="" id="imgFluid" data-aos="zoom-in">

                        <?php include "./users/client/recap-credit-perso.php" ?>
                        <?php include "./users/client/recap-credit-auto.php" ?>
                        <div class="spinner-grow text-danger" id="spinnerRecap" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>


                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Nos produits</h2>
                    <p>FORMULES SUR MESURE</p>
                    <h5>Choisir la solution de financement la mieux adaptée à vos projets</h5>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">PERSONNEL</a></h4>
                            <p class="description">Vous avez besoin d'argent pour réaliser un projet qui vous tient à
                                cœur ? Bénéficiez de notre offre de crédit perso selon des conditions souples et
                                avantageuses</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">

                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">AUTOMOBILE</a></h4>
                            <p class="description">Neuve ou d'occasion, profitez de nos meilleures offres de financement
                                automobile. Visitez notre nouvelle plateforme voiture d’occasion vivacar.ma et demander
                                votre crédit en ligne

                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">

                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4 class="title"><a href="">VOYAGE</a></h4>
                            <p class="description">Pour votre destination de rêve ou une escapade pour se ressourcer,
                                pensez à nos solutions de crédit</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">EVENEMENTS DE VIE</a></h4>
                            <p class="description">Vous réfléchissez aux dépenses liées à votre mariage, la naissance de
                                votre futur bébé , un incident de santé ou n'importe quel type d'imprévu , le crédit
                                événements de vie chez EQDOM est la solution immédiate dont vous avez besoin</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->


        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq section-bg">

            <div class="container" data-aos="fade-up">
                <div class="col-8 align-items-center justify-content-center"></div>

                <div class="section-title">
                    <h2>F.A.Q</h2>
                    <p>Foire aux questions</p>
                    <h6>Vous avez des questions ? Nous sommes là pour y répondre</h6>
                </div>

                <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

                    <li>
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Quelles sont les pièces
                            justificatives à fournir pour souscrire un prêt ? <i
                                class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                            <p>
                            <ul>
                                <li>Une pièce d'identité</li>
                                <li>Trois derniers relevés bancaires</li>
                                <li>Un relevé d'identité bancaire ou spécimen de chèque</li>
                                <li>Un justificatif de domicile datant de moins de 3 mois</li>
                            </ul>

                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Combien de temps me
                            faudra t-il pour obtenir une réponse à ma demande de crédit ?<i
                                class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                La réponse de principe à la demande de crédit sur le site est instantanée, il suffit de
                                remplir les champs d'informations et de transmettre en ligne les pièces justificatives.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Que signifie un accord de
                            principe ? <i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Un accord de principe signifie que votre crédit est accordé sous réserve de présentation
                                des pièces justificatives correspondant à vos déclarations sur le site. Une fois les
                                pièces originales reçues et vérifiées, vous pouvez procéder à la signature du contrat.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Quel est le délai pour
                            recevoir le virement ?<i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Les fonds sont virés sous 48h (jours ouvrés) sur votre compte bancaire, après
                                acceptation définitive de votre dossier par EQDOM et expiration du délai de rétractation
                                de 7 jours.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section><!-- End F.A.Q Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Conseillers</h2>
                    <p>Nos conseillers sont à votre disposition pour vous aider</p>
                </div>

                <div class="row">

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member">
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Hamza FAHD</h4>
                                    <span>Chef excecutif</span>
                                </div>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="member">
                            <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Sarah Jhonson</h4>
                                    <span>Gestionnaire de projet</span>
                                </div>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="member">
                            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>William</h4>
                                    <span>CTO</span>
                                </div>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="member">
                            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Amanda</h4>
                                    <span>Consultant</span>
                                </div>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Nos partenaires</h2>
                    <p>Nos partenaires potentiels</p>
                </div>

                <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>PLUS D'INFORMATIONS</h2>
                    <p>NOUS CONTACTER</p>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>20520; HAY SIDI MAAROUF; CASABLANCA</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Téléphone:</h4>
                                <p>+212 605141219</p>
                            </div>

                            <?php
                            $adress = "SALAFIN-Siège"
                                ?>
                            <!-- -->
                            <iframe src="https://maps.google.com/maps?&q=<?php echo $adress; ?>&output=embed"
                                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Votre nom</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Votre nom" required>
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="name">Votre adresse e-mail</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Votre adresse e-mail" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Objet</label>
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="L'objet du message" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Message</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Envoyer le Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Us Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Pour nous joindre</h4>
                        <p>Offre prêt personnel standard hors remboursement par anticipation valable jusqu’au 31/03/2023
                        </p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="S'inscrire">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>


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
    <!-- <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script> -->
    <!-- <script type="text/javascript" src="./javascript/ajax-script.js"></script> -->
    <!-- <script type="text/javascript" src="javascript/index.js"></script> -->

    <script type="text/javascript" src="assets/js/preloader.js"></script>

    <script>
        function loadBrand() {

            $.ajax({
                url: "./users/client/retriever_auto.php",
                method: "POST",
                data: { ID_SCRIPT: 'brand' },
                success: function (data) {
                    $("#idBrand").html(data);
                    loadProduct();
                },
                error: (error) => {
                    console.error("Une erreur s'est produite :", error);
                }
            });
        }

        function loadProduct() {
            BrandID = $("#idBrand");
            $.ajax({
                url: "./users/client/retriever_auto.php",
                method: "POST",
                data: { ID_SCRIPT: 'product', ID_MARQUE: BrandID.val() },
                success: function (data) {
                    $("#idProduct").html(data);
                    loadTariff();
                },
                error: (error) => {
                    console.error("Une erreur s'est produite :", error);
                }
            });

        }

        function loadTariff() {
            BrandID = $("#idBrand");
            ProductID = $("#idProduct");
            $.ajax({
                url: "./users/client/retriever_auto.php",
                method: "POST",
                data: { ID_SCRIPT: 'tariff', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val() },
                success: function (data) {
                    $("#idTariff").html(data);
                    loadDuration();
                },
                error: (error) => {
                    console.error("Une erreur s'est produite :", error);
                }
            });

        }

        function loadDuration() {

            BrandID = $("#idBrand");
            ProductID = $("#idProduct");
            TariffID = $("#idTariff");

            $.ajax({
                url: "./users/client/retriever_auto.php",
                method: "POST",
                data: { ID_SCRIPT: 'duration', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val(), ID_TARIFF: TariffID.val() },
                success: (data) => {
                    $("#controlDuration").html(data);
                    loadApport();
                },
                error: (error) => {
                    console.error("Une erreur s'est produite :", error);
                }
            });
        }

        function loadApport() {
            BrandID = $("#idBrand");
            ProductID = $("#idProduct");
            TariffID = $("#idTariff");
            const Duration = $("input[name='durationName']:checked").val();
            $.ajax({
                url: "./users/client/retriever_auto.php",
                method: "POST",
                data: { ID_SCRIPT: 'apport', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val(), ID_TARIFF: TariffID.val(), ID_DURATION: Duration },
                success: (data) => {
                    $("#controlApport").html(data);
                    calcFunctionAuto();
                },
                error: (error) => {
                    console.error("Une erreur s'est produite :", error);
                }
            });
        }

        function calcFunctionAuto() {

            BrandID = $("#idBrand");
            ProductID = $("#idProduct");
            TariffID = $("#idTariff");
            AmountID = $("#rangeInputAmount");

            ProfessionID = $("#idProfession").val();

            const DurationValue = $("input[name='durationName']:checked").val();
            const ApportValue = $("input[name='apportName']:checked").val();


            $.ajax({
                url: "./users/client/calc-fx_auto.php",
                method: "POST",
                data: {
                    ID_AMOUNT: AmountID.val(),
                    ID_DURATION: DurationValue,
                    ID_APPORT: ApportValue,
                    ID_TARIFF: TariffID.val(),
                    ID_PRODUCT: ProductID.val(),
                    ID_BRAND: BrandID.val(),
                    ID_PROFESSION: ProfessionID
                },
                success: (data) => {
                    var result = JSON.parse(data);
                    // console.log(result.tariff_id);
                    $("#infoAmount").val(result.TTC);
                    $("#rangeValueAmount").val(AmountID.val());
                    $("#rangeInputDuration").val(DurationValue);
                    $("#rangeInputApport").val(ApportValue);
                    // $("#rangeValueMonthly").val(result.payment);
                    $("#infoDuration").val(DurationValue);
                    $("#infoTariffID").val(result.tariff_id);
                    $("#rangeInputMonthly").val(result.paymentNoFormat);
                    $("#rangeValueMonthly").val(result.payment);
                    $("#infoMonthly").val(result.payment);
                    $("#infoApport").val(result.Apport_Total);
                    $("#infoApportPerc").val(ApportValue);
                    $("#infoADI").val(result.Assurance);
                    $("#infoFD").val(result.FraisDossier);
                    $("#infoCHAD").val(result.Cout);
                }
            });
        }

        function calcFunctionPerso(script = "monthly") {

            AmountID = $("#rangeInputTTC").val();
            ProfessionID = $("#idProfession").val();
            DurationValue = $("#rangeInputDurationPerso").val();
            Monthly = $("#rangeInputMonthlyPerso").val();
            var rangeInputMonthly = document.getElementById('rangeInputMonthlyPerso');
            var valueDisplayMonthly = document.getElementById('valueDisplayMonthly');

            var rangeInputDuration = document.getElementById('rangeInputDurationPerso');
            var valueDisplayDuration = document.getElementById('valueDisplayDuration');

            $.ajax({
                url: "./users/client/calc-fx_perso.php",
                method: "POST",
                data: {
                    ID_SCRIPT: script,
                    ID_AMOUNT: AmountID,
                    ID_DURATION: DurationValue,
                    ID_MONTHLY: Monthly,
                    ID_PROFESSION: ProfessionID

                },
                success: (data) => {
                    var result = JSON.parse(data);
                    if (script === "monthly") {
                        rangeInputMonthly.value = result.monthlyNOFormat;
                        valueDisplayMonthly.textContent = result.monthly;

                        var percent = (rangeInputMonthly.value - rangeInputMonthly.min) / (rangeInputMonthly.max - rangeInputMonthly.min) * 100;
                        valueDisplayMonthly.style.left = percent + '%';
                    } else {
                        rangeInputDuration.value = result.duration;
                        valueDisplayDuration.textContent = result.duration;

                        var percent = (rangeInputDuration.value - rangeInputDuration.min) / (rangeInputDuration.max - rangeInputDuration.min) * 100;
                        valueDisplayDuration.style.left = percent + '%';
                    }
                    $("#infoProjectP").val($("#idProject").val());
                    $("#infoAmountP").val(AmountID);
                    $("#infoDurationP").val(result.duration);
                    $("#infoMonthlyP").val(result.monthly);
                    $("#infoFDP").val(percent);
                }
            });
        }

        function updateInfoDuration() {
            DisplayD.textContent = DurationID.val();
            RangeInputD.value = DurationID.val();
            var percent = (RangeInputD.value - RangeInputD.min) / (RangeInputD.max - RangeInputD.min) * 100;
            DisplayD.style.left = percent + '%';

            updateInfoApport();

        }
        function updateInfoApport() {
            RangeInputA.value = ApportID.val();
            DisplayA.textContent = RangeInputA.value;
            // console.log(selectApport.selectedIndex);
            var percent = (RangeInputA.value - RangeInputA.min) / (RangeInputA.max - RangeInputA.min) * 100;
            DisplayA.style.left = percent + '%';

            updateInfoMonthly(selectApport.selectedIndex, 0);

        }
        function updateInfoMonthly(indice = "default", ind = "default") {
            if (indice !== "default") {
                selectMonthly.selectedIndex = indice;
            }
            RangeInputM.value = parseFloat(selectMonthly.value.replace(/\s/g, ''));
            DisplayM.textContent = RangeInputM.value;

            var percent = (RangeInputM.value - RangeInputM.min) / (RangeInputM.max - RangeInputM.min) * 100;
            DisplayM.style.left = percent + '%';

            if (ind === "default") {
                selectApport.selectedIndex = selectMonthly.selectedIndex;
                RangeInputA.value = selectApport.value;
                DisplayA.textContent = RangeInputA.value;
                // console.log(selectApport.selectedIndex);
                var percent = (RangeInputA.value - RangeInputA.min) / (RangeInputA.max - RangeInputA.min) * 100;
                DisplayA.style.left = percent + '%';
            }
        }
        function loadData() {
            if (ProductID.val() !== 0) {
                loadDuration();
            }
        }


        function loadRegions() {
            $.ajax({
                url: "region_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'region' },
                success: function (data) {
                    $("#yourRegion").html(data);
                    const RegionID = $("#yourRegion").val();
                    $.ajax({
                        url: "region_retriever.php",
                        method: "POST",
                        data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
                        success: function (data) {
                            $("#yourTown").html(data);
                        }
                    });
                }
            });
        }


        function loadTowns() {
            const RegionID = $("#yourRegion").val();
            $.ajax({
                url: "region_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
                success: function (data) {
                    $("#yourTown").html(data);
                }
            });
        }

        //Après chargement de la page

        window.addEventListener("load", function () {
            $('#spinnerRecap').hide();
            calcFunctionPerso();
            controller();
        });

        //Formulaire crédit personnel ou renouvellable

        const formP = document.getElementById("formPerso"),
            btnCreditPerso = formP.querySelector(".btn-credit-perso"),
            errorTextP = formP.querySelector(".error-text");

        formP.onsubmit = (e) => {
            e.preventDefault();
        }

        btnCreditPerso.onclick = () => {
            formP.style.pointerEvents = "none";
            $('#preloaderCreditPerso').show();
            errorTextP.style.display = "none";
            formP.style.opacity = .5;
            setTimeout(function () {
                $('#preloaderCreditPerso').hide();
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "users/client/save-credit.php", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            let responseData = JSON.parse(xhr.responseText);
                            let data = responseData.status.trim();
                            if (data === "success") {
                                location.href = "signup";

                            } else {
                                errorTextP.style.display = "block";
                                errorTextP.textContent = data;
                            }
                        }
                    }
                }
                let formData = new FormData(formP);
                xhr.send(formData);
            }, 2000);
        }

        //Formulaire crédit auto

        const form = document.getElementById("formAuto"),
            btnCreditAuto = form.querySelector(".btn-credit-auto"),
            errorText = form.querySelector(".error-text");

        form.onsubmit = (e) => {
            e.preventDefault();
        }

        btnCreditAuto.onclick = () => {
            form.style.pointerEvents = "none";
            $('#preloaderCreditAuto').show();
            errorTextP.style.display = "none";
            form.style.opacity = .5;
            setTimeout(function () {
                $('#preloaderCreditAuto').hide();
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "users/client/save-credit.php", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            let responseData = JSON.parse(xhr.responseText);
                            let data = responseData.status.trim();
                            if (data === "success") {
                                location.href = "signup";

                            } else {
                                errorText.style.display = "block";
                                errorText.innerHTML = responseData.message;
                            }
                        }
                    }
                }
                let formData = new FormData(form);
                xhr.send(formData);
            }, 2000);
        }


        //Pour le crédit personnel
        var rangeInputTTC = document.getElementById('rangeInputTTC');
        var valueDisplayTTC = document.getElementById('valueDisplayTTC');

        var percent = (rangeInputTTC.value - rangeInputTTC.min) / (rangeInputTTC.max - rangeInputTTC.min) * 100;
        valueDisplayTTC.style.left = percent + '%';
        valueDisplayTTC.textContent = rangeInputTTC.value;


        rangeInputTTC.addEventListener('input', function () {
            var percent = (rangeInputTTC.value - rangeInputTTC.min) / (rangeInputTTC.max - rangeInputTTC.min) * 100;
            valueDisplayTTC.style.left = percent + '%';
            valueDisplayTTC.textContent = rangeInputTTC.value;

            calcFunctionPerso();
        });

        var rangeInputMonthly = document.getElementById('rangeInputMonthlyPerso');
        var valueDisplayMonthly = document.getElementById('valueDisplayMonthly');

        var percent = (rangeInputMonthly.value - rangeInputMonthly.min) / (rangeInputMonthly.max - rangeInputMonthly.min) * 100;
        valueDisplayMonthly.style.left = percent + '%';
        valueDisplayMonthly.textContent = rangeInputMonthly.value;

        rangeInputMonthly.addEventListener('input', function () {
            var percent = (rangeInputMonthly.value - rangeInputMonthly.min) / (rangeInputMonthly.max - rangeInputMonthly.min) * 100;
            valueDisplayMonthly.style.left = percent + '%';
            valueDisplayMonthly.textContent = rangeInputMonthly.value;
            calcFunctionPerso('duration');
        });



        var rangeInputDuration = document.getElementById('rangeInputDurationPerso');
        var valueDisplayDuration = document.getElementById('valueDisplayDuration');


        var percent = (rangeInputDuration.value - rangeInputDuration.min) / (rangeInputDuration.max - rangeInputDuration.min) * 100;
        valueDisplayDuration.style.left = percent + '%';
        valueDisplayDuration.textContent = rangeInputDuration.value;
        rangeInputDuration.addEventListener('input', function () {
            var percent = (rangeInputDuration.value - rangeInputDuration.min) / (rangeInputDuration.max - rangeInputDuration.min) * 100;
            valueDisplayDuration.style.left = percent + '%';
            valueDisplayDuration.textContent = rangeInputDuration.value;
            calcFunctionPerso();
        });

        var rangeInputs = document.querySelectorAll('.custom-range');
        var val_min = document.querySelectorAll('.value-min');
        var val_max = document.querySelectorAll('.value-max');

        let i = 0;
        rangeInputs.forEach(function (input) {

            val_max[i].textContent = input.max;
            val_min[i].textContent = input.min;
            val_max[i].style.left = 91 + '%';
            val_min[i].style.left = 9 + '%';
            i++;
        });


        //Pour le crédit auto
        const rangeValueAmount = document.getElementById("rangeValueAmount");
        const rangeInputAmount = document.getElementById("rangeInputAmount");
        rangeInputAmount.addEventListener("input", function () {
            rangeValueAmount.value = rangeInputAmount.value;
            calcFunctionAuto();
        });

        rangeValueAmount.addEventListener("input", function () {
            rangeInputAmount.value = rangeValueAmount.value;
            calcFunctionAuto();
        });


        function hideAutos(autos) {
            for (let i = 0; i < autos.length; i++) {
                autos[i].style.display = 'none';
            }
        }

        function displayAutos(autos) {
            for (let i = 0; i < autos.length; i++) {
                autos[i].style.display = 'block';
            }
        }


        function displayAuto() {

            document.getElementById('cardPerso').style.display = "none";
            document.getElementById('imgFluid').style.display = "none";


            document.getElementById('cardAuto').style.display = "none";
            $('#spinnerBtnAuto').show();
            $('#spinnerRecap').show();


            setTimeout(function () {
                $('#spinnerBtnAuto').hide();
                scrollToTop();
            }, 2000);

            setTimeout(function () {

                $('#spinnerRecap').hide();
                $('#cardAuto').show();
            }, 4000);
        }
        function displayPerso() {

            document.getElementById('cardAuto').style.display = "none";
            document.getElementById('cardPerso').style.display = "none";
            document.getElementById('imgFluid').style.display = "none";
            $('#spinnerBtnPerso').show();
            $('#spinnerRecap').show();

            setTimeout(function () {
                $('#spinnerBtnPerso').hide();
                scrollToTop();
            }, 2000);

            setTimeout(function () {

                $('#spinnerRecap').hide();
                $('#cardPerso').show();
            }, 4000);

        }
        function hideCard() {
            document.getElementById('cardAuto').style.display = "none";
            document.getElementById('cardPerso').style.display = "none";
            document.getElementById('imgFluid').style.display = "block";
        }

        function scrollToTop() {
            window.scrollTo({
                top: 500,
                behavior: 'smooth'
            });
        }





        function controller() {

            let project = document.getElementById('idProject');
            let profession = document.getElementById('controlProfession');
            let auto_block = document.getElementById('auto-block');
            let perso_block = document.getElementById('perso-block');

            let autos = document.querySelectorAll('.controlAutos');


            if (project.value == "auto") {
                displayAutos(autos);
                // profession.style.display = 'none';
                auto_block.style.display = "inline";
                perso_block.style.display = "none";

                loadBrand();

            } else {
                profession.style.display = 'block';
                auto_block.style.display = "none";
                perso_block.style.display = "inline";
                hideAutos(autos);


                calcFunctionPerso();

            }
            hideCard();
        }
    </script>


</body>

</html>