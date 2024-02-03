<?php
ob_start();
session_start();

include './connectToDB.php';
$ticket = $_GET['ticket'];
$query_credit = "SELECT * FROM `credit_client_tmp` WHERE CREDIT_ID = '{$ticket}'";
$result_credit = $conn->query($query_credit);
// $_SESSION['page'] = "detail-doss?id=".$ticket;

if ($result_credit->num_rows > 0) {
    $CREDIT = $result_credit->fetch_assoc();

    $TARIFF_ID = $CREDIT['TARIFF_ID'];
    $select_tariff = "SELECT * FROM `slf_tarification` WHERE TARIFF_ID='$TARIFF_ID'";
    $result_select_tariff = $conn->query($select_tariff);
    $TARIFF = $result_select_tariff->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>sim / Elements</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style-form.css" rel="stylesheet">
    <link href="assets/css/preloader.css" rel="stylesheet">
    <!-- <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script> -->


    <!-- <link href="styles/style.css" rel="stylesheet"> -->

    <style>
        #mainPreloader {
            margin-left: 55%;
            margin-top: 15%;

        }

        @media (max-width: 1199px) {
            #mainPreloader {
                margin-left: 40%;
                margin-top: 45%;
                padding: 20px;
            }
        }

        .bx-subdirectory-right {
            font-family: 'Courier New', Courier, monospace;
            color: red;
            font-size: 14px;
            font-style: italic;

        }
    </style>

</head>

