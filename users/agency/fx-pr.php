<style>
    /* #displaying{
        display: none;
    } */

    .group-select {
        padding: 1px 3% 5% 3%;
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

    .block-slider {
        position: relative;
        margin-top: 70px;
    }

    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 12px;
        outline: none;
        border-radius: 3px;
        background-color: rgba(0, 0, 0, .05);
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
        height: 40px;
        width: 40px;

        background-image: url(assets/img/fleches-gauche-et-droite.png);
        background-size: cover;
        background-position: center;
        border-radius: 50%;

        position: absolute;
        bottom: 5px;
        left: 3px;
    }

    .select-value {
        width: 48px;
        height: 40px;
        position: absolute;
        color: red;
        top: 5px;
        background-color: rgba(232, 130, 92,.05);
        border-radius: 4px 4px 0 0;
        text-align: center;
        line-height: 45px;
        font-size: 10px;
        font-weight: bold;
    }

    

    .select-value::after {
        content: '';
        border-top: 17px solid rgba(232, 130, 92,.05);
        border-left: 24px solid white;
        border-right: 24px solid white;
        position: absolute;
        bottom: -14px;
        left: 0;

    }

    .progress-bar {
        width: 50%;
        height: 10px;
        background-color: rgba(232, 130, 92,.8);
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
        <h1>Simulateur <i class="bi bi-chevron-right" style="color: red;"></i> crédit personnel</h1>
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

                            <div class="col-md-4 " id="">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="" disabled name="PRODUCT" aria-label="State"
                                        onchange="">


                                        <option value="COMMERCANT" id="RENOUVELABLE">AG. NORMANDI</option>

                                    </select>
                                    <label for="floatingSelect">AFFECTATION</label>
                                </div>
                            </div>
                            <div class="col-md-4 " id="">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="idProject" aria-label="State" onchange="calcFunctionPerso()">

                                        <option value="CREDIT PERSONNEL" id="PERSONNEL">CREDIT PERSONNEL</option>
                                        <option value="CREDIT RENOUVELABLE" id="RENOUVELABLE">CREDIT RENOUVELABLE</option>

                                    </select>
                                    <label for="floatingSelect">TYPE PROJET</label>
                                </div>
                            </div>
                            <div class="col-md-4 " id="">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="idProfession" name="PRODUCT" aria-label="State"
                                        onchange="calcFunctionPerso()">
                                        <option value="SALARIE" id="SALARIE">SALARIE</option>
                                        <option value="FONCTIONNAIRE" id="FONCTIONNAIRE">FONCTIONNAIRE</option>
                                        <option value="COMMERCANT" id="COMMERCANT">COMMERCANT</option>
                                        <option value="SOCIETE" id="SOCIETE">SOCIETE</option>
                                    </select>
                                    <label for="floatingSelect">PROFESSION</label>
                                </div>
                            </div>

                            <div class="row col-lg-12 flex-column align-items-center justify-content-center">
                                <!-- <label class="col-sm-2 col-form-label"> Mon choix </label> -->


                                <div class="col-sm-12">
                                    <!-- PRIX TTC -->
                                    <div class="block-field group-select">

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


                                    <div class="block-field group-select mt-3">

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



                                    <div class="block-field group-select mt-3">
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

                            <div class=" align-items-center justify-content-center mt-5">

                                <button type="button" class="ms-4 btn-custom" onclick="shareLink()">Partager</button>


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
                                            $CREDIT_ID = $_GET['credit'];
                                            $select_credit = "SELECT * FROM `credit_client` WHERE SELLER_ID='$SELLER_ID' AND CREDIT_ID='$CREDIT_ID'";
                                            $result_select_credit = $conn->query($select_credit);
                                            if ($result_select_credit->num_rows > 0) {
                                                $credit = $result_select_credit->fetch_assoc(); ?>
                                                <input type="text" style="display: none;" name="CREDIT_ID"
                                                    value="<?php echo $credit['CREDIT_ID'] ?>">

                                                <input type="text" style="background-color: rgba(0,0,0,.05);" id="mySearchInput"
                                                    readonly name="CLIENT_CIN" value="<?php echo $credit['CLIENT_CIN'] ?>"
                                                    placeholder="Saisir la (CIN) ici... " class="form-control">
                                            <?php }
                                        } else { ?>
                                                <input type="text" style="display: none;" name="CREDIT_ID" value="">
                                                <input type="text" id="mySearchInput" name="CLIENT_CIN"
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
                    <div class="card">
                        <div class="spinner-border text-danger spinner-pieces" id="mainPreloaderCredit" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="card-body">

                            <h5 class="card-title">Détails du crédit</h5>
            
                            <ul class="list-group list-group-flush">

                           
                                <li class="list-group-item" style="display: none;"><span class="infoL">TAUXINT
                                        : </span> <input type="text" name="TAUXINT" readonly id="infoTAUXINT"
                                        class="infoR"></li>

                                <h6 class="ms-0 subtile active" onclick="controlSubtile(this)" id="subtile-projet"> <i
                                        class="bi bi-chevron-down bi-subtile-projet"></i> Projet</h6>


                                <li class="list-group-item li-subtile-projet"><span class="infoL"> Type projet : </span>
                                    <input type="text" id="infoProject" name="PROJECT" readonly class="infoR">
                                </li>
                                <li class="list-group-item li-subtile-projet"><span class="infoL"> Profession :
                                    </span> <input type="text" id="infoProfession" name="PROFESSION" readonly
                                        class="infoR">
                                </li>


                                <h6 class="ms-0 subtile active" onclick="controlSubtile(this)" id="subtile-credit"><i
                                        class="bi bi-chevron-down bi-subtile-credit"></i>Crédit simulé</h6>

                                <li class="list-group-item li-subtile-credit"><span class="infoL">Prix TTC : </span>
                                    <input type="text" id="infoAmount" name="AMOUNT" readonly class="infoR">
                                </li>
                                <li class="list-group-item li-subtile-credit"><span class="infoL">Durée (mois) : </span>
                                    <input type="text" id="infoDuration" name="DURATION" readonly class="infoR">
                                </li>
                                <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                                        (%)</span> <input type="text" id="infoApportPerc" name="DOWN_PMT_PERC" readonly
                                        class="infoR"></li>
                                <li class="list-group-item li-subtile-credit"><span class="infoL">Mensualité : </span>
                                    <input type="text" id="infoMonthly" name="MONTHLY" readonly class="infoR">
                                </li>

                                <h6 class="ms-0 subtile active" onclick="controlSubtile(this)" id="subtile-apport"> <i
                                        class="bi bi-chevron-down bi-subtile-apport"></i> Apport</h6>

                                <li class="list-group-item li-subtile-apport"><span class="infoL">Frais dossier :
                                    </span> <input type="text" name="APP_FEES" class="infoR" readonly id="infoFD"></li>
                                <li class="list-group-item li-subtile-apport"><span class="infoL">Apport total : </span>
                                    <input type="text" id="infoApport" name="DOWN_PMT" readonly class="infoR">
                                </li>
                                <li class="list-group-item li-subtile-apport"><span class="infoL">Assurance : </span>
                                    <input type="text" id="infoADI" name="ADI" readonly class="infoR">
                                </li>
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


    function setParam() {
        var selectElement = document.getElementById("idProfession");
        selectElement.value = "<?php echo $_SESSION['PROFESSION'] ?>";

        var AMOUNT = document.getElementById("slider-amount");
        AMOUNT.value = "<?php echo $_SESSION['AMOUNT'] ?>";

        var DURATION = document.getElementById("slider-duration");
        DURATION.value = "<?php echo $_SESSION['DURATION'] ?>";
    }



    function setProgressBar() {

        let amount = document.getElementById("slider-amount");
        let duration = document.getElementById("slider-duration");
        let monthly = document.getElementById("slider-monthly");

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
        // let inputRecapId = "input-" + btn.id;

        let selector = document.getElementById(selectorId);
        let progressBar = document.getElementById(progressBarId);
        let selectValue = document.getElementById(selectValueId);
        // let inputRecap = document.getElementById(inputRecapId);

        var percent = (btn.value - btn.min) / (btn.max - btn.min) * 100;

        selector.style.left = percent + "%";
        progressBar.style.width = percent + "%";
        selectValue.innerHTML = btn.value;
        // inputRecap.value = btn.value;

        if (btn.id == "slider-amount" || btn.id == "slider-duration") {
            calcFunctionPerso("slider-monthly");
        } else {
            calcFunctionPerso("slider-duration");
        }
    }

    function shareLink() {
        $("#share-link-modal").modal("show");
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
            xhr.open("POST", "users/agency/save-credit-perso.php", true);
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
        xhr.open("POST", "phpMailer/share-link-sim-credit-perso.php", true);
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
    function calcFunctionPerso(target = "slider-monthly") {

        
        ProjectID = $("#idProject");
        ProfessionID = $("#idProfession");
        AmountID = $("#slider-amount");
        DurationValue = $("#slider-duration");
        Monthly = $("#slider-monthly");
      
        

        $.ajax({
            url: "./users/agency/calc-fx_perso.php",
            method: "POST",
            data: {
                ID_SCRIPT: target,
                ID_AMOUNT: AmountID.val(),
                ID_DURATION: DurationValue.val(),
                ID_MONTHLY: Monthly.val(),
                ID_PROFESSION: ProfessionID.val()

            },
            success: (data) => {
                var result = JSON.parse(data);

                document.getElementById("select-value-slider-amount").innerHTML = result.amount;
                document.getElementById("select-value-slider-duration").innerHTML = result.duration;
                document.getElementById("select-value-slider-monthly").innerHTML = result.monthly;

                $("#infoAmount").val(result.amount);
                $("#infoDuration").val(result.duration);
                $("#infoMonthly").val(result.monthly);
                $("#infoApportPerc").val(result.apport_perc);
                $("#infoApport").val(result.apport_total);
                $("#infoADI").val(result.assurance);           
                $("#infoFD").val(result.frais_dossier);
                $("#infoCHAD").val(result.cout);    
                $("#infoProfession").val(ProfessionID.val());
                $("#infoProject").val(ProjectID.val());    

                if (target === "slider-monthly") {
                    Monthly.val(result.monthly_no_format);
                    // console.log(result.monthly_no_format);
                } else {
                    DurationValue.val(result.duration);
                }
                setProgressBar();
            }
        });
    }


</script>