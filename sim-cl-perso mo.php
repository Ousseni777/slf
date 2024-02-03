<style>
    #heading {
        text-transform: uppercase;
        color: #c55e3c;
        font-weight: normal;
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px;
    }

    #msform fieldset {
        /* background-color: rgba(101, 111, 150, 0.15); */
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative;
    }

    .form-card {
        text-align: center;
        style="background-color: rgba(101, 111, 150, 0.15);"
    }

    #msform fieldset:not(:first-of-type) {
        display: none;
    }

    #msform .input-coordonnee {
        padding: 8px 15px 8px 15px;
        border: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;


        box-sizing: border-box;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: #2C3E50;
        style="background-color: rgba(101, 111, 150, 0.15);"
        font-size: 16px;
        letter-spacing: 1px;
    }

    #msform .input-coordonnee:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: px solid #c55e3c;
        outline-width: 0;
    }

    #msform .action-button {
        width: 100px;
        background: #c55e3c;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 0px 10px 5px;
        float: right;
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        background-color: #311B92
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px 10px 0px;
        float: right
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        background-color: #000000
    }

    .card {
        z-index: 0;
        border: none;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #c55e3c;
        margin-bottom: 15px;
        font-weight: normal;
        text-align: left
    }

    .purple-text {
        color: #c55e3c;
        font-weight: normal
    }

    .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right
    }

    .fieldlabels {
        color: gray;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #c55e3c
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\2638"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\1F440"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #c55e3c
    }

    .progress {
        height: 20px
    }

    .progress-bar {
        background-color: #c55e3c
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }
</style>

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
        background-color: rgba(232, 130, 92, .05);
        border-radius: 4px 4px 0 0;
        text-align: center;
        line-height: 45px;
        font-size: 10px;
        font-weight: bold;
    }



    .select-value::after {
        content: '';
        border-top: 17px solid rgba(232, 130, 92, .05);
        border-left: 24px solid white;
        border-right: 24px solid white;
        position: absolute;
        bottom: -14px;
        left: 0;

    }

    .progress-bar-slider {
        width: 50%;
        height: 10px;
        background-color: rgba(232, 130, 92, .8);
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
        /* border: 1px rgb(232, 130, 92) solid; */
        border: none;
        font-weight: bold;
        background-color: rgba(101, 111, 150, 0.1);
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
    .step {
        background-color: rgba(101, 111, 150, 0.3);
    }

    .card-body ul {
        background-color: rgba(101, 111, 150, 0.5);
    }

    .list-group-item .infoR {
        padding: 8px 15px 8px 15px;
        border: 1px solid #ccc;
        float: right;
        font-size: 14px;
        width: 40%;
        border: none;
        text-align: left;
        color: rgb(232, 130, 92);

    }

    .list-group-item .infoL {
        padding: 8px 15px 8px 15px;
        /* border: 1px solid #ccc; */
        float: left;
        font-size: 14px;
        width: 40%;
        text-align: right;
        /* color: rgb(232, 130, 92); */
        /* border: none; */
    }
</style>
<!-- partial:index.partial.html -->
<div class="container-fluid justify-content-center">
    <div class=" row justify-content-center">
        <div class="col-lg-12 text-center p-0 mb-2">
            <div class="card justify-content-center">

                <!-- <p>Fill all form field to go to next step</p> -->
                <form id="msform" class="col-lg-12 justify-content-center">
                    <div class=" progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class=" active" id="account"><strong>Bien/Service</strong></li>
                        <li id="personal"><strong>Client/Type 1</strong></li>
                        <li id="payment"><strong>Client/Type 2</strong></li>
                        <li id="confirm"><strong>Client/Type 3</strong></li>
                    </ul>

                    <fieldset class="row">
                        
                        <input type="button" name="next" class="next action-button mt-5" value="Suivant" />
                    </fieldset>
                    <fieldset class="row">
                        <div class=" form-card">
                            <div class="row step p-2">
                                <div class="col-7">
                                    <h2 class="fs-title">Récapitulatif de votre crédit:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Etape 2-4</h2>
                                </div>
                            </div>
                            <div class="card">


                                <div class="card-body">



                                    <!-- List group with active and disabled items -->
                                    <ul class="">

                                        <li class="list-group-item"><span class="infoL"> Mon projet : </span> <input
                                                type="text" value="Crédit personnel" id="infoBrand" name="BRAND"
                                                readonly class="infoR">
                                        </li>
                                        <li class="list-group-item"><span class="infoL"> Vous êtes : </span> <input
                                                type="text" value="Fonctionnaire" id="infoProduct" name="PRODUCT"
                                                readonly class="infoR">
                                        </li>


                                        <li class="list-group-item"><span class="infoL">Prix TTC (DH) : </span> <input
                                                type="text" value="200 000" id="infoAmount" name="AMOUNT" readonly
                                                class="infoR">
                                        </li>
                                        <li class="list-group-item"><span class="infoL">Durée (mois) : </span>
                                            <input type="text" id="infoDuration" name="DURATION" value="36" readonly
                                                class="infoR">
                                        </li>
                                        <li class="list-group-item" style="display: none;"><span class="infoL">Apport
                                                (%)</span> <input type="text" id="infoApportPerc" name="DOWN_PMT_PERC"
                                                readonly value="30" class="infoR"></li>
                                        <li class="list-group-item"><span class="infoL">Mensualité : </span> <input
                                                type="text" value="6 123,56" id="infoMonthly" name="MONTHLY" readonly
                                                class="infoR">
                                        </li>
                                        <li class="list-group-item"><span class="infoL">Frais de dossier : </span>
                                            <input type="text" name="APP_FEES" class="infoR" value="1 352,65" readonly
                                                id="infoFD">
                                        </li>

                                    </ul><!-- End Clean list group -->

                                </div>
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Suivant" /> <input
                            type="button" name="previous" class="previous action-button-previous" value="Précédent" />
                    </fieldset>
                    <fieldset class="row">
                        <div class=" form-card">
                            <div class="row step p-2">
                                <div class="col-7">
                                    <h2 class="fs-title">Mes coordonnées personnelles:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Etape 3-4</h2>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <label class="fieldlabels">Email: *</label>
                                    <input class="input-coordonnee float-end" type="email" name="email"
                                        placeholder="Votre adresse email..." />

                                </div>
                                <div class="col-lg-6">
                                    <label class="fieldlabels">Téléphone: *</label>
                                    <input class="input-coordonnee float-end" type="text" name="uname"
                                        placeholder="Votre N° de téléphone..." />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="fieldlabels">Nom complet : *</label>
                                    <input class="input-coordonnee float-end" type="text" name="NOM"
                                        placeholder="Votre nom complet..." />
                                </div>
                                <div class="col-lg-6">
                                    <label class="fieldlabels">CIN : *</label>
                                    <input class="input-coordonnee float-end" type="text" name="pwd"
                                        placeholder="Votre CIN..." />
                                </div>

                            </div>

                        </div>

                        <input type="button" name="next" class="next action-button" value="Envoyer" /> <input
                            type="button" name="Précédent" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset class="row">
                        <div class=" form-card">
                            <div class="row step p-2">
                                <div class="col-7">
                                    <h2 class="fs-title">Terminer :</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Etape 4-4</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>DEMANDE ENVOYEE AVEC SUCCES !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="img.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">Merci de consulter votre adresse e-mail pour
                                        suivre l'état d'avancement du traitement de votre demande !</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<!-- <script src="./script.js"></script> -->

<script>
    $(document).ready(function () {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function () {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function () {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }

        $(".submit").click(function () {
            return false;
        })

    });
</script>

<script>

    setSliderValue();



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
                    background - color: #f5c6cb;
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