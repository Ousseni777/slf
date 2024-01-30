<style>
    /* #displaying{
        display: none;
    } */
    .label-apport,
    .label-duration {
        width: 50%;
    }

    .label-apport:hover,
    .label-duration:hover {
        cursor: pointer;
    }

    .btn-monthly {
        width: 100px;
    }

    .btn-custom {
        font-size: 15px;
        border-radius: 50px;
        padding: 10px 40px;
        transition: all 0.2s;
        background-color: #f82249;
        border: 0;
        color: #fff;
    }
</style>

<style>
    .group-select {
        padding: 2% 3%;
        border-radius: 10px;
        box-shadow: 0px 0px 1px 1px rgba(172, 132, 212, 0.2);
        width: 100%;
    }

    .subtile {
        font-weight: bold;
        padding-top: 10px;
    }

    .subtile i {
        color: red;
    }

    .subtile:hover {
        cursor: pointer;
    }

    .slider::-webkit-slider-thumb {
        margin-top: -5px;
        width: 20px;
        height: 20px;
        background-color: red;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Simulateur <i class="bi bi-chevron-right" style="color: red;"></i> crédit auto</h1>
        <nav>
            <ol class="breadcrumb ">

                <li class="breadcrumb-item">Simulation</li>
                <li class="breadcrumb-item active">Création d'une nouvelle demande de crédit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">

            <div class="col-md-12 controlAutos" id="idPrint">

            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Commencez la simulation pour le crédit approprié</h5>
                        <hr>
                        <!-- Commencez la simulation pour le crédit approprié -->

                        <div class="row g-3">

                            <?php if (isset($SELLER_PRODUCT)) { ?>

                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <?php if ($SELLER_PRODUCT == 'SALAFIN') { ?>

                                            <select class="form-select" id="idBrand" name="BRAND" onchange="loadProduct()"
                                                aria-label="State">
                                            </select>

                                        <?php } else { ?>

                                            <select class="form-select" id="idBrand" name="BRAND" disabled
                                                onchange="loadProduct()" aria-label="State">
                                            </select>

                                        <?php } ?>
                                        <label for="floatingSelect">Marque</label>
                                    </div>
                                </div>

                                <div class="col-md-4 controlAutos" id="controlProduct">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idProduct" name="PRODUCT" aria-label="State"
                                            onchange="loadTariff()">

                                        </select>
                                        <label for="floatingSelect">Produit</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idTariff" name="TARIFF" onchange="loadApport()"
                                            aria-label="State">


                                        </select>

                                        <label for="floatingSelect">Barême</label>
                                    </div>

                                </div>

                                <div class="col-md-8">
                                    <div id="tableId">

                                    </div>
                                </div>

                            <?php } ?>


                            <div class="row mb-5">
                                <!-- <label class="col-sm-2 col-form-label"> Mon choix </label> -->

                                <div class="col-sm-12">
                                    <!-- PRIX TTC -->
                                    <div class="block-field">

                                        <div class="group-select">
                                            <label for="rangeInputAmount" class="form-label">PRIX
                                                TTC</label><br>
                                            <input type="text" onkeydown="detecteEntree(event)" class="inputFlag"
                                                id="rangeValueAmount" value="">
                                            <input type="range" name="AMOUNT" class="slider form-range" min="50"
                                                max="500000" onchange="calcFunction()" step="1" id="rangeInputAmount">

                                        </div>
                                    </div>
                                    <!-- APPORT % -->
                                    <div class="block-field mt-3">
                                        <div class="col-sm-10 group-select">
                                            <span for="" class="form-label">Apport TOTAL (en
                                                %)</span><br>
                                            <div class="row controlRadios" id="controlApport">

                                            </div>

                                        </div>

                                    </div>
                                    <!-- DUREE -->
                                    <div class="block-field mt-3">

                                        <div class="col-sm-10 group-select">
                                            <span for="rangeInputDuration" class="form-label">Durée (en
                                                mois)</span><br>
                                            <div class="row controlRadios" id="controlDuration">

                                            </div>

                                        </div>
                                    </div>

                                    <div class="block-field mt-3">
                                        <div id="InputMonthly" class="group-select">
                                            <label for="rangeInputMonthly" class="form-label">Mensualités (en
                                                DH)</label><br>
                                            <div class="col-lg-12" id="optionMonthly">

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class=" align-items-center justify-content-center">

                                <button type="button" class="ms-2 btn-custom" onclick="shareLink()">Partager</button>


                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <form action="#" method="post" id="form" autocomplete="off">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <h5 class="card-title col-lg-10">Pour quel client ?</h5>
                            <div class="filter mt-3 col-lg-2">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Rechercher par:</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">CIN CLIENT</a></li>
                                    <li><a class="dropdown-item" href="#">REF CREDIT</a></li>                                    
                                </ul>
                            </div>
                            </div>
                            <div class="row">
                               
                            </div>
                        </div>
                    </div>
                    <div class="error-text col-12"></div>
                    <div class="card">
                        <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderCredit" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="card-body">

                            <h5 class="card-title">Détails du crédit</h5>
                            <!-- List group with active and disabled items -->
                            <ul class="list-group list-group-flush">

                                <h6 class="ms-0 subtile active" onclick="controlSubtile(this)" id="subtile-tariff"> <i
                                        class="bi bi-chevron-down bi-subtile-tariff"></i> Tarification</h6>

                                <li class="list-group-item" style="display: none;"><span class="infoL">Tariff ID
                                        : </span> <input type="text" name="TARIFF_ID_UK" readonly id="infoTariffID"
                                        class="infoR"></li>
                                <li class="list-group-item" style="display: none;"><span class="infoL">TAUXINT
                                        : </span> <input type="text" name="TAUXINT" readonly id="infoTAUXINT"
                                        class="infoR"></li>
                                <li class="list-group-item li-subtile-tariff"><span class="infoL"> Marque auto : </span>
                                    <input type="text" id="infoBrand" name="BRAND" readonly class="infoR">
                                </li>
                                <li class="list-group-item li-subtile-tariff"><span class="infoL"> Type produit :
                                    </span> <input type="text" id="infoProduct" name="PRODUCT" readonly class="infoR">
                                </li>
                                <li class="list-group-item li-subtile-tariff"><span class="infoL"> Barême : </span>
                                    <input type="text" id="infoTariff" name="TARIFF" readonly class="infoR infoBareme">
                                </li>

                                <h6 class="ms-0 subtile active" onclick="controlSubtile(this)" id="subtile-credit"><i
                                        class="bi bi-chevron-down bi-subtile-credit"></i>Crédit simulé</h6>

                                <li class="list-group-item li-subtile-credit"><span class="infoL">Prix TTC : </span>
                                    <input type="text" id="infoAmount" name="AMOUNT" readonly class="infoR"></li>
                                <li class="list-group-item li-subtile-credit"><span class="infoL">Durée (mois) : </span>
                                    <input type="text" id="infoDuration" name="DURATION" readonly class="infoR"></li>
                                <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                                        (%)</span> <input type="text" id="infoApportPerc" name="DOWN_PMT_PERC" readonly
                                        class="infoR"></li>
                                <li class="list-group-item li-subtile-credit"><span class="infoL">Mensualité : </span>
                                    <input type="text" id="infoMonthly" name="MONTHLY" readonly class="infoR"></li>

                                <h6 class="ms-0 subtile active" onclick="controlSubtile(this)" id="subtile-apport"> <i
                                        class="bi bi-chevron-down bi-subtile-apport"></i> Apport</h6>

                                <li class="list-group-item li-subtile-apport"><span class="infoL">Frais dossier :
                                    </span> <input type="text" name="APP_FEES" class="infoR" readonly id="infoFD"></li>
                                <li class="list-group-item li-subtile-apport"><span class="infoL">Apport total : </span>
                                    <input type="text" id="infoApport" name="DOWN_PMT" readonly class="infoR"></li>
                                <li class="list-group-item li-subtile-apport"><span class="infoL">Assurance : </span>
                                    <input type="text" id="infoADI" name="ADI" readonly class="infoR"></li>
                                <li class="list-group-item li-subtile-apport"><span class="infoL">Coût hors ADI :
                                    </span> <input type="text" id="infoCHAD" name="COST_EX_ADI" readonly class="infoR">
                                </li>

                            </ul><!-- End Clean list group -->

                            <div class="modal fade" id="share-link-modal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="position: relative;">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Renseigner le mail du destinateur</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="g-3 needs-validation" action="#" id="register-form"
                                                method="post">
                                                <div class="spinner-border text-danger spinner-pieces"
                                                    id="preloaderShareLink" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                                <div class="error-text-share-link col-lg-12"></div>
                                                <div class="col-lg-11 form-floating mb-3 ms-2 mt-3">
                                                    <input type="email" name="EMAIL" placeholder="Votre adresse mail"
                                                        class="form-control" id="yourEmail">
                                                    <label for="yourEmail" class="form-label">Saisir l'adresse
                                                        email ici...</label>
                                                </div>


                                                <div class="mt-5">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Fermer</button>
                                                    <button type="" name="SHARE_LINK"
                                                        class="btn btn-danger btn-credit-share-link">Partager</button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->
                            <div class="mt-3">
                                <button type="button" name="ask_credit_user"
                                    class="btn-custom btn-credit">Valider</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


</main><!-- End #main -->


<div class="modal fade mt-5" id="feedbackModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row modal-header" style="text-align: center;">
                <i class="col-12 bi bi-check-circle" style="font-size: 100px;"></i>
                <div class="col-12">
                    <div class="row">
                        <p class="info-dialog" id="successMessage"> </p>
                    </div>

                    <a href="<?php echo $_SESSION['page'] ?>" class="btn btn-secondary" id="back">OK</a>

                </div>

            </div>


        </div>
    </div>
</div>




<script type="text/javascript" src="jquery.min.js"></script>
<script src="jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.full.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>


<script>

    function controlSubtile(title) {
        let myLiClasses = ".li-" + title.id;


        icone = ".bi-" + title.id;
        if ($(title).hasClass("active")) {
            $(myLiClasses).hide();
            $(title).removeClass('active');
            $(icone).removeClass('bi-chevron-down');
            $(icone).addClass('bi-chevron-right');

        } else {
            $(myLiClasses).show();
            $(title).addClass('active');
            $(icone).removeClass('bi-chevron-right');
            $(icone).addClass('bi-chevron-down');


        }

    }


    const form = document.getElementById("form"),
        btnCreditAuto = form.querySelector(".btn-credit"),
        errorTextCredit = form.querySelector(".error-text");


    form.onsubmit = (e) => {
        e.preventDefault();
    }

    btnCreditAuto.onclick = () => {
        form.style.pointerEvents = "none";
        $('#mainPreloaderCredit').show();
        errorTextCredit.style.display = "none";
        form.style.opacity = .5;
        setTimeout(function () {
            $('#mainPreloaderCredit').hide();
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "users/agency/save-credit-auto.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let responseData = JSON.parse(xhr.responseText);
                        let data = responseData.status.trim();
                        if (data === "success") {
                            $("#successMessage").html(responseData.message);
                            $("#feedbackModal").modal("show");
                        } else {
                            errorTextCredit.style.display = "block";
                            errorTextCredit.innerHTML = responseData.message;
                            form.style.pointerEvents = "all";
                            form.style.opacity = 1;

                        }
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }, 2000);
    }



    const btnCreditShareLink = form.querySelector(".btn-credit-share-link"),
        errorTextCreditShare = form.querySelector(".error-text-share-link");

    btnCreditShareLink.onclick = () => {
        form.style.pointerEvents = "none";
        $('#preloaderShareLink').show();
        errorTextCreditShare.style.display = "none";
        form.style.opacity = .5;


        let xhr = new XMLHttpRequest();
        xhr.open("POST", "phpMailer/share-link-sim-credit-auto.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let responseData = JSON.parse(xhr.responseText);

                    let data = responseData.status.trim();

                    if (data === "success") {
                        setTimeout(function () {
                            $('#preloaderShareLink').hide();
                            $("#share-link-modal").modal("hide");
                            $("#successMessage").html(responseData.message);
                            $("#feedbackModal").modal("show");
                        }, 20);
                    } else {
                        setTimeout(function () {
                            $('#preloaderShareLink').hide();
                            errorTextCreditShare.style.display = "block";
                            errorTextCreditShare.innerHTML = responseData.message;
                            form.style.pointerEvents = "all";
                            form.style.opacity = 1;
                        }, 2000);


                    }
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);

    }






    $('#mySearchInput').typeahead({
        source: function (query, process) {
            $.ajax({
                url: "users/agency/data_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'cin' },
                success: function (data) {
                    var result = JSON.parse(data);
                    if (query.length > 7) {
                        // console.log(query);
                        controlDisplayOption(query);
                    }

                    var autocompleteData = result;
                    process(autocompleteData);

                }
            });
        },
        minLength: 1, // Nombre de caractères minimum pour déclencher l'autocomplétion
        highlight: true, // Met en surbrillance les correspondances dans les résultats
        hint: true // Affiche une suggestion en surbrillance
    });


    function controlDisplayOption(cin) {
        $.ajax({
            url: "users/agency/data_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'full_cin', CIN: cin },
            success: function (data) {
                if (data == 0) {
                    $("#displaying").show();
                } else {
                    $("#displaying").hide();
                }


            }
        });
    }

    function shareLink() {
        $("#share-link-modal").modal("show");
    }

</script>