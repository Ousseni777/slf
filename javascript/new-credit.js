window.addEventListener("load", function () {            
    $('#spinnerRecap').hide();
    controller();
    calcFunctionPerso();
    
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
    val_max[i].style.left = 96 + '%';
    val_min[i].style.left = 4 + '%';
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
    document.getElementById('imgFluid').style.display = "none";


    document.getElementById('cardAuto').style.display = "none";
    $('#spinnerBtnAuto').show();
    $('#spinnerRecap').show();


    setTimeout(function () {
        $('#spinnerBtnAuto').hide();
        // scrollToTop();
    }, 200);

    setTimeout(function () {

        $('#spinnerRecap').hide();
        $('#cardAuto').show();
    }, 400);
}
function displayPerso() {

    document.getElementById('cardAuto').style.display = "none";
    document.getElementById('cardPerso').style.display = "none";
    document.getElementById('imgFluid').style.display = "none";
    $('#spinnerBtnPerso').show();
    $('#spinnerRecap').show();

    setTimeout(function () {
        $('#spinnerBtnPerso').hide();
        // scrollToTop();
    }, 200);

    setTimeout(function () {

        $('#spinnerRecap').hide();
        $('#cardPerso').show();
    }, 400);

}
function hideCard() {
    document.getElementById('cardAuto').style.display = "none";
    document.getElementById('cardPerso').style.display = "none";
    document.getElementById('imgFluid').style.display = "block";
}

function scrollToTop() {
    window.scrollTo({
        top: 500,
        behavior: 'smooth'
    });
}



