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
<!-- <script type="text/javascript" src="./javascript/ajax-script.js"></script> -->
<script type="text/javascript" src="jquery.min.js"></script>
<script>




    window.addEventListener("load", function () {
        controller();
    });

    function loadBrand() {

        $.ajax({
            url: "./users/client/retriever_auto.php",
            method: "POST",
            data: { ID_SCRIPT: 'brand' },
            success: function (data) {
                $("#idBrand").html(data);
                loadProduct();
            },
            error: (error) => {
                console.error("Une erreur s'est produite :", error);
            }
        });
    }

    function loadProduct() {
        BrandID = $("#idBrand");
        $.ajax({
            url: "./users/client/retriever_auto.php",
            method: "POST",
            data: { ID_SCRIPT: 'product', ID_MARQUE: BrandID.val() },
            success: function (data) {
                $("#idProduct").html(data);
                loadTariff();
            },
            error: (error) => {
                console.error("Une erreur s'est produite :", error);
            }
        });

    }

    function loadTariff() {
        BrandID = $("#idBrand");
        ProductID = $("#idProduct");
        $.ajax({
            url: "./users/client/retriever_auto.php",
            method: "POST",
            data: { ID_SCRIPT: 'tariff', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val() },
            success: function (data) {
                $("#idTariff").html(data);
                loadDuration();
            },
            error: (error) => {
                console.error("Une erreur s'est produite :", error);
            }
        });

    }

    function loadDuration() {

        BrandID = $("#idBrand");
        ProductID = $("#idProduct");
        TariffID = $("#idTariff");

        $.ajax({
            url: "./users/client/retriever_auto.php",
            method: "POST",
            data: { ID_SCRIPT: 'duration', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val(), ID_TARIFF: TariffID.val() },
            success: (data) => {
                $("#controlDuration").html(data);
                loadApport();
            },
            error: (error) => {
                console.error("Une erreur s'est produite :", error);
            }
        });
    }

    function loadApport() {
        BrandID = $("#idBrand");
        ProductID = $("#idProduct");
        TariffID = $("#idTariff");
        const Duration = $("input[name='durationName']:checked").val();
        $.ajax({
            url: "./users/client/retriever_auto.php",
            method: "POST",
            data: { ID_SCRIPT: 'apport', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val(), ID_TARIFF: TariffID.val(), ID_DURATION: Duration },
            success: (data) => {
                $("#controlApport").html(data);
                calcFunctionAuto();
            },
            error: (error) => {
                console.error("Une erreur s'est produite :", error);
            }
        });
    }

    function calcFunctionAuto() {

        BrandID = $("#idBrand");
        ProductID = $("#idProduct");
        TariffID = $("#idTariff");
        AmountID = $("#rangeInputAmount");

        ProfessionID = $("#idProfession").val();

        const DurationValue = $("input[name='durationName']:checked").val();
        const ApportValue = $("input[name='apportName']:checked").val();


        $.ajax({
            url: "./users/client/calc-fx_auto.php",
            method: "POST",
            data: {
                ID_AMOUNT: AmountID.val(),
                ID_DURATION: DurationValue,
                ID_APPORT: ApportValue,
                ID_TARIFF: TariffID.val(),
                ID_PRODUCT: ProductID.val(),
                ID_BRAND: BrandID.val(),
                ID_PROFESSION: ProfessionID
            },
            success: (data) => {
                var result = JSON.parse(data);
                // console.log(result.tariff_id);
                $("#infoAmount").val(result.TTC);
                $("#rangeValueAmount").val(AmountID.val());
                $("#rangeInputDuration").val(DurationValue);
                $("#rangeInputApport").val(ApportValue);
                // $("#rangeValueMonthly").val(result.payment);
                $("#infoDuration").val(DurationValue);
                $("#infoTariffID").val(result.tariff_id);
                $("#rangeInputMonthly").val(result.paymentNoFormat);
                $("#rangeValueMonthly").val(result.payment);
                $("#infoMonthly").val(result.payment);
                $("#infoApport").val(result.Apport_Total);
                $("#infoApportPerc").val(ApportValue);
                $("#infoADI").val(result.Assurance);
                $("#infoFD").val(result.FraisDossier);
                $("#infoCHAD").val(result.Cout);
            }
        });
    }

    function calcFunctionPerso(script = "monthly") {

        AmountID = $("#rangeInputTTC").val();
        ProfessionID = $("#idProfession").val();
        DurationValue = $("#rangeInputDurationPerso").val();
        Monthly = $("#rangeInputMonthlyPerso").val();
        var rangeInputMonthly = document.getElementById('rangeInputMonthlyPerso');
        var valueDisplayMonthly = document.getElementById('valueDisplayMonthly');

        var rangeInputDuration = document.getElementById('rangeInputDurationPerso');
        var valueDisplayDuration = document.getElementById('valueDisplayDuration');

        $.ajax({
            url: "./users/client/calc-fx_perso.php",
            method: "POST",
            data: {
                ID_SCRIPT: script,
                ID_AMOUNT: AmountID,
                ID_DURATION: DurationValue,
                ID_MONTHLY: Monthly,
                ID_PROFESSION: ProfessionID

            },
            success: (data) => {
                var result = JSON.parse(data);
                if (script === "monthly") {
                    rangeInputMonthly.value = result.monthlyNOFormat;
                    valueDisplayMonthly.textContent = result.monthly;

                    var percent = (rangeInputMonthly.value - rangeInputMonthly.min) / (rangeInputMonthly.max - rangeInputMonthly.min) * 100;
                    valueDisplayMonthly.style.left = percent + '%';
                } else {
                    rangeInputDuration.value = result.duration;
                    valueDisplayDuration.textContent = result.duration;

                    var percent = (rangeInputDuration.value - rangeInputDuration.min) / (rangeInputDuration.max - rangeInputDuration.min) * 100;
                    valueDisplayDuration.style.left = percent + '%';
                }
                $("#infoProjectP").val($("#idProject").val());
                $("#infoAmountP").val(AmountID);
                $("#infoDurationP").val(result.duration);
                $("#infoMonthlyP").val(result.monthly);
                $("#infoFDP").val(percent);
            }
        });
    }

    function updateInfoDuration() {
        DisplayD.textContent = DurationID.val();
        RangeInputD.value = DurationID.val();
        var percent = (RangeInputD.value - RangeInputD.min) / (RangeInputD.max - RangeInputD.min) * 100;
        DisplayD.style.left = percent + '%';

        updateInfoApport();

    }
    function updateInfoApport() {
        RangeInputA.value = ApportID.val();
        DisplayA.textContent = RangeInputA.value;
        // console.log(selectApport.selectedIndex);
        var percent = (RangeInputA.value - RangeInputA.min) / (RangeInputA.max - RangeInputA.min) * 100;
        DisplayA.style.left = percent + '%';

        updateInfoMonthly(selectApport.selectedIndex, 0);

    }
    function updateInfoMonthly(indice = "default", ind = "default") {
        if (indice !== "default") {
            selectMonthly.selectedIndex = indice;
        }
        RangeInputM.value = parseFloat(selectMonthly.value.replace(/\s/g, ''));
        DisplayM.textContent = RangeInputM.value;

        var percent = (RangeInputM.value - RangeInputM.min) / (RangeInputM.max - RangeInputM.min) * 100;
        DisplayM.style.left = percent + '%';

        if (ind === "default") {
            selectApport.selectedIndex = selectMonthly.selectedIndex;
            RangeInputA.value = selectApport.value;
            DisplayA.textContent = RangeInputA.value;
            // console.log(selectApport.selectedIndex);
            var percent = (RangeInputA.value - RangeInputA.min) / (RangeInputA.max - RangeInputA.min) * 100;
            DisplayA.style.left = percent + '%';
        }
    }
    function loadData() {
        if (ProductID.val() !== 0) {
            loadDuration();
        }
    }


    function loadRegions() {
        $.ajax({
            url: "region_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'region' },
            success: function (data) {
                $("#yourRegion").html(data);
                const RegionID = $("#yourRegion").val();
                $.ajax({
                    url: "region_retriever.php",
                    method: "POST",
                    data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
                    success: function (data) {
                        $("#yourTown").html(data);
                    }
                });
            }
        });
    }


    function loadTowns() {
        const RegionID = $("#yourRegion").val();
        $.ajax({
            url: "region_retriever.php",
            method: "POST",
            data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
            success: function (data) {
                $("#yourTown").html(data);
            }
        });
    }



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