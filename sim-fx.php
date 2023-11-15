<?php
session_start();
include './connectToDB.php';
$_SESSION['user'] = 'ADMIN';
$user = $_SESSION['user'];
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

    <!-- Vendor CSS Files -->ul
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->

    <link rel="stylesheet" href="assets/css/styles-forms-step.css">
    <link href="assets/css/style-form.css" rel="stylesheet">


    <style>
        /*--------------------------------------------------------------
    # option
    --------------------------------------------------------------*/
        .option .option-item {
            margin-bottom: 30px;
        }

        .option #option-flters {
            padding: 0;
            margin: 0 auto 25px auto;
            list-style: none;
            text-align: center;
            background: white;
            border-radius: 50px;
            padding: 2px 15px;
        }

        .option #option-flters li {
            cursor: pointer;
            display: inline-block;
            padding: 8px 20px 12px 20px;
            font-size: 15px;
            font-weight: 500;
            line-height: 1;
            color: #444444;
            margin: 0 4px 8px 4px;
            transition: all ease-in-out 0.3s;
            border-radius: 50px;
            background: #f2f2f2;
        }

        .option #option-flters li:hover,
        .option #option-flters li.filter-active {
            background: #e96b56;
            color: #fff;
        }

        .option #option-flters li:last-child {
            margin-right: 0;
        }

        .option .option-wrap {
            transition: 0.3s;
            position: relative;
            overflow: hidden;
            z-index: 1;
            background: rgba(84, 84, 84, 0.6);
        }

        .option .option-wrap::before {
            content: "";
            background: rgba(84, 84, 84, 0.6);
            position: absolute;
            left: 30px;
            right: 30px;
            top: 30px;
            bottom: 30px;
            transition: all ease-in-out 0.3s;
            z-index: 2;
            opacity: 0;
        }

        .option .option-wrap .option-info {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            text-align: center;
            z-index: 3;
            transition: all ease-in-out 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .option .option-wrap .option-info::before {
            display: block;
            content: "";
            width: 48px;
            height: 48px;
            position: absolute;
            top: 35px;
            left: 35px;
            border-top: 3px solid #fff;
            border-left: 3px solid #fff;
            transition: all 0.5s ease 0s;
            z-index: 9994;
        }

        .option .option-wrap .option-info::after {
            display: block;
            content: "";
            width: 48px;
            height: 48px;
            position: absolute;
            bottom: 35px;
            right: 35px;
            border-bottom: 3px solid #fff;
            border-right: 3px solid #fff;
            transition: all 0.5s ease 0s;
            z-index: 9994;
        }

        .option .option-wrap .option-info h4 {
            font-size: 20px;
            color: #fff;
            font-weight: 600;
        }

        .option .option-wrap .option-info p {
            color: #ffffff;
            font-size: 14px;
            text-transform: uppercase;
            padding: 0;
            margin: 0;
        }

        .option .option-wrap .option-links {
            text-align: center;
            z-index: 4;
        }

        .option .option-wrap .option-links a {
            color: #fff;
            margin: 0 2px;
            font-size: 28px;
            display: inline-block;
            transition: 0.3s;
        }

        .option .option-wrap .option-links a:hover {
            color: #e96b56;
        }

        .option .option-wrap:hover::before {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 1;
        }

        .option .option-wrap:hover .option-info {
            opacity: 1;
        }

        .option .option-wrap:hover .option-info::before {
            top: 15px;
            left: 15px;
        }

        .option .option-wrap:hover .option-info::after {
            bottom: 15px;
            right: 15px;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">

            <img class="logo" src="assets/img/logo.SVG" alt="">

        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">B. OUSSENI</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>BORO OUSSENI</h6>
                            <span>Fonctionnaire</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
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
                            <a class="dropdown-item d-flex align-items-center" href="#">
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
    <aside id="sidebar" class="sidebar">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">0%</h2>

                    <!-- Accordion without outline borders -->
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h3>Etape <span class="step-number">1</span></h3>
                            <ul class="progress-bar">
                                <li class="active">Coordonnées</li>
                                <li>Infos Personnelles</li>
                                <li>Appartenance</li>
                                <li>Justificatifs</li>
                            </ul>
                        </div>

                    </div><!-- End Accordion without outline borders -->

                </div>
            </div>
        </div>


    </aside><!-- End Sidebar-->

    <main id="main" class="" onmouseenter="">

        <div class="pagetitle">
            <h1>Demander mon crédit en ligne</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Mes infos personnelles</a></li>

                    <li class="breadcrumb-item active">Simulation</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Commencez la simulation pour le crédit approprié</h5>
                            <hr>
                            <!-- Commencez la simulation pour le crédit approprié -->
                            <form action="" class="row g-3" method="post">

                                <div class="form-section row g-3 active">
                                    <div class="row gy-4">

                                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                            <div class="card">
                                                <div class="card-img">
                                                    <img src="assets/img/img.jfif" alt="" class="img-fluid">
                                                </div>
                                                <h3><a href="service-details.html" class="stretched-link">Espace
                                                        client</a>
                                                </h3>
                                                <p>Vous pouvez vous inscrire en tant que client particulier</p>
                                            </div>
                                        </div><!-- End Card Item -->
                                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                            <div class="card">
                                                <div class="card-img">
                                                    <img src="assets/img/img.jfif" alt="" class="img-fluid">
                                                </div>
                                                <h3><a href="service-details.html" class="stretched-link">Client
                                                        SALAFIN</a>
                                                </h3>
                                                <p>Vous pouvez vous inscrire en tant que client particulier</p>

                                            </div>
                                        </div><!-- End Card Item -->
                                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                            <div class="card">
                                                <div class="card-img">
                                                    <img src="assets/img/img.jfif" alt="" class="img-fluid">
                                                </div>
                                                <h3><a href="service-details.html" class="stretched-link">Espace
                                                        vendeur</a>
                                                </h3>
                                                <p>Vous pouvez vous inscrire en tant que client particulier</p>
                                            </div>
                                        </div><!-- End Card Item -->
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                    <div style="text-align: center;" class="col-md-4">
                                        <p>Texte : 100%</p>
                                    </div>
                                    <div class="col-md-4">
                                        <button style="float: right" class="btn btn-outline-primary next_button"
                                            type="button">Suivant</button>
                                    </div>

                                </div>

                                <div class="form-section row g-3">
                                    <div class="col-12 form-floating mb-3">
                                        <input type="email" name="yourEmail" class="form-control" id="yourEmail"
                                            required>
                                        <label for="yourEmail" class="form-label">Votre adresse mail</label>
                                    </div>
                                    <div class="col-6 form-floating mb-3">
                                        <input type="text" name="yourPhone" class="form-control" id="yourPhone"
                                            required>
                                        <label for="yourPhone" class="form-label">Votre numéro de téléphone !</label>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="product" onchange="loadTariff()"
                                                name="product" aria-label="State">
                                            </select>
                                            <label for="floatingSelect">Vendeur</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <button class="btn btn-outline-warning back_button"
                                            type="button">Retour</button>

                                    </div>
                                    <div style="text-align: center;" class="col-md-4">
                                        <p>Texte : 100%</p>
                                    </div>
                                    <div class="col-md-4">

                                        <button style="float: right" class="btn btn-outline-primary next_button"
                                            type="button">Suivant</button>
                                    </div>
                                </div>

                                <div class="form-section row g-3">
                                    <div class="col-12 form-floating mb-3">
                                        <input type="email" name="yourEmail" class="form-control" id="yourEmail"
                                            required>
                                        <label for="yourEmail" class="form-label">Votre adresse mail</label>
                                    </div>
                                    <div class="col-6 form-floating mb-3">
                                        <input type="text" name="yourPhone" class="form-control" id="yourPhone"
                                            required>
                                        <label for="yourPhone" class="form-label">Votre numéro de téléphone !</label>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="product" onchange="loadTariff()"
                                                name="product" aria-label="State">
                                            </select>
                                            <label for="floatingSelect">Vendeur</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <button class="btn btn-outline-warning back_button"
                                            type="button">Retour</button>

                                    </div>
                                    <div style="text-align: center;" class="col-md-4">
                                        <p>Texte : 100%</p>
                                    </div>
                                    <div class="col-md-4">

                                        <button style="float: right" class="btn btn-outline-primary next_button"
                                            type="button">Suivant</button>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>

    <!-- <script type="text/javascript" src="ax_script.js"></script> -->



    <script>
        var next_click = document.querySelectorAll(".next_button");
        var main_form = document.querySelectorAll(".form-section");
        var step_list = document.querySelectorAll(".progress-bar li");
        var num = document.querySelector(".step-number");
        let formnumber = 0;

        next_click.forEach(function (next_click_form) {
            next_click_form.addEventListener('click', function () {
                if (!validateform()) {
                    return false
                }
                formnumber++;
                updateform();
                progress_forward();

            });
        });

        var back_click = document.querySelectorAll(".back_button");
        back_click.forEach(function (back_click_form) {
            back_click_form.addEventListener('click', function () {
                formnumber--;
                updateform();
                progress_backward();

            });
        });




        var submit_click = document.querySelectorAll(".submit_button");
        submit_click.forEach(function (submit_click_form) {
            submit_click_form.addEventListener('click', function () {
                formnumber++;
                updateform();
            });
        });







        function updateform() {
            main_form.forEach(function (mainform_number) {
                mainform_number.classList.remove('active');
            })
            main_form[formnumber].classList.add('active');
        }

        function progress_forward() {
            // step_list.forEach(list => {

            //     list.classList.remove('active');

            // }); 


            num.innerHTML = formnumber + 1;
            step_list[formnumber].classList.add('active');
        }

        function progress_backward() {
            var form_num = formnumber + 1;
            step_list[form_num].classList.remove('active');
            num.innerHTML = form_num;
        }




        function validateform() {
            validate = true;
            var validate_inputs = document.querySelectorAll(".form-section.active input");
            validate_inputs.forEach(function (vaildate_input) {
                vaildate_input.classList.remove('warning');
                if (vaildate_input.hasAttribute('')) {
                    if (vaildate_input.value.length == 0) {
                        validate = false;
                        vaildate_input.classList.add('warning');
                    }
                }
            });
            return validate;

        }
    </script>

</body>

</html>