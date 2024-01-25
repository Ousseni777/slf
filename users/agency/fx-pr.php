<style>
    /* #displaying{
        display: none;
    } */

    .block-slider {
        position: relative;
        margin-top: 100px;
    }

    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 12px;
        outline: none;
        border-radius: 3px;
        background-color: rgba(0, 0, 0, .3);
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 48px;
        height: 48px;
        z-index: 3;
        position: relative;
    }

    .selector {
        height: 104px;
        width: 48px;
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;

    }

    .selectBtn {
        height: 48px;
        width: 48px;

        background-image: url(assets/img/fleches-gauche-et-droite.png);
        background-size: cover;
        background-position: center;
        border-radius: 50%;

        position: absolute;
        bottom: 0;
    }

    .select-value {
        width: 48px;
        height: 40px;
        position: absolute;
        color: white;
        top: 0;
        background-color: rgb(232, 130, 92);
        border-radius: 4px;
        text-align: center;
        line-height: 45px;
        font-size: 20px;
        font-weight: bold;
    }

    #select-value-slider-amount,
    #select-value-slider-monthly {
        font-size: 10px;
    }

    .select-value::after {
        content: '';
        border-top: 17px solid goldenrod;
        border-left: 24px solid white;
        border-right: 24px solid white;
        position: absolute;
        bottom: -14px;
        left: 0;

    }

    .progress-bar {
        width: 50%;
        height: 10px;
        background-color: rgb(232, 130, 92);
        position: absolute;
        border-radius: 3px;
        top: 7px;
        left: 0; 
    }

    .label-slider {
        position: absolute;
        top: 30px;
        left: 0;
    }

    .recap-input {
        height: 55px;
        text-align: center;
        color: rgb(232, 130, 92);
        font-size: 30px;
        border-radius: 10px;
        border: 1px rgb(232, 130, 92) solid;
        font-weight: bold;
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
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Demander mon crédit en ligne</h1>
        <nav>
            <ol class="breadcrumb ">

                <li class="breadcrumb-item">Simulation</li>
                <li class="breadcrumb-item active">Création d'une nouvelle demande de crédit</li>
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

                        <div class="row g-3">
                            <div class="col-md-4 mt-5 " id="">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="idProfession" name="PRODUCT" aria-label="State"
                                        onchange="">
                                        <option value="SALARIE" id="SALARIE">SALARIE</option>
                                        <option value="FONCTIONNAIRE" id="FONCTIONNAIRE">FONCTIONNAIRE</option>
                                        <option value="COMMERCANT" id="COMMERCANT">COMMERCANT</option>
                                        <option value="SOCIETE" id="SOCIETE">SOCIETE</option>
                                    </select>
                                    <label for="floatingSelect">Profession</label>
                                </div>
                            </div>
                            <div class="row col-lg-8">
                                <div class="row col-lg-4 ms-1">
                                    <label for="">Montant</label>
                                    <input type="text" value="20000" id="input-slider-amount"
                                        class="col-lg-12 recap-input">
                                </div>
                                <div class="row col-lg-4 ms-1">
                                    <label for="">Durée</label>
                                    <input type="text" id="input-slider-duration" class="col-lg-12 recap-input">
                                </div>
                                <div class="row col-lg-4 ms-1">
                                    <label for="">Mensualité</label>
                                    <input type="text" id="input-slider-monthly" class="col-lg-12 recap-input">
                                </div>

                            </div>


                            <div class="row col-lg-12 flex-column align-items-center justify-content-center">
                                <!-- <label class="col-sm-2 col-form-label"> Mon choix </label> -->


                                <div class="col-sm-10">
                                    <!-- PRIX TTC -->
                                    <div class="block-field">

                                        <div class="col-lg-12 block-slider">
                                            <input type="range" min="1000" max="300000" value="100000"
                                                id="slider-amount" oninput="setSlider(this)" class="slider">
                                            <div id="selector-slider-amount" class="selector">
                                                <div class="selectBtn"> </div>
                                                <div id="select-value-slider-amount" class="select-value"> </div>
                                            </div>
                                            <div id="progress-bar-slider-amount" class="progress-bar"></div>
                                            <label for="slider-amount" class="label-slider">Montant (en DH) </label>
                                        </div>
                                    </div>

                                    <!-- DUREE -->


                                    <div class="block-field mt-5">

                                        <div class="col-lg-12 block-slider">

                                            <input type="range" min="12" max="100" value="50" id="slider-duration"
                                                oninput="setSlider(this)" class="slider">
                                            <div id="selector-slider-duration" class="selector">
                                                <div class="selectBtn"> </div>
                                                <div id="select-value-slider-duration" class="select-value"> </div>
                                            </div>
                                            <div id="progress-bar-slider-duration" class="progress-bar"></div>
                                            <label for="slider-duration" class="label-slider">Durée (en mois) </label>
                                        </div>
                                    </div>



                                    <div class="block-field mt-5">
                                        <div class="col-lg-12 block-slider">
                                            <input type="range" min="50" max="33848" step="0.01" id="slider-monthly"
                                                oninput="setSlider(this)" class="slider">
                                            <div id="selector-slider-monthly" class="selector">
                                                <div class="selectBtn"> </div>
                                                <div id="select-value-slider-monthly" class="select-value"> </div>
                                            </div>
                                            <div id="progress-bar-slider-monthly" class="progress-bar"></div>
                                            <label for="slider-monthly" class="label-slider">Mensualité (en DH) </label>
                                        </div>

                                    </div>


                                </div>
                            </div>

                            <div class="mt-5 align-items-center justify-content-center">

                                <button type="button" class="mt-5 ms-2 btn-custom" onclick="imprimerTableau()"
                                    id="save-pdf-btn">Imprimer</button>
                                <button type="button" class="mt-5 btn-custom" id="capture"
                                    onclick="capturer()">Envoyer</button>

                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <form action="#" method="post" id="form" autocomplete="off">

                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pour quel client ?</h5>
                            <div class="row">
                                <div class="col-12">

                                    <div class="col-sm-12">
                                        <?php if (isset($_GET['credit'])) {
                                            $CREDIT_ID_UK = $_GET['credit'];
                                            $select_credit = "SELECT * FROM `credit_client` WHERE SELLER_ID='$SELLER_ID_UK' AND CREDIT_ID_UK='$CREDIT_ID_UK'";
                                            $result_select_credit = $conn->query($select_credit);
                                            if ($result_select_credit->num_rows > 0) {
                                                $credit = $result_select_credit->fetch_assoc(); ?>
                                                <input type="text" style="display: none;" name="CREDIT_ID_UK"
                                                    value="<?php echo $credit['CREDIT_ID_UK'] ?>">
                                                <input type="text" style="display: none;" name="author_id"
                                                    value="<?php echo $credit['CLIENT_ID'] ?>">
                                                <input type="text" style="background-color: rgba(0,0,0,.05);" id="mySearchInput"
                                                    required readonly name="author_cin"
                                                    value="<?php echo $credit['CLIENT_CIN'] ?>"
                                                    placeholder="Saisir la (CIN) ici... " class="form-control">
                                            <?php }
                                        } else if (isset($_GET['numdoss'])) {
                                            $num_doss = $_GET['numdoss'];
                                            $select_numdoss = "SELECT * FROM `majestic` WHERE NUMDOSS = '{$num_doss}'";
                                            $result_select_numdoss = $conn->query($select_numdoss);
                                            if ($result_select_numdoss->num_rows > 0) {
                                                $dossier = $result_select_numdoss->fetch_assoc(); ?>
                                                    <input type="text" style="display: none;" name="CREDIT_ID_UK"
                                                        value="<?php echo $dossier['NUMDOSS'] ?>">
                                                    <input type="text" style="background-color: gray;" id="mySearchInput" required
                                                        readonly name="author" value="<?php echo $dossier['IDCLIENT'] ?>"
                                                        placeholder="Saisir la (CIN) ici... " class="form-control">
                                            <?php }
                                        } else { ?>
                                                <input type="text" style="display: none;" name="CREDIT_ID_UK" value="">
                                                <input type="text" id="mySearchInput" required name="author_id" required
                                                    placeholder="Saisir la (CIN) ici... " class="form-control">
                                        <?php } ?>

                                        <div class="row col-lg-12" id="displaying">
                                            <span class="col-lg-10 mt-3 align-items-center"
                                                style="color: red; font-size: 10px;">CIN non trouvé !</span>
                                            <div
                                                class="col-lg-12 mt-1">
                                            
                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-infos-client" style="border: 0;"  name="existed" >Ajouter un client </button>
                                            </div>
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="error-text col-lg-12"></div>
                    <div class="card">
                        <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderCredit" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="card-body">

                            <h5 class="card-title">Détails du crédit</h5>



                            <!-- List group with active and disabled items -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="display: none;"><span class="infoL">Tariff ID
                                        : </span> <input type="text" name="TARIFF_ID_UK" readonly id="infoTariffID"
                                        class="infoR"></li>
                                <li class="list-group-item"><span class="infoL"> Nom vendeur : </span> <input
                                        type="text" id="infoBrand" name="BRAND" readonly value="-" class="infoR">
                                </li>
                                <li class="list-group-item"><span class="infoL"> Type produit : </span> <input
                                        type="text" id="infoProduct" name="PRODUCT" readonly value="-" class="infoR"></li>
                                <li class="list-group-item"><span class="infoL"> Barême : </span> <input type="text"
                                        id="infoTariff" name="TARIFF" readonly value="-" class="infoR infoBareme"></li>

                                <li class="list-group-item"><span class="infoL">Prix TTC : </span> <input type="text"
                                        id="infoAmount" name="AMOUNT" readonly value="-" class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <input
                                        type="text" id="infoDuration" name="DURATION" readonly value="-" class="infoR"></li>
                                <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                                        (%)</span> <input type="text" id="infoApportPerc" name="DOWN_PMT_PERC" readonly
                                        class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Mensualité : </span> <input type="text"
                                        id="infoMonthly" name="MONTHLY" readonly value="-" class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Frais de dossier : </span> <input
                                        type="text" name="APP_FEES" class="infoR" readonly id="infoFD"></li>
                                <li class="list-group-item"><span class="infoL">Apport TOTAL : </span> <input
                                        type="text" id="infoApport" name="DOWN_PMT" readonly value="-" class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">ADI : </span> <input type="text"
                                        id="infoADI" name="ADI" readonly value="-" class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Cout hors ADI : </span> <input
                                        type="text" id="infoCHAD" name="COST_EX_ADI" readonly value="-" class="infoR"></li>

                            </ul><!-- End Clean list group -->
                            <div class="mt-3">
                                <button type="button" name="ask_credit_user" class="btn-custom btn-credit">Valider</button>
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


    function setParam() {
        var selectElement = document.getElementById("idProfession");
        selectElement.value = "<?php echo $_SESSION['PROFESSION'] ?>";

        var AMOUNT = document.getElementById("slider-amount");
        AMOUNT.value = "<?php echo $_SESSION['AMOUNT'] ?>";

        var DURATION = document.getElementById("slider-duration");
        DURATION.value = "<?php echo $_SESSION['DURATION'] ?>";
    }



    function setSliderValue() {

        // $("#select-value-slider-amount").text($("#slider-amount").val());
        // $("#select-value-slider-duration").text($("#slider-duration").val());

        let amount = document.getElementById("slider-amount");
        let duration = document.getElementById("slider-duration");
        let monthly = document.getElementById("slider-monthly");

        document.getElementById("select-value-slider-amount").innerHTML = amount.value;
        document.getElementById("select-value-slider-duration").innerHTML = duration.value;
        document.getElementById("select-value-slider-monthly").innerHTML = monthly.value;

        document.getElementById("input-slider-amount").value = amount.value;
        document.getElementById("input-slider-duration").value = duration.value;
        document.getElementById("input-slider-monthly").value = monthly.value;

        var percentAmount = (amount.value - amount.min) / (amount.max - amount.min) * 100;
        var percentDuration = (duration.value - duration.min) / (duration.max - duration.min) * 100;
        var percentMonthly = (monthly.value - monthly.min) / (monthly.max - monthly.min) * 100;

        document.getElementById("progress-bar-slider-amount").style.width = percentAmount + "%";
        document.getElementById("progress-bar-slider-duration").style.width = percentDuration + "%";
        document.getElementById("progress-bar-slider-monthly").style.width = percentMonthly + "%";

        document.getElementById("selector-slider-amount").style.left = percentAmount + "%";
        document.getElementById("selector-slider-duration").style.left = percentDuration + "%";
        document.getElementById("selector-slider-monthly").style.left = percentMonthly + "%";

    }


    function setSlider(btn) {

        let selectorId = "selector-" + btn.id;
        let progressBarId = "progress-bar-" + btn.id;
        let selectValueId = "select-value-" + btn.id;
        let inputRecapId = "input-" + btn.id;

        let selector = document.getElementById(selectorId);
        let progressBar = document.getElementById(progressBarId);
        let selectValue = document.getElementById(selectValueId);
        let inputRecap = document.getElementById(inputRecapId);

        var percent = (btn.value - btn.min) / (btn.max - btn.min) * 100;

        selector.style.left = percent + "%";
        progressBar.style.width = percent + "%";
        selectValue.innerHTML = btn.value;
        inputRecap.value = btn.value;

        if (btn.id == "slider-amount" || btn.id == "slider-duration") {
            calcFunctionPerso("slider-monthly");
            // console.log("slider-monthly");
        } else {
            calcFunctionPerso("slider-duration");
        }


        // calcFunctionPerso(btn.id);
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
            xhr.open("POST", "users/agency/save-credit.php", true);
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

    // $(document).ready(function () {
    //     $('#save-pdf-btn').click(function () {
    //         var pdf = new jsPDF();
    //         pdf.autoTable({ html: '#toPrintSim' });
    //         let pdfName = "recap_sim_.pdf";
    //         pdf.save(pdfName);
    //     });

    // });

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

    function imprimerTableau() {
        // Copier le contenu de la table
        var contenuTableau = document.getElementById('toPrintSim').outerHTML;

        var styleT = `<style>
            .toPrint{
            width: 100%;
            color: black;
        }
        .toPrint th{
            background-color: #f5c6cb;
        }
        .toPrint th, .toPrint td{
            padding: 2%;
            border: 1px solid gray;
        }
</style>`;

        // Ouvrir une nouvelle fenêtre ou un nouvel onglet avec le contenu de la table

        var page = '<html><head><title>Tableau à imprimer</title> ' + styleT + ' </head><body>';
        var nouvelleFenetre = window.open('', '_blank');
        nouvelleFenetre.document.write(page);
        nouvelleFenetre.document.write(contenuTableau);
        nouvelleFenetre.document.write('</body></html>');

        // Déclencher l'impression pour la nouvelle fenêtre ou le nouvel onglet
        nouvelleFenetre.document.close();
        nouvelleFenetre.print();
    }




    function saveScript() {
        $.ajax({
            url: "phpMailer/send-recap-sim.php",
            method: "POST",
            data: { img: 'table_image_1.jpg' },
            success: function (data) {
                console.log(data);
                location.href = "phpMailer/send-recap-sim.php";
            }
        });
    }

    function fetchBtnId(btn) {
        console.log(btn.id);
    }

</script>