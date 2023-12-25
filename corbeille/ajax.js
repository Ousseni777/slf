function loadBrand() {

    $.ajax({
        url: "./retriever/retriever_auto.php",
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
        url: "./retriever/retriever_auto.php",
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
        url: "./retriever/retriever_auto.php",
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
        url: "./retriever/retriever_auto.php",
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
        url: "./retriever/retriever_auto.php",
        method: "POST",
        data: { ID_SCRIPT: 'apport', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val(), ID_TARIFF: TariffID.val() , ID_DURATION: Duration },
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

    const DurationValue = $("input[name='durationName']:checked").val();
    const ApportValue = $("input[name='apportName']:checked").val();

    $.ajax({
        url: "./retriever/calc-fx_auto.php",
        method: "POST",
        data: {
            ID_AMOUNT: AmountID.val(),
            ID_DURATION: DurationValue,
            ID_APPORT: ApportValue,
            ID_TARIFF: TariffID.val(),
            ID_PRODUCT: ProductID.val(),
            ID_BRAND: BrandID.val()
        },
        success: (data) => {
            var result = JSON.parse(data);
            // console.log(result.tariff_id);
            $("#infoAmount").val(result.TTC);
            $("#rangeValueAmount").val(AmountID.val());
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
    DurationValue = $("#rangeInputDurationPerso").val();
    Monthly = $("#rangeInputMonthlyPerso").val();
    var rangeInputMonthly = document.getElementById('rangeInputMonthlyPerso');
    var valueDisplayMonthly = document.getElementById('valueDisplayMonthly');

    var rangeInputDuration = document.getElementById('rangeInputDurationPerso');
    var valueDisplayDuration = document.getElementById('valueDisplayDuration');

    $.ajax({
        url: "./retriever/calc-fx_perso.php",
        method: "POST",
        data: {
            ID_SCRIPT: script,
            ID_AMOUNT: AmountID,
            ID_DURATION: DurationValue,
            ID_MONTHLY: Monthly

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
        data: {ID_SCRIPT: 'region'},
        success: function (data) {
            $("#yourRegion").html(data);
            const RegionID = $("#yourRegion").val();
            $.ajax({
                url: "region_retriever.php",
                method: "POST",
                data: {ID_SCRIPT: 'town', ID_REGION: RegionID},
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
        data: {ID_SCRIPT: 'town', ID_REGION: RegionID},
        success: function (data) {
            $("#yourTown").html(data);
        }
    });
}