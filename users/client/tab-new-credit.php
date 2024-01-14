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
                        <select class="form-select" id="idProject" name="PROJECT" onchange="controller()"
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
                        <select class="form-select" id="idProfession" name="PROFESSION" aria-label="State">
                            <option value="Salarié">Salarié</option>
                            <option value="Fonctionnaire">Fonctionnaire</option>
                            <option value="Commerçant">Commerçant</option>

                        </select>

                        <label for="floatingSelect">Dites-nous qui vous êtes ?</label>
                    </div>

                </div>
                <div class="form-group col-md-4 controlAutos" id="controlBrand">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="idBrand" name="BRAND" onchange="loadProduct()"
                            aria-label="State">

                        </select>
                        <label for="floatingSelect">Marque</label>
                    </div>


                </div>

                <div class="form-group col-md-4 controlAutos" id="controlProduct">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="idProduct" onchange="loadTariff()" name="PRODUCT"
                            aria-label="State">



                        </select>
                        <label for="floatingSelect">Produit</label>
                    </div>
                </div>
                <div class="form-group col-md-4" style="display: none;">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="idTariff" onchange="loadDuration()" name="TARIFF"
                            aria-label="State">



                        </select>
                        <label for="floatingSelect">Tariff</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php include "./users/client/sim-credit-perso.php" ?>
                <?php include "./users/client/sim-credit-auto.php" ?>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript" src="./javascript/ajax-script.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script>


    window.addEventListener("load", function () {
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

    function displayElement(elt) {
        icone = elt + "-bi";
        if ($(elt).hasClass("active")) {
            $(elt).hide();
            $(elt).removeClass('active');
            $(icone).removeClass('bi-dash');
            $(icone).addClass('bi-plus');

        } else {
            $(elt).show();
            $(elt).addClass('active');
            $(icone).addClass('bi-dash');
            $(icone).removeClass('bi-plus');
        }
    }


</script>