function loadBrand() {

    $.ajax({
        url: "data_retriever.php",
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
        url: "data_retriever.php",
        method: "POST",
        data: { ID_SCRIPT: 'product', ID_MARQUE: BrandID.val() },
        success: function (data) {
            $("#idProduct").html(data);
            loadDuration();
        }
    });

}

function loadDuration() {

    BrandID = $("#idBrand");
    ProductID = $("#idProduct");

    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: { ID_SCRIPT: 'duration', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val() },
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
    const Duration = $("input[name='durationName']:checked").val();    
    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: { ID_SCRIPT: 'apport', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val(), ID_DURATION: Duration },
        success: (data) => {
            $("#controlApport").html(data);
            calcFunction();
        },
        error: (error) => {
            console.error("Une erreur s'est produite :", error);
        }
    });
}

function constructor() {
    ProjetctID = $("#idProject");
    BrandID = $("#idBrand");
    ProductID = $("#idProduct");
    DurationID = $("#controlDuration");
    ApportID = $("#controlApport");
    AmountID = $("#rangeInputTTC");

    brandControl = document.getElementById('controlBrand');
    productControl = document.getElementById('controlProduct');

    RangeInputD = document.getElementById("rangeInputDuration");
    RangeInputA = document.getElementById("rangeInputApport");
    RangeInputM = document.getElementById("rangeInputMonthly");

    DisplayD = document.getElementById("valueDisplayDuration");
    DisplayA = document.getElementById("valueDisplayApport");
    DisplayM = document.getElementById("valueDisplayMonthly");

    selectMonthly = document.getElementById('idMonthly');
    selectApport = document.getElementById('controlApport');
}


function calcFunction() {
    
    BrandID = $("#idBrand");
    ProductID = $("#idProduct");
    AmountID = $("#rangeInputAmount");

    const DurationValue = $("input[name='durationName']:checked").val();
    const ApportValue = $("input[name='durationName']:checked").val();

    $.ajax({
        url: "calc-fx.php",
        method: "POST",
        data: {
            ID_AMOUNT: AmountID.val(),
            ID_DURATION: DurationValue,
            ID_APPORT: ApportValue,
            ID_PRODUCT: ProductID.val(),
            ID_BRAND: BrandID.val()
        },
        success: (data) => {
            var result = JSON.parse(data);
            // console.log(result.paymentNoFormat);
            // $("#infoAmount").text(result.TTC);
            // $("#rangeValueMonthly").val(result.payment);
            $("#rangeInputMonthly").val(result.paymentNoFormat);
            $("#rangeValueMonthly").val(result.payment);
            // $("#infoMonthly").text(result.payment);
            // $("#infoApport").html(result.Apport_Total);
            // $("#infoADI").html(result.Assurance);
            // $("#infoFD").html(result.FraisDossier);
            // $("#infoCHAD").html(result.Cout);
        }
    });
}
function calcFunctionM() {

    $.ajax({
        url: "calc-fx.php",
        method: "POST",
        data: {
            ID_AMOUNT: AmountID.val(),
            ID_DURATION: DurationID.val(),
            ID_APPORT: ApportID.val()
        },
        success: (data) => {

            var result = JSON.parse(data);

            selectMonthly.textContent = '';
            let ind = 0;
            result.monthly.forEach(element => {
                var nouvelleOption = document.createElement('option');
                nouvelleOption.value = element;
                nouvelleOption.text = element;
                if (ind == (Math.round(result.monthly.length / 2))) {
                    nouvelleOption.selected = true;
                    let chiffreSansEspace = element.replace(/\s/g, '');
                }
                ind++;

                selectMonthly.appendChild(nouvelleOption);
            });

            let first = 0;
            let count = 0;
            selectApport.textContent = '';
            result.apport.forEach(element => {
                var nouvelleOption = document.createElement('option');
                nouvelleOption.value = element;
                nouvelleOption.text = element;
                nouvelleOption.setAttribute("data-custom", count)
                // nouvelleOption.count = count;
                count++;
                if (first == (Math.round(result.apport.length / 2))) {
                    nouvelleOption.selected = true;
                }
                first++;

                selectApport.appendChild(nouvelleOption);
            });
            updateInfoDuration();



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