<body>
    <style>
        li .active {
            border-left: 2px blue solid;
            border-radius: 5px 0 0 5px;
        }

        .bi-chevron-right {
            color: red;
        }
    </style>

    <header id="header" class="header fixed-top d-flex align-items-center">


        <div class="col-lg-2 d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <span class="d-none d-lg-block" style="color: #f82249 ;">SALAFIN</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn" style="color: #f82249 ;"></i>
        </div><!-- End Logo -->
        <div class="col-lg-2">

        </div>
        <!-- <div class="col-lg-6 section-title mt-5">
        <h2>Bonjour OUSSENI</h2>
    </div> -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2" style="color: #f82249 ;">B. OUSSENI</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>BORO OUSSENI</h6>
                            <span>Commerçant</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-gear"></i>
                                <span>Mes infos personnelles</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="./logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Je me déconnecte</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->


    </header><!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar" style="margin-top: -5%; padding: 1%;">

        <div class="card mt-5">

            <div class="card-body">
                <h5 class="card-title">Guide pratique</h5>

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Bien comprendre le crédit
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body ">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Dolores sint, cum, dignissimos in omnis consectetur, dolore voluptas nulla corporis
                                quaerat fugit! <a href="#"> >> lire la suite ...</a></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Le glossaire du crédit
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Dolores sint, cum, dignissimos in omnis consectetur, dolore voluptas nulla corporis
                                quaerat fugit! <a href="#"> >> lire la suite ...</a></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Questions / reponses
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Dolores sint, cum, dignissimos in omnis consectetur, dolore voluptas nulla corporis
                                quaerat fugit! <a href="#"> >> lire la suite ...</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12 mt-5 order-1 order-lg-2 hero-img">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
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
                    <div class="carousel-item">
                        <img src="assets/img/app.png" class="img-fluid animated" alt="...">

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

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Résultat de votre simultion <i class="bi bi-chevron-right"></i> Crédit auto</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Detail crédit</li>
                    <li class="breadcrumb-item">Ceci est le résultat provisoire de votre simulation</li>
                </ol>
            </nav>
            <div class="col-lg-12 mt-5">
                <div class="row">


                    <div class="col-lg-8" id="num-dossier">
                        <h4>Référence crédit N°:
                            <span id="NUMDOSS">
                                <?php echo $CREDIT['CREDIT_ID'] ?>
                            </span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped" id="section-detail">
            <tr style="display: none;">
                <td></td>
            </tr>
            <tr>
                <td>
                    <section class="section">
                        <div class="row mt-3">

                            <div class="col-lg-7">


                                <table class="table table-striped">
                                    <legend><i class="bi bi-chevron-right"></i> Crédit demandé</legend>

                                    <tbody>
                                        <tr>
                                            <th>Date demande crédit :</th>
                                            <td id="DATECREATION">
                                                <?php echo $CREDIT['UP_DATE'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Marque auto :</th>
                                            <td id="MARQUE">
                                                <?php echo $TARIFF['MARQUE'] ?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <th scope="col">Type produit : </th>
                                            <td id="PRODUIT">
                                                <?php echo $TARIFF['PRODUIT'] ?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <th>Barême attribué : </th>
                                            <td id="BAREME">
                                                <?php echo $TARIFF['BAREME'] ?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <th scope="col">Montant demandé (DH) :</th>
                                            <td id="MNT_DEMANDE">
                                                <?php echo $CREDIT['AMOUNT'] ?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <th scope="col">Durée du crédit (mois) :</th>
                                            <td id="DUREE">
                                                <?php echo $CREDIT['DURATION'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Apport (%) : </th>
                                            <td id="APPORTTOTAL">
                                                <?php echo $CREDIT['DOWN_PMT_PERC'] ?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <th scope="col">Mensualité (DH) :</th>
                                            <td id="MENSUALITE">
                                                <?php echo $CREDIT['MONTHLY'] ?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <th scope="col">Frais de dossier (DH) :</th>
                                            <td id="FRAISDOSS">
                                                <?php echo $CREDIT['APP_FEES'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">TAUX (%) : </th>
                                            <td id="TAUXINT">
                                                <?php echo $CREDIT['TAUXINT'] ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="col">Apport total (DH) : </th>
                                            <td id="APPORTTOTAL">
                                                <?php echo $CREDIT['DOWN_PMT'] ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="col">ADI (DH): </th>
                                            <td id="ADI">
                                                <?php echo $CREDIT['ADI'] ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="col">Coût Hors ADI (DH): </th>
                                            <td id="CHADI">
                                                <?php echo $CREDIT['COST_EX_ADI'] ?>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>
                            <div class="col-lg-4">

                                <table class="table table-striped">
                                    <legend><i class="bi bi-chevron-right"></i> Etat de demande</legend>
                                    <tbody>
                                        <tr>
                                            <td>
                                                #ETAT PRODUCTION <br>
                                                <i class="bx bx-subdirectory-right">En attente de votre confirmation</i>
                                            </td>
                                            <td id="ETATPRODLIB">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped">

                                    <tbody>
                                        <tr>
                                            <td>#ETAT ENGAGEMENT <br>
                                                <i class="bx bx-subdirectory-right">En attente de votre confirmation</i>

                                            </td>
                                            <td id="ETATENGLIB">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>#ETAT INSTRUCTION <br>
                                                <i class="bx bx-subdirectory-right">En attente de votre confirmation</i>

                                            </td>
                                            <td id="ETATINSTLIB">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>

                        </div>
                    </section>
                </td>
            </tr>
        </table>

        <div class="row">
            <a href="sim-fx?tag=fx&numdoss=<?php echo $CREDIT['CREDIT_ID'] ?> "
                class="col-lg-2 ms-2 btn btn-outline-danger">
                Modifier
            </a>
            <a href="sim-fx?tag=fx&numdoss=<?php echo $CREDIT['CREDIT_ID'] ?> "
                class="col-lg-2 ms-2 btn btn-outline-danger">
                Approuver
            </a>

        </div>


    </main><!-- End #main -->



    <div class="main spinner-grow text-danger" id="mainPreloader" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>




    <script type="text/javascript" src="jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="assets/js/main-form.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <script>

        window.addEventListener("load", function () {

            displayPreloader();
        });

        function displayPreloader() {

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