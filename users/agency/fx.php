<main id="main" class="main">

    <div class="pagetitle">
        <h1>Demander mon crédit en ligne</h1>
        <nav>
            <ol class="breadcrumb">

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

                            <?php if (isset($seller)) { ?>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <?php if ($seller == 'SALAFIN') { ?>

                                            <select class="form-select" id="idBrand" name="brand" onchange="loadProduct()"
                                                aria-label="State">
                                            </select>

                                        <?php } else { ?>

                                            <select class="form-select" id="idBrand" name="brand" disabled
                                                onchange="loadProduct()" aria-label="State">
                                            </select>

                                        <?php } ?>
                                        <label for="floatingSelect">Marque</label>
                                    </div>
                                </div>

                                <div class="col-md-4 controlAutos" id="controlProduct">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idProduct" name="product" aria-label="State"
                                            onchange="loadTariff()">

                                        </select>
                                        <label for="floatingSelect">Produit</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idTariff" name="tariff" onchange="loadDuration()"
                                            aria-label="State">


                                        </select>

                                        <label for="floatingSelect">Barême</label>
                                    </div>

                                </div>

                            <?php } ?>


                            <div class="row mb-5">
                                <!-- <label class="col-sm-2 col-form-label"> Mon choix </label> -->

                                <div class="col-sm-12">

                                    <div class="block-field">

                                        <div class="group-select">
                                            <label for="rangeInputAmount" class="form-label">PRIX
                                                TTC</label><br>
                                            <input type="text" class="inputFlag" id="rangeValueAmount" value="">
                                            <input type="range" name="amount" class="form-range" min="5000" max="500000"
                                                onchange="calcFunction()" step="1000" id="rangeInputAmount">

                                        </div>
                                    </div>

                                    <div class="block-field">

                                        <div class="col-sm-10 group-select">
                                            <span for="rangeInputDuration" class="form-label">Durée (en
                                                mois)</span><br>
                                            <div class="row controlRadios" id="controlDuration">

                                            </div>
                                            <div id="idRange">
                                                <input type="range" name="duration" class="form-range" min="0" max="100"
                                                    value="" step="1" disabled id="rangeInputDuration">
                                            </div>
                                        </div>



                                    </div>
                                    <div class="block-field">
                                        <div class="col-sm-10 group-select">
                                            <span for="" class="form-label">Apport TOTAL (en
                                                %)</span><br>
                                            <div class="row controlRadios" id="controlApport">

                                            </div>
                                            <div id="">
                                                <input type="range" name="down_pmt_perc" class="form-range" min="0"
                                                    max="100" value="" step="1" disabled id="rangeInputApport">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="block-field">
                                        <div id="InputMonthly" class="group-select">
                                            <label for="rangeInputMonthly" class="form-label">Mensualités (en
                                                DH)</label><br>
                                            <input type="text" class="inputFlag" id="rangeValueMonthly" disabled
                                                value="">
                                            <input type="range" name="monthly" min="0" max="43000" class="form-range"
                                                step="0.01" value="" disabled id="rangeInputMonthly">
                                        </div>
                                    </div>

                                </div>
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
                                            $credit_id = $_GET['credit'];
                                            $select_credit = "SELECT * FROM `credit_client` WHERE seller_id='$seller_id' AND credit_id='$credit_id'";
                                            $result_select_credit = $conn->query($select_credit);
                                            if ($result_select_credit->num_rows > 0) {
                                                $credit = $result_select_credit->fetch_assoc(); ?>
                                                <input type="text" style="display: none;" name="credit_id"
                                                    value="<?php echo $credit['credit_id'] ?>">
                                                <input type="text" style="display: none;" name="author_id"
                                                    value="<?php echo $credit['client_id'] ?>">
                                                <input type="text" style="background-color: rgba(0,0,0,.05);" id="mySearchInput" readonly
                                                    name="author_cin" value="<?php echo $credit['client_cin'] ?>"
                                                    placeholder="Rechercher (CIN) " class="form-control">
                                            <?php }
                                        } else if (isset($_GET['numdoss'])) {
                                            $num_doss = $_GET['numdoss'];
                                            $select_numdoss = "SELECT * FROM `majestic` WHERE NUMDOSS = '{$num_doss}'";
                                            $result_select_numdoss = $conn->query($select_numdoss);
                                            if ($result_select_numdoss->num_rows > 0) {
                                                $dossier = $result_select_numdoss->fetch_assoc(); ?>
                                                    <input type="text" style="display: none;" name="credit_id"
                                                        value="<?php echo $dossier['NUMDOSS'] ?>">
                                                    <input type="text" style="background-color: gray;" id="mySearchInput" readonly
                                                        name="author" value="<?php echo $dossier['IDCLIENT'] ?>"
                                                        placeholder="Rechercher (CIN) " class="form-control">
                                            <?php }
                                        } else { ?>
                                                <input type="text" style="display: none;" name="credit_id" value="">
                                                <input type="text" id="mySearchInput" name="author_id" required
                                                    placeholder="Rechercher (CIN) " class="form-control">
                                        <?php } ?>
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
                                        : </span> <input type="text" name="tariff_id" readonly id="infoTariffID"
                                        class="infoR"></li>
                                <li class="list-group-item"><span class="infoL"> Nom vendeur : </span> <input
                                        type="text" id="infoBrand" name="brand" readonly class="infoR">
                                </li>
                                <li class="list-group-item"><span class="infoL"> Type produit : </span> <input
                                        type="text" id="infoProduct" name="product" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL"> Barême : </span> <input type="text"
                                        id="infoTariff" name="tariff" readonly class="infoR infoBareme"></li>

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
                                        type="text" name="app_fees" class="infoR" readonly id="infoFD"></li>
                                <li class="list-group-item"><span class="infoL">Apport TOTAL : </span> <input
                                        type="text" id="infoApport" name="down_pmt" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">ADI : </span> <input type="text"
                                        id="infoADI" name="adi" readonly class="infoR"></li>
                                <li class="list-group-item"><span class="infoL">Cout hors ADI : </span> <input
                                        type="text" id="infoCHAD" name="cost_ex_adi" readonly class="infoR"></li>

                            </ul><!-- End Clean list group -->
                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" name="ask_credit_user"
                                    class="btn btn-outline-primary btn-credit">Demander
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

