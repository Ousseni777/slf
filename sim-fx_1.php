<?php
include './connectToDB.php';
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
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


        <!-- Template Main CSS File -->
        <link href="assets/css/style-form.css" rel="stylesheet">        


        <style>


            .list-group-item .infoR{
                float: right;
                font-size: 14px;

                color: rgb(6, 161, 53);

            }
            .logo{

                width: 150px;
                height: 100px;
            }
            .hr{
                width: 50%;
                margin-left: 25%;
            }
            .inputFlag{
                width: 100px;
                text-align: center;
                border-radius: 5px;
            }

            .radios{
                display: inline-flex;

                width: 100%;
            }
            .form-check{
                margin: 2%;
                width: 30%;
            }
            .form-check label{
                width: 100%;

            }


        </style>

    </head>

    <body onmouseenter="">

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">

                <img class="logo" src="assets/img/logo.SVG" alt="">

            </div><!-- End Logo -->



            <nav class="header-nav ms-auto" >
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
                        <h5 class="card-title">Guide pratique</h5>

                        <!-- Accordion without outline borders -->
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Bien comprendre le crédit
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores sint, cum, dignissimos in omnis consectetur, dolore voluptas nulla corporis quaerat fugit!  <a href="#">  >> lire la suite ...</a></div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Le glossaire du crédit 
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores sint, cum, dignissimos in omnis consectetur, dolore voluptas nulla corporis quaerat fugit!  <a href="#">  >> lire la suite ...</a></div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Questions / reponses
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores sint, cum, dignissimos in omnis consectetur, dolore voluptas nulla corporis quaerat fugit!  <a href="#">  >> lire la suite ...</a></div>
                                </div>
                            </div>
                        </div><!-- End Accordion without outline borders -->

                    </div>
                </div>
            </div>


        </aside><!-- End Sidebar-->

        <main id="main" class="main"  onmouseenter="" >

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

                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="brand" name="brand" onchange="loadProduct()" aria-label="State">



                                            </select>
                                            <label for="floatingSelect">Marque</label>
                                        </div> 


                                    </div>   

                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="product" onchange="loadTariff()" name="product" aria-label="State">



                                            </select>
                                            <label for="floatingSelect">Produit</label>
                                        </div>                  
                                    </div>   

                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="tariff" name="tariff" onchange="loadDuration()" aria-label="State">


                                            </select>                                          

                                            <label for="floatingSelect">Barême</label>
                                        </div>

                                    </div>                                  


                                    <div class="row mb-5">
                                        <label class="col-sm-2 col-form-label"> Mon choix </label>

                                        <div class="col-sm-10" >

                                            <div class="block-field"> 
                                                <div>
                                                    <label for="rangeInputAmount" class="form-label">PRIX TTC</label><br>
                                                    <input type="text" class="inputFlag" id="rangeValueAmount" value="100000">
                                                    <input type="range" class="form-range" min="5000" max="500000" onchange="calcFunction()" step="1000" id="rangeInputAmount">

                                                </div>
                                            </div>

                                            <div class="block-field"> 

                                                <div>
                                                    <span  for="rangeInputDuration" class="form-label">Durée (en mois)</span><br>                                                                                         
                                                </div>   
                                                <div class="radios" id="idRadios">

                                                </div>                                                                                     
                                                <div id="idRange">                                                                                                                                           
                                                    <input type="range" class="form-range" min="0" max="100" value="" step="1" disabled id="rangeInputDuration">
                                                </div>  

                                            </div> 
                                            <div class="block-field"> 
                                                <div>
                                                    <span for="rangeInputDuration" class="form-label">Apport TOTAL (en %)</span><br>                                                                                         
                                                </div>   
                                                <div class="radios" id="apport">

                                                </div>   
                                                <div id="">                                                                                                                                           
                                                    <input type="range" class="form-range" min="0" max="100" value="" step="1" disabled id="rangeInputApport">
                                                </div> 
                                            </div>
                                            <div class="block-field"> 
                                                <div id="InputMonthly">
                                                    <label for="rangeInputMonthly" class="form-label">Mensualités (en DH)</label><br>                                                
                                                    <input type="text" class="inputFlag" id="rangeValueMonthly" disabled value="">    
                                                    <input type="range" min="0" max="43000" class="form-range" step="0.01" value="" disabled  id="rangeInputMonthly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 mt-3">
                                        <button class="btn btn-primary" type="button">Demander ce crédit</button>
                                    </div>
                                </form><!-- End General Form Elements -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="card">

                            <div class="card-body">
                                <h2>Mon récapitulatif</h2>
                                <hr class="hr">              
                                <h5 class="card-title">Coordonnées et infos personnelles</h5>
                                <ul class="list-group list-group-flush"> 
                                    <li class="list-group-item"><span class="infoL">Vous êtes : </span> <span class="infoR">Fonctionnaire</span></li>                
                                    <li class="list-group-item"><span class="infoL"> Email : </span> <span class="infoR">boro7ousseni@gmail.com</span></li>
                                    <li class="list-group-item"><span class="infoL"> Téléphone : </span> <span class="infoR">+212605943319</span></li>

                                </ul>
                                <h5 class="card-title">Détails de mon crédit</h5>

                                <!-- List group with active and disabled items -->
                                <ul class="list-group list-group-flush">     
                                    <li class="list-group-item"><span class="infoL"> Type de crédit : </span> <span class="infoR">Auto neuve</span></li>           

                                    <li class="list-group-item"><span class="infoL">Prix TTC  : </span> <span id="infoAmount" class="infoR">-</span></li>
                                    <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <span id="infoDuration" class="infoR">-</span></li>
                                    <li class="list-group-item"><span class="infoL">Mensualité  : </span> <span id="infoMonthly" class="infoR">-</span></li>
                                    <li class="list-group-item"><span class="infoL">Frais de dossier  : </span> <span class="infoR" id="infoFD">-</span></li>
                                    <li class="list-group-item"><span class="infoL">Apport TOTAL  : </span> <span id="infoApport" class="infoR">-</span></li>                
                                    <li class="list-group-item"><span class="infoL">ADI  : </span> <span id="infoADI" class="infoR">-</span></li>                
                                    <li class="list-group-item"><span class="infoL">Cout hors ADI  : </span> <span id="infoCHAD" class="infoR">-</span></li>                
                                    
                                </ul><!-- End Clean list group -->
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main><!-- End #main -->

        <script>

            // Attacher l'événement "load" à la fenêtre
            window.addEventListener("load", function () {
                // Appeler calcFunction lorsque la page est complètement chargée
                //loadDefaultData();
                loadBrand();


            });

        </script>


        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>

        <script type="text/javascript" src="ax_script.js"></script>


    </body>

</html>