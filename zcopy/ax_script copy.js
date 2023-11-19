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

function loadDuration() {
    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: {ID_SCRIPT: 'duration'},
        success: function (data) {
            $("#idDuration").html(data);
            // loadApport();
        }
    });
}

function loadApport() {
    $.ajax({
        url: "data_retriever.php",
        method: "POST",
        data: {
            ID_SCRIPT: 'apport'
        },
        success: function (data) {
            $("#idApport").html(data);
            // calcFunction();
        }
    });
}

function calcFunction() {
    const AmountID = $("#rangeInputTTC").val();
    const DurationID = $("#idDuration").val();
    const ApportID = $("#idApport").val();

    $.ajax({
        url: "calc.php",
        method: "POST",
        data: {
            ID_AMOUNT: AmountID,
            ID_DURATION: DurationID,
            ID_APPORT: ApportID
        },
        success: function (data) {
            // var result = JSON.parse(data);
            // $("#infoAmount").text(result.TTC);
            // console.log(data);
            // $("#rangeValueMonthly").val(result.payment);
            // $("#rangeInputMonthly").val(result.paymentNoFormat);
            // $("#infoMonthly").text(result.payment);
            // $("#infoApport").html(result.Apport_Total);
            // $("#infoADI").html(result.Assurance);
            // $("#infoFD").html(result.FraisDossier);
            // $("#infoCHAD").html(result.Cout);
            // updateInfo();
        }
    });
}

function updateInfo() {
    document.getElementById("rangeInputAmount").value = $("#rangeValueAmount").val();

    document.getElementById("infoDuration").textContent = $("#rangeInputDuration").val();

    document.getElementById('rangeInputApport').value = $("input[name='apportName']:checked").val();

}



