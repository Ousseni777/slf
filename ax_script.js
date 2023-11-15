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

function loadVendeurs() {
    $.ajax({
        url: "region_retriever.php",
        method: "POST",
        data: {ID_SCRIPT: 'vendeur'},
        success: function (data) {
            $("#brand").html(data);
        }
    });
}

function loadBrand() {
    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: {ID_SCRIPT: 'brand'},
        success: function (data) {
            $("#brand").html(data);
            loadProduct();
        }
    });
}

function loadProduct() {
    const BrandID = $("#brand").val();
    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: {ID_SCRIPT: 'product', ID_MARQUE: BrandID},
        success: function (data) {
            $("#product").html(data);
            loadTariff();
        }
    });
}

function loadTariff() {
    const BrandID = $("#brand").val();
    const ProductID = $("#product").val();
    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: {ID_SCRIPT: 'tariff', ID_PRODUCT: ProductID, ID_BRAND: BrandID},
        success: function (data) {
            $("#tariff").html(data);
            loadDuration();
        }
    });
}

function loadDuration() {
    const BrandID = $("#brand").val();
    const ProductID = $("#product").val();
    // const TariffID = $("#tariff").val();
    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: {ID_SCRIPT: 'duration', ID_PRODUCT: ProductID, ID_BRAND: BrandID},
        success: function (data) {
            $("#idRadios").html(data);
            loadApport();
        }
    });
}

function loadApport() {
    const BrandID = $("#brand").val();
    const ProductID = $("#product").val();
    // const TariffID = $("#tariff").val();
    const DurationID = $("input[name='radioBtn']:checked").val();
    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: {
            ID_SCRIPT: 'apport',
            ID_PRODUCT: ProductID,
            ID_BRAND: BrandID,
            ID_TARIFF: TariffID,
            ID_DURATION: DurationID
        },
        success: function (data) {
            $("#apport").html(data);
            calcFunction();
        }
    });
}

function calcFunction() {
    const AmountID = $("#rangeValueAmount").val();
    const DurationID = $("input[name='radioBtn']:checked").val();
    const ApportID = $("input[name='apportName']:checked").val();
    document.getElementById('rangeInputDuration').value = DurationID;
    const BrandID = $("#brand").val();
    const ProductID = $("#product").val();
    const TariffID = $("#tariff").val();

    $.ajax({
        url: "calc.php",
        method: "POST",
        data: {
            ID_PRODUCT: ProductID,
            ID_BRAND: BrandID,
            ID_TARIFF: TariffID,
            ID_AMOUNT: AmountID,
            ID_DURATION: DurationID,
            ID_APPORT: ApportID
        },
        success: function (data) {
            var result = JSON.parse(data);
            $("#infoAmount").text(result.TTC);
            $("#rangeValueMonthly").val(result.payment);
            $("#rangeInputMonthly").val(result.paymentNoFormat);
            $("#infoMonthly").text(result.payment);
            $("#infoApport").html(result.Apport_Total);
            $("#infoADI").html(result.Assurance);
            $("#infoFD").html(result.FraisDossier);
            $("#infoCHAD").html(result.Cout);
            updateInfo();
        }
    });
}

function updateInfo() {
    document.getElementById("rangeInputAmount").value = $("#rangeValueAmount").val();

    document.getElementById("infoDuration").textContent = $("#rangeInputDuration").val();

    document.getElementById('rangeInputApport').value = $("input[name='apportName']:checked").val();

}



