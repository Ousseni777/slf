<style>
    .space {
        margin-bottom: 50px;
    }

    .value-display {
        position: absolute;
        top: 10px;
        width: 85px;
        text-align: center;
        transform: translateX(-50%);
        background-color: #f8f9fa;
        padding: 5px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        pointer-events: none;
    }

    .value-min,
    .value-max {
        position: absolute;
        top: 60px;
        width: 60px;
        text-align: center;
        transform: translateX(-50%);
        background-color: #f8f9fa;
        padding: 5px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        pointer-events: none;
    }
</style>
<div class="col-lg-12 mt-3 tab-pane fade" id="new-credit">
    <h3 class="card-title">Demander mon crédit en ligne</h3>
    <nav>
        <ol class="breadcrumb">

            <li class="breadcrumb-item active">Simulation</li>
            <li class="breadcrumb-item">Création d'une nouvelle demande de crédit</li>
        </ol>
    </nav>
    <div class="row d-flex flex-column align-items-center justify-content-center">
        <div class="col-lg-11" data-aos="fade-up" data-aos-delay="200">

            <p class="space"></p>
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
                            <input type="range" class="form-range" min="5000" max="500000" onchange="calcFunctionAuto()"
                                step="1000" id="rangeInputAmount">

                        </div>
                    </div>

                    <div class="block-field">

                        <div class="col-sm-12 group-select">
                            <span for="rangeInputDuration" class="form-label">Durée (en
                                mois)</span><br>

                            <div class="row controlRadios" id="controlDuration">

                            </div>
                            <div class="" id="idRange">
                                <input type="range" class="form-range" min="0" max="100" value="" step="1" disabled
                                    id="rangeInputDuration">
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

                                <input type="range" class="form-range" min="0" max="100" value="" step="1" disabled
                                    id="rangeInputApport">
                            </div>
                        </div>

                    </div>
                    <div class="block-field">
                        <div id="InputMonthly" class="group-select">
                            <label for="rangeInputMonthly" class="form-label">Mensualités (en
                                DH)</label><br>
                            <input type="text" class="inputFlag" id="rangeValueMonthly" disabled value="">
                            <input type="range" min="0" max="43000" class="form-range" step="0.01" value="" disabled
                                id="rangeInputMonthly">
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <!-- <button class="btn btn-outline-success w-100" id="simulerAuto"
                    onclick="displayAuto()">Simuler </button> -->
                        <button class="btn btn-outline-success w-100" id="simulerAuto" onclick="displayAuto()">Simuler
                            <div class="spinner-border" style="width: 15px; height: 15px; display: none; "
                                id="spinnerBtnAuto" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div></button>
                    </div>
                </div>

                <div class="col-sm-12" id="perso-block">
                    <div class="range-container group-select">
                        <label for="customRange2" class="form-label">Montant du crédit</label>
                        <input type="range" class="form-range custom-range" min="2000" max="50000" step="500"
                            id="rangeInputTTC" value="40000">
                        <span class="value-display" id="valueDisplayTTC"></span>
                        <span class="value-display value-min" id="valueMin"></span>
                        <span class="value-display value-max" id="valueMax"></span>
                    </div>
                    <p class="space"></p>
                    <div class="range-container group-select">
                        <label for="customRange2" class="form-label">Durée</label>
                        <input type="range" class="form-range custom-range" min="2" max="120" value="24" step="1"
                            id="rangeInputDurationPerso">
                        <span class="value-display" id="valueDisplayDuration"></span>
                        <span class="value-display value-min" id="valueMinMonthly"></span>
                        <span class="value-display value-max" id="valueMaxMonthly"></span>
                    </div>
                    <p class="space"></p>
                    <div class="range-container group-select">
                        <label for="customRange2" class="form-label">Mensualité</label>
                        <input type="range" class="form-range custom-range" min="100" max="30000" step=".1"
                            id="rangeInputMonthlyPerso" onchange="calcFunctionPerso('duration')">
                        <span class="value-display" id="valueDisplayMonthly"></span>
                        <span class="value-display value-min" id="valueMinMonthly"></span>
                        <span class="value-display value-max" id="valueMaxMonthly"></span>
                    </div>

                    <div class="col-12 group-select">
                        <p class="space"></p>
                        <button class="btn btn-outline-success w-100" id="simulerPerso" onclick="displayPerso()">Simuler
                            <div class="spinner-border" style="width: 15px; height: 15px; display: none; "
                                id="spinnerBtnPerso" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript" src="./javascript/ajax-script.js"></script>
