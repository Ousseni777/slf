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
                    <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">

                        <img src="assets/img/app.png" class="img-fluid" alt="" id="imgFluid" data-aos="zoom-in">

                        <div class="card" id="cardPerso">
                            <div class="spinner-border text-danger spinner-pieces" id="preloaderCreditPerso"
                                role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>

                            <h3 data-aos="fade-up" style="padding: 2%; color : #eb5d1e; text-align: center; ">Mon
                                récapitulatif</h3>
                            
                            <div class="card-body">

                                <hr class="hr">

                                <!-- <h5 class="card-title">Détails de mon crédit</h5> -->
                                <form action="#" id="formPerso" method="POST">
                                <div class="error-text"></div>
                                    <!-- List group with active and disabled items -->
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><span class="infoL"> Type de crédit : </span> <input
                                                type="text" name="project" readonly class="infoR" id="infoProjectP">
                                        </li>

                                        <li class="list-group-item"><span class="infoL">Montant crédit (DH) : </span>
                                            <input type="text" name="amount" readonly id="infoAmountP" class="infoR">
                                        </li>
                                        <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <input
                                                type="text" name="duration" readonly id="infoDurationP" class="infoR">
                                        </li>
                                        <li class="list-group-item"><span class="infoL">Mensualité (DH) : </span> <input
                                                type="text" name="monthly" readonly id="infoMonthlyP" class="infoR">
                                        </li>
                                        <li class="list-group-item"><span class="infoL">Frais de dossier (DH) : </span>
                                            <input type="text" name="app_fees" readonly class="infoR" id="infoFDP">
                                        </li>

                                    </ul><!-- End Clean list group -->
                                    <div class="d-grid gap-2 mt-3">
                                        <button class="btn btn-outline-success w-100 btn_credit_perso" type="submit"
                                            name="btn_credit_perso">Demander ce crédit </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="spinner-grow text-danger" id="spinnerRecap" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="card" id="cardAuto">
                            <div class="spinner-border text-danger spinner-pieces" id="preloaderCreditAuto"
                                role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>

                            <h3 data-aos="fade-up" style="padding: 2%; color : #eb5d1e; text-align: center; ">Mon
                                récapitulatif</h3>
                            
                            <div class="card-body">

                                <hr class="hr">

                                <!-- <h5 class="card-title">Détails de mon crédit</h5> -->
                                <form action="#" method="POST" id="formAuto">
                                <div class="error-text"></div>
                                    <!-- List group with active and disabled items -->
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" style="display: none;"><span class="infoL">Tariff ID
                                                : </span> <input type="text" name="tariff_id" readonly id="infoTariffID"
                                                class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL"> Type de crédit : </span> <input
                                                type="text" name="project" readonly class="infoR" value="auto">
                                        </li>
                                        <li class="list-group-item"><span class="infoL">Prix TTC : </span> <input
                                                type="text" name="amount" readonly id="infoAmount" class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <input
                                                type="text" name="duration" readonly id="infoDuration" class="infoR">
                                        </li>
                                        <li class="list-group-item"><span class="infoL">Mensualité : </span> <input
                                                type="text" name="monthly" readonly id="infoMonthly" class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL">Frais de dossier : </span>
                                            <input type="text" name="app_fees" readonly class="infoR" id="infoFD">
                                        </li>
                                        <li class="list-group-item"><span class="infoL">Apport TOTAL : </span> <input
                                                type="text" name="down_pmt" readonly id="infoApport" class="infoR"></li>
                                        <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                                                (%) : </span> <input type="text" name="down_pmt_perc" readonly
                                                id="infoApportPerc" class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL">ADI : </span> <input type="text"
                                                name="adi" readonly id="infoADI" class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL">Cout hors ADI : </span> <input
                                                type="text" name="cost_ex_adi" readonly id="infoCHAD" class="infoR">
                                        </li>

                                    </ul><!-- End Clean list group -->
                                    <div class="d-grid gap-2 mt-3">
                                        <button class="btn btn-outline-success w-100 btn_credit_auto" type="submit"
                                            name="btn_credit_auto" id="btn_credit_auto">Demander ce crédit </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
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
                                        <select class="form-select" id="idProfession" onchange="calcFunctionPerso('monthly')" name="profession"
                                            aria-label="State">
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
                                <div class="col-sm-12" id="auto-block">

                                    <div class="block-field">

                                        <div class="group-select">
                                            <label for="rangeInputAmount" class="form-label">PRIX TTC</label><br>
                                            <input type="text" class="inputFlag" id="rangeValueAmount" value="100000">
                                            <input type="range" class="form-range" min="5000" max="500000"
                                                onchange="calcFunctionAuto()" step="1000" id="rangeInputAmount">

                                        </div>
                                    </div>

                                    <div class="block-field">

                                        <div class="col-sm-12 group-select">
                                            <span for="rangeInputDuration" class="form-label">Durée (en
                                                mois)</span><br>

                                            <div class="row controlRadios" id="controlDuration">

                                            </div>
                                            <div class="" id="idRange">
                                                <input type="range" class="form-range" min="0" max="100" value=""
                                                    step="1" disabled id="rangeInputDuration">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="block-field">
                                        <div class="col-sm-12 group-select">
                                            <span for="rangeInputDuration" class="form-label">Apport TOTAL (en
                                                %)</span><br>


                                            <div class="row controlRadios" id="controlApport">

                                            </div>
                                            <div id="">

                                                <input type="range" class="form-range" min="0" max="100" value=""
                                                    step="1" disabled id="rangeInputApport">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="block-field">
                                        <div id="InputMonthly" class="group-select">
                                            <label for="rangeInputMonthly" class="form-label">Mensualités (en
                                                DH)</label><br>
                                            <input type="text" class="inputFlag" id="rangeValueMonthly" disabled
                                                value="">
                                            <input type="range" min="0" max="43000" class="form-range" step="0.01"
                                                value="" disabled id="rangeInputMonthly">
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-3">
                                        <!-- <button class="btn btn-outline-success w-100" id="simulerAuto"
                                            onclick="displayAuto()">Simuler </button> -->
                                        <button class="btn btn-outline-success w-100" id="simulerAuto"
                                            onclick="displayAuto()">Simuler <div class="spinner-border"
                                                style="width: 15px; height: 15px; display: none; " id="spinnerBtnAuto"
                                                role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div></button>
                                    </div>
                                </div>

                                <div class="col-sm-12" id="perso-block">
                                    <div class="range-container group-select">
                                        <label for="customRange2" class="form-label">Montant du crédit</label>
                                        <input type="range" class="form-range custom-range" min="2000" max="50000"
                                            step="500" id="rangeInputTTC" value="40000">
                                        <span class="value-display" id="valueDisplayTTC"></span>
                                        <span class="value-display value-min" id="valueMin"></span>
                                        <span class="value-display value-max" id="valueMax"></span>
                                    </div>
                                    <p class="space"></p>
                                    <div class="range-container group-select">
                                        <label for="customRange2" class="form-label">Durée</label>
                                        <input type="range" class="form-range custom-range" min="2" max="120" value="24"
                                            step="1" id="rangeInputDurationPerso">
                                        <span class="value-display" id="valueDisplayDuration"></span>
                                        <span class="value-display value-min" id="valueMinMonthly"></span>
                                        <span class="value-display value-max" id="valueMaxMonthly"></span>
                                    </div>
                                    <p class="space"></p>
                                    <div class="range-container group-select">
                                        <label for="customRange2" class="form-label">Mensualité</label>
                                        <input type="range" class="form-range custom-range" min="100" max="30000"
                                            step=".1" id="rangeInputMonthlyPerso"
                                            onchange="calcFunctionPerso('duration')">
                                        <span class="value-display" id="valueDisplayMonthly"></span>
                                        <span class="value-display value-min" id="valueMinMonthly"></span>
                                        <span class="value-display value-max" id="valueMaxMonthly"></span>
                                    </div>

                                    <div class="col-12 group-select">
                                        <p class="space"></p>
                                        <button class="btn btn-outline-success w-100" id="simulerPerso"
                                            onclick="displayPerso()">Simuler <div class="spinner-border"
                                                style="width: 15px; height: 15px; display: none; " id="spinnerBtnPerso"
                                                role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div></button>
                                    </div>
                                </div>
                            </div>

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
    <script type="text/javascript" src="./javascript/ajax-script.js"></script>
    <script type="text/javascript" src="javascript/index.js"></script>

    <script type="text/javascript" src="assets/js/preloader.js"></script>

    <script>
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