function loadBrand() {

    $.ajax({
        url: "users/seller/data_retriever.php",
        method: "POST",
        data: { ID_SCRIPT: 'brand' },
        success: function (data) {
            $("#idBrand").html(data);
            loadProduct();
        }
    });
}

function loadProduct() {
BrandID = $("#idBrand");
    $.ajax({
        url: "users/seller/data_retriever.php",
        method: "POST",
        data: { ID_SCRIPT: 'product', ID_MARQUE: BrandID.val() },
        success: function (data) {
            $("#idProduct").html(data);
            loadTariff();
        }
    });

}

function loadTariff() {
    const BrandID = $("#idBrand").val();
    const ProductID = $("#idProduct").val();
    $.ajax({
        url: "users/seller/data_retriever.php",
        method: "POST",
        data: {ID_SCRIPT: 'tariff', ID_PRODUCT: ProductID, ID_BRAND: BrandID},
        success: function (data) {
            $("#idTariff").html(data);
            loadDuration();
        }
    });
}

function loadDuration() {

    BrandID = $("#idBrand").val();
    ProductID = $("#idProduct").val();
    const TariffID = $("#idTariff").val();
    $.ajax({
        url: "users/seller/data_retriever.php",
        method: "POST",
        data: { ID_SCRIPT: 'duration', ID_PRODUCT: ProductID, ID_BRAND: BrandID,ID_TARIFF: TariffID },
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
    const TariffID = $("#idTariff").val();
    const Duration = $("input[name='durationName']:checked").val();    
    $.ajax({
        url: "users/seller/data_retriever.php",
        method: "POST",
        data: { ID_SCRIPT: 'apport', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val(),ID_TARIFF: TariffID, ID_DURATION: Duration },
        success: (data) => {
            $("#controlApport").html(data);
            calcFunction();
        },
        error: (error) => {
            console.error("Une erreur s'est produite :", error);
        }
    });
}


function calcFunction() {
    
    BrandID = $("#idBrand");
    ProductID = $("#idProduct");
    const TariffID = $("#idTariff").val();
    AmountID = $("#rangeInputAmount");


    const DurationValue = $("input[name='durationName']:checked").val();
    const ApportValue = $("input[name='apportName']:checked").val();

    $.ajax({
        url: "calc-fx.php",
        method: "POST",
        data: {
            ID_AMOUNT: AmountID.val(),
            ID_DURATION: DurationValue,
            ID_APPORT: ApportValue,
            ID_TARIFF: TariffID,
            ID_PRODUCT: ProductID.val(),
            ID_BRAND: BrandID.val()
        },
        success: (data) => {
            var result = JSON.parse(data);
            // console.log(result.paymentNoFormat);
            $("#infoAmount").val(result.TTC);
            $("#rangeValueAmount").val(AmountID.val());
            $("#infoDuration").val(DurationValue);            
            $("#rangeInputMonthly").val(result.paymentNoFormat);
            $("#rangeValueMonthly").val(result.payment);
            $("#infoMonthly").val(result.payment);
            $("#infoApportPerc").val(ApportValue);
            $("#infoApport").val(result.Apport_Total);
            $("#infoADI").val(result.Assurance);
            $("#infoFD").val(result.FraisDossier);
            $("#infoCHAD").val(result.Cout);
            $("#infoBrand").val(result.Marque);
            $("#infoProduct").val(result.Produit);
            $("#infoTariff").val(result.Bareme);
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