<script>

    //Après chargement de la page

    window.addEventListener("load", function () {
        $('#spinnerRecap').hide();
        controller();
    });

    //Pour le crédit personnel
    var rangeInputTTC = document.getElementById('rangeInputTTC');
    var valueDisplayTTC = document.getElementById('valueDisplayTTC');

    var percent = (rangeInputTTC.value - rangeInputTTC.min) / (rangeInputTTC.max - rangeInputTTC.min) * 100;
    valueDisplayTTC.style.left = percent + '%';
    valueDisplayTTC.textContent = rangeInputTTC.value;


    rangeInputTTC.addEventListener('input', function () {
        var percent = (rangeInputTTC.value - rangeInputTTC.min) / (rangeInputTTC.max - rangeInputTTC.min) * 100;
        valueDisplayTTC.style.left = percent + '%';
        valueDisplayTTC.textContent = rangeInputTTC.value;

        calcFunctionPerso();
    });

    var rangeInputMonthly = document.getElementById('rangeInputMonthlyPerso');
    var valueDisplayMonthly = document.getElementById('valueDisplayMonthly');

    var percent = (rangeInputMonthly.value - rangeInputMonthly.min) / (rangeInputMonthly.max - rangeInputMonthly.min) * 100;
    valueDisplayMonthly.style.left = percent + '%';
    valueDisplayMonthly.textContent = rangeInputMonthly.value;

    rangeInputMonthly.addEventListener('input', function () {
        var percent = (rangeInputMonthly.value - rangeInputMonthly.min) / (rangeInputMonthly.max - rangeInputMonthly.min) * 100;
        valueDisplayMonthly.style.left = percent + '%';
        valueDisplayMonthly.textContent = rangeInputMonthly.value;
        calcFunctionPerso('duration');
    });



    var rangeInputDuration = document.getElementById('rangeInputDurationPerso');
    var valueDisplayDuration = document.getElementById('valueDisplayDuration');


    var percent = (rangeInputDuration.value - rangeInputDuration.min) / (rangeInputDuration.max - rangeInputDuration.min) * 100;
    valueDisplayDuration.style.left = percent + '%';
    valueDisplayDuration.textContent = rangeInputDuration.value;
    rangeInputDuration.addEventListener('input', function () {
        var percent = (rangeInputDuration.value - rangeInputDuration.min) / (rangeInputDuration.max - rangeInputDuration.min) * 100;
        valueDisplayDuration.style.left = percent + '%';
        valueDisplayDuration.textContent = rangeInputDuration.value;
        calcFunctionPerso();
    });

    var rangeInputs = document.querySelectorAll('.custom-range');
    var val_min = document.querySelectorAll('.value-min');
    var val_max = document.querySelectorAll('.value-max');

    let i = 0;
    rangeInputs.forEach(function (input) {

        val_max[i].textContent = input.max;
        val_min[i].textContent = input.min;
        val_max[i].style.left = 91 + '%';
        val_min[i].style.left = 9 + '%';
        i++;
    });


    //Pour le crédit auto
    const rangeValueAmount = document.getElementById("rangeValueAmount");
    const rangeInputAmount = document.getElementById("rangeInputAmount");
    rangeInputAmount.addEventListener("input", function () {
        rangeValueAmount.value = rangeInputAmount.value;
        calcFunctionAuto();
    });

    rangeValueAmount.addEventListener("input", function () {
        rangeInputAmount.value = rangeValueAmount.value;
        calcFunctionAuto();
    });

    function controller() {

        let project = document.getElementById('idProject');
        let profession = document.getElementById('controlProfession');
        let auto_block = document.getElementById('auto-block');
        let perso_block = document.getElementById('perso-block');

        let autos = document.querySelectorAll('.controlAutos');


        if (project.value == "auto") {
            displayAutos(autos);
            profession.style.display = 'none';
            auto_block.style.display = "inline";
            perso_block.style.display = "none";

            loadBrand();

        } else {
            profession.style.display = 'block';
            auto_block.style.display = "none";
            perso_block.style.display = "inline";
            hideAutos(autos);


            calcFunctionPerso();

        }
        hideCard();
    }


    function hideAutos(autos) {
        for (let i = 0; i < autos.length; i++) {
            autos[i].style.display = 'none';
        }
    }

    function displayAutos(autos) {
        for (let i = 0; i < autos.length; i++) {
            autos[i].style.display = 'block';
        }
    }


    function displayAuto() {

        document.getElementById('cardPerso').style.display = "none";


        document.getElementById('cardAuto').style.display = "none";
        $('#spinnerBtnAuto').show();
        $('#spinnerRecap').show();


        setTimeout(function () {
            $('#spinnerBtnAuto').hide();
            // scrollToTop();
            $('#spinnerRecap').hide();
            $('#cardAuto').show();
        }, 2000);

        // setTimeout(function () {

        //     $('#spinnerRecap').hide();
        //     $('#cardAuto').show();
        // }, 4000);
    }
    function displayPerso() {

        document.getElementById('cardAuto').style.display = "none";
        document.getElementById('cardPerso').style.display = "none";
        $('#spinnerBtnPerso').show();
        $('#spinnerRecap').show();

        setTimeout(function () {
            $('#spinnerBtnPerso').hide();
            // scrollToTop();
            $('#spinnerRecap').hide();
            $('#cardPerso').show();
        }, 2000);

        // setTimeout(function () {

        //     $('#spinnerRecap').hide();
        //     $('#cardPerso').show();
        // }, 2000);

    }
    function hideCard() {
        document.getElementById('cardAuto').style.display = "none";
        document.getElementById('cardPerso').style.display = "none";
    }

    function scrollToTop() {
        window.scrollTo({
            top: 500,
            behavior: 'smooth'
        });
    }




</script>