<!-- <div class="modal fade" id="modalCreditSuccessfully" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header row">
                <?php if (isset($_SESSION['updated']) && $_SESSION['updated'] == true) { ?>
               
                    <div class="pagetitle" style="text-align: center;">
                        <h1>Demande modifiée</h1>

                    </div>
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <div class="valide">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>

                            <p>La demande N°
                                <?php echo $_SESSION['credit_temp'] ?> a été modifiée avec succès !

                                <?php unset($_SESSION['updated']);
                                unset($_SESSION['credit_temp']); ?>
                            </p>
                            <h5>L'intitulé sera contacté dans 48h</h5>
                            <p>Votre confiance, notre source de motivation !</p>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="pagetitle" style="text-align: center;">
                        <h1>Demande ajoutée</h1>

                    </div>
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <div class="valide">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>

                            <p>La demande N°
                                <?php echo $_SESSION['credit_temp'] ?> a été ajoutée au nom du client N°
                                <?php echo $_SESSION['author_temp'] ?>
                                <?php unset($_SESSION['author_temp']);
                                unset($_SESSION['credit_temp']); ?>
                            </p>
                            <h5>L'intitulé sera contacté dans 48h</h5>
                            <p>Votre confiance, notre source de motivation !</p>
                        </div>
                    </div>
                <?php } ?>
                <a href="./sim-fx?tag=fx" class="btn btn-secondary">OK</a>

            </div>

        </div>
    </div>
</div> -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script>
    const form = document.getElementById("form"),
        btnCreditAuto = form.querySelector(".btn-credit"),
        errorText = form.querySelector(".error-text");


    form.onsubmit = (e) => {
        e.preventDefault();
    }

    btnCreditAuto.onclick = () => {
        form.style.pointerEvents = "none";
        $('#mainPreloaderCredit').show();
        errorText.style.display = "none";
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
                            errorText.style.display = "block";
                            errorText.innerHTML = responseData.message;
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
                    var autocompleteData = result;
                    process(autocompleteData);
                }
            });
        },
        minLength: 1, // Nombre de caractères minimum pour déclencher l'autocomplétion
        highlight: true, // Met en surbrillance les correspondances dans les résultats
        hint: true // Affiche une suggestion en surbrillance
    });



</script>