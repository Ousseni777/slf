<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>cl | follow</title>
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
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style-form.css" rel="stylesheet">
  
  <link href="styles/sim-cl.css" rel="stylesheet">

</head>

<body>
<?php 
    include 'header-cl.php';

    include 'siderbar-cl.php';

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Demander mon crédit en ligne</h1>
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item active">Simulation</li>
                <li class="breadcrumb-item"><a href="#">Mes infos personnelles</a></li>
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
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="idProject" name="project" onchange="controller()"
                                        aria-label="State">
                                        <option value="auto">Crédit Auto</option>
                                        <option value="Crédit personnel">Crédit personnel</option>
                                        <option value="Crédit renouvelable">Crédit renouvelable</option>

                                    </select>

                                    <label for="floatingSelect">Quel est votre projet ?</label>
                                </div>

                            </div>
                            <div class="form-group col-md-4" id="controlProfession">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="idProfession" name="profession" aria-label="State">
                                        <option value="Salarié">Salarié</option>
                                        <option value="Fonctionnaire">Fonctionnaire</option>
                                        <option value="Commerçant">Commerçant</option>

                                    </select>

                                    <label for="floatingSelect">Dites-nous qui vous êtes ?</label>
                                </div>

                            </div>
                            <div class="form-group col-md-4 controlAutos" id="controlBrand">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="idBrand" name="brand" onchange="loadProduct()"
                                        aria-label="State">

                                    </select>
                                    <label for="floatingSelect">Marque</label>
                                </div>


                            </div>

                            <div class="form-group col-md-4 controlAutos" id="controlProduct">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="idProduct" onchange="loadTariff()" name="product"
                                        aria-label="State">



                                    </select>
                                    <label for="floatingSelect">Produit</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4" style="display: none;">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="idTariff" onchange="loadDuration()" name="tariff"
                                        aria-label="State">



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
                                            <input type="range" class="form-range" min="0" max="100" value="" step="1"
                                                disabled id="rangeInputDuration">
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

                                            <input type="range" class="form-range" min="0" max="100" value="" step="1"
                                                disabled id="rangeInputApport">
                                        </div>
                                    </div>

                                </div>
                                <div class="block-field">
                                    <div id="InputMonthly" class="group-select">
                                        <label for="rangeInputMonthly" class="form-label">Mensualités (en
                                            DH)</label><br>
                                        <input type="text" class="inputFlag" id="rangeValueMonthly" disabled value="">
                                        <input type="range" min="0" max="43000" class="form-range" step="0.01" value=""
                                            disabled id="rangeInputMonthly">
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
                                    <input type="range" class="form-range custom-range" min="6" max="120" value="24"
                                        step="1" id="rangeInputDurationPerso">
                                    <span class="value-display" id="valueDisplayDuration"></span>
                                    <span class="value-display value-min" id="valueMinMonthly"></span>
                                    <span class="value-display value-max" id="valueMaxMonthly"></span>
                                </div>
                                <p class="space"></p>
                                <div class="range-container group-select">
                                    <label for="customRange2" class="form-label">Mensualité</label>
                                    <input type="range" class="form-range custom-range" min="100" max="5000" step=".1"
                                        id="rangeInputMonthlyPerso" onchange="calcFunctionPerso('duration')">
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
            <div class="col-lg-4">
                <form action="process1" method="post">
                    <div class="card">

                        <div class="card-body">
                            <h2>Détails du crédit</h2>


                            <!-- List group with active and disabled items -->
                            <ul class="list-group list-group-flush">                                
                                
                                <li class="list-group-item"><span class="infoL"> Type produit : </span> <input
                                        type="text" id="infoProject" name="product" name="product" readonly
                                        class="infoR"></li>
                                

                                <li class="list-group-item"><span class="infoL">Prix TTC : </span> <input type="text"
                                        id="infoAmount" name="amount" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <input
                                        type="text" id="infoDuration" name="duration" readonly class="infoR"></li>
                                <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                                        (%)</span> <input type="text" id="infoApportPerc" name="down_pmt_perc" readonly
                                        class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Mensualité : </span> <input type="text"
                                        id="infoMonthly" name="monthly" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Frais de dossier : </span> <input
                                        type="text" name="application_fees" class="infoR" readonly id="infoFD"></li>
                                <li class="list-group-item"><span class="infoL">Apport TOTAL : </span> <input
                                        type="text" id="infoApport" name="down_pmt" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">ADI : </span> <input type="text"
                                        id="infoADI" name="adi" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Cout hors ADI : </span> <input
                                        type="text" id="infoCHAD" name="cost_ex_adi" readonly class="infoR"></li>

                            </ul><!-- End Clean list group -->
                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" name="ask_credit_user" class="btn btn-outline-primary"
                                    type="button">Demander
                                    ce
                                    crédit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  

  <!-- <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script> -->
  <script type="text/javascript" src="jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script type="text/javascript" src="./javascript/ajax-script.js"></script>
  <script type="text/javascript" src="javascript/new-credit.js"></script>

</body>

</html>

<?php
ob_end_flush();
?>