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

            <div class="col-md-12 controlAutos" id="idPrint">

            </div>
            <!-- <button class="btn btn-primary" onclick="imprimerTableau()">Imprimer</button> -->
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
                                            <input type="range" name="AMOUNT" class="form-range" min="50" max="500000"
                                                onchange="calcFunction()" step="1" id="rangeInputAmount">

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

                                <button type="button" class="ms-2 btn-custom" onclick="imprimerTableau()"
                                    id="save-pdf-btn">Imprimer</button>
                                <button type="button" class="btn-custom" id="capture"
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
                                            <div class="col-lg-12 mt-1">

                                                <button type="button" class="btn btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#modal-infos-client"
                                                    style="border: 0;" name="existed">Ajouter un client </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="error-text col-12"></div>

                    <!-- <div class="edit-success" id="success-infos">
                        <div class="alert alert-success" role="alert" style="text-align:center;">
                            <h4 class="alert-heading">
                                
                            </h4>
                        </div>
                    </div> -->
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
                                        type="text" id="infoBrand" name="BRAND" readonly class="infoR">
                                </li>
                                <li class="list-group-item"><span class="infoL"> Type produit : </span> <input
                                        type="text" id="infoProduct" name="PRODUCT" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL"> Barême : </span> <input type="text"
                                        id="infoTariff" name="TARIFF" readonly class="infoR infoBareme"></li>

                                <li class="list-group-item"><span class="infoL">Prix TTC : </span> <input type="text"
                                        id="infoAmount" name="AMOUNT" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Durée (mois) : </span> <input
                                        type="text" id="infoDuration" name="DURATION" readonly class="infoR"></li>
                                <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                                        (%)</span> <input type="text" id="infoApportPerc" name="DOWN_PMT_PERC" readonly
                                        class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Mensualité : </span> <input type="text"
                                        id="infoMonthly" name="MONTHLY" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Frais de dossier : </span> <input
                                        type="text" name="APP_FEES" class="infoR" readonly id="infoFD"></li>
                                <li class="list-group-item"><span class="infoL">Apport TOTAL : </span> <input
                                        type="text" id="infoApport" name="DOWN_PMT" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">ADI : </span> <input type="text"
                                        id="infoADI" name="ADI" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Cout hors ADI : </span> <input
                                        type="text" id="infoCHAD" name="COST_EX_ADI" readonly class="infoR"></li>

                            </ul><!-- End Clean list group -->
                            <div class="mt-3">
                                <button type="button" name="ask_credit_user" class="btn-custom">Valider</button>
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


    function capturer() {
        // Sélectionnez la table à capturer
        var tableToCapture = document.getElementById('toPrintSim');

        // Utilisez html2canvas pour capturer la table
        $("#toPrintSim").show();
        html2canvas(tableToCapture).then(function (canvas) {
            // Créez un objet Image à partir du canevas
            var img = new Image();
            img.src = canvas.toDataURL('image/jpg');

            // Créez un lien de téléchargement pour l'image
            var link = document.createElement('a');
            link.href = img.src;
            link.download = 'table_image_1.jpg'; // Nom du fichier à télécharger

            // Ajoutez le lien au document et déclenchez le téléchargement
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });

        $("#toPrintSim").hide();
        saveScript();
    };

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