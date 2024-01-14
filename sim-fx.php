<?php
ob_start();
session_start();
if (!isset($_SESSION['SELLER_ID_UK'])) {
    header('location: ./login');
}
include './connectToDB.php';
// $user = $_SESSION['SELLER_ID_UK'];
$SELLER_ID_UK = $_SESSION['SELLER_ID_UK'];
$SELLER_PRODUCT= $_SESSION['PRODUCT'];


$tagList = array("processed", "rejected", "fx", "list-cl", "list-cr", "track");
$tagListSearch = array("list-cl", "list-cr", "rejected", "processed");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>sim / Elements</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style-form.css" rel="stylesheet">
    <link href="assets/css/preloader.css" rel="stylesheet">


    <!-- <link href="styles/style.css" rel="stylesheet"> -->

    <style>
        ::-webkit-scrollbar {
            width: 2px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: purple;
            /* border-radius: 6px; */

        }

        .valide {
            text-align: center;
            width: 100%;
        }

        .valide i {

            /* color: greenyellow; */
            font-size: 100px;
        }

        .alert-success {
            text-align: center;
            padding: 5%;
            /* color: white; */
            background-color: rgba(1, 41, 112, .05);
            border: none;
            box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
        }

        .spinner-pieces {
            position: absolute;
            z-index: 1;
            left: 48%;
            top: 45%;
            display: none;
        }

        .edit-success {
            background-color: green;
            border-radius: 5px;
            /* display: none; */

        }

        .success-text {
            position: absolute;
            width: 80%;
            left: 10%;
            top: 40%;
            display: none;
            z-index: 1;
        }

        .error-text {
            color: #721c24;
            padding: 8px 10px;
            text-align: center;
            border-radius: 5px;
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            margin-bottom: 10px;
            display: none;
        }

        #mainPreloader {
            margin-left: 55%;
            margin-top: 25%;

        }

        @media (max-width: 1199px) {
            #mainPreloader {
                margin-left: 40%;
                margin-top: 85%;
                padding: 20px;
            }
        }

        .portfolio-wrap {
            transition: 0.3s;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }


        .portfolio-wrap::before {
            content: "";
            background: rgba(255, 255, 255, 0.5);
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            transition: all ease-in-out 0.3s;
            z-index: 2;
            opacity: 0;
        }

        .portfolio-wrap img {
            height: 80px;
        }

        .portfolio-wrap .portfolio-links {
            opacity: 1;
            left: 0;
            right: 0;
            bottom: -60px;
            z-index: 3;
            position: absolute;
            transition: all ease-in-out 0.3s;
            display: flex;
            justify-content: center;
        }

        .portfolio-wrap .portfolio-links a {
            color: #fff;
            font-size: 28px;
            text-align: center;
            background: rgba(20, 157, 221, 0.75);
            transition: 0.3s;
            width: 100%;
        }

        .portfolio-wrap .portfolio-links a:hover {
            background: rgba(20, 157, 221, 0.95);
        }

        .portfolio-wrap .portfolio-links a+a {
            border-left: 1px solid #37b3ed;
        }

        .portfolio-wrap:hover::before {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 1;
        }

        .portfolio-wrap:hover .portfolio-links {
            opacity: 1;
            bottom: 0;
        }

        .list-group-item .infoR {
            float: right;
            font-size: 14px;
            width: 40%;
            text-align: right;
            color: rgb(6, 161, 53);
            border: none;
        }

        .infoBareme {
            width: 50%;

        }

        /* .logo {

            width: 150px;
            height: 100px;
        } */

        .hr {
            width: 50%;
            margin-left: 25%;
        }

        .inputFlag {
            width: 100px;
            text-align: center;
            border-radius: 5px;
        }


        .form-check {
            margin: 2%;
            width: 30%;
        }

        .form-check label {
            width: 100%;

        }

        #controlProfession,
        #controlValueDuration,
        #controlValueApport {
            display: none;
        }

        .card-title {
            padding-bottom: 0;
        }

        .control-bi:hover {
            cursor: pointer;
        }

        .card-body .form-hide {
            display: none;
        }

        .infos-client:hover {
            cursor: pointer;
        }

        .card-body:hover {
            background-color: #f6f9ff;
        }


        .right {
            float: right;
            margin-right: 3%;
            font-size: 35px;
        }

        .border-left {
            border-left: 3px rgba(0, 0, 0, .05) solid;
            border-right: 3px rgba(0, 0, 0, .05) solid;

            border-radius: 5px;
        }

        .label {
            font-size: 12px;
            border: 1px palevioletred solid;
            padding: 2px;
            border-radius: 5px;
            /* background-color: gray; */
            margin: .5%;
            margin-top: 1.3%;
            font-weight: bold;
            color: palevioletred;
        }

        .left {
            margin-left: 5%;
            margin-right: 2%;
            width: 50px;
            height: 50px;
            border-radius: 50%;

        }

        .sort {

            text-align: right;

        }

        /* #main {
            opacity: 0;
            transition: opacity .8s ease .3s;
        }

        #main.show {
            opacity: 1;
        } */
    </style>

</head>

<body>
    <?php if (isset($_GET["tag"]) && in_array($_GET["tag"], $tagList)) {
        include 'header.php';
        include 'siderbar.php';
    } else {
        header('location: ./404');
    } ?>



    <?php if (isset($_GET["tag"]) && $_GET["tag"] == "fx") {
        $_SESSION['page'] = "sim-fx?tag=fx";
        include 'users/agency/fx.php';

    } else if (isset($_GET["tag"]) && $_GET["tag"] == "list-cr") {
        $_SESSION['page'] = "sim-fx?tag=list-cr";
        include 'users/agency/list-credit.php';

    } else if (isset($_GET["tag"]) && $_GET["tag"] == "list-cl") {
        $_SESSION['page'] = "sim-fx?tag=list-cl";
        include 'users/agency/list-client.php';
    } else if (isset($_GET["tag"]) && $_GET["tag"] == "track") {
        $_SESSION['page'] = "sim-fx?tag=track";
        include 'users/agency/track.php';
    } ?>

    <div class="main spinner-grow text-danger" id="mainPreloader" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    <?php include 'users/agency/new-client.php'; ?>




    <!-- <div id="preloader"></div> -->

    <script type="text/javascript" src="jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="assets/js/main-form.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <script>

        <?php if (in_array($_GET["tag"], $tagListSearch)) { ?>

            const searchInput = document.getElementById('searchInput');
            const table = document.getElementById('myTable');
            const rows = table.getElementsByTagName('tr');

            // Ajout d'un écouteur d'événement sur le champ de recherche
            searchInput.addEventListener('input', function () {
                const filter = searchInput.value.toLowerCase();

                // Parcourir toutes les lignes du tableau, sauf la première (en-tête)
                for (let i = 1; i < rows.length; i++) {
                    const row = rows[i];
                    const cells = row.getElementsByTagName('th');
                    let display = false;

                    // Parcourir toutes les cellules de la ligne
                    for (let j = 0; j < cells.length; j++) {
                        const cell = cells[j];
                        if (cell) {
                            const cellText = cell.textContent || cell.innerText;
                            if (cellText.toLowerCase().indexOf(filter) > -1) {

                                // Si une correspondance est trouvée, afficher la ligne
                                display = true;
                                break;
                            }
                        }
                    }

                    // Afficher ou masquer la ligne en fonction du filtre
                    row.style.display = display ? '' : 'none';
                }
            });

        <?php } ?>

        window.addEventListener("load", function () {

            <?php if (isset($_GET["tag"]) && $_GET["tag"] == "fx") {
                echo 'loadBrand(); loadRegions(); controlInput();';
            } ?>

            loadRegions();
            $('#mainPrloader').hide();
            $(".control").hide();
            displayPreloader();

        });


        function controlInput() {
            const rangeValueAmount = document.getElementById("rangeValueAmount");
            const rangeInputAmount = document.getElementById("rangeInputAmount");


            rangeInputAmount.addEventListener("input", function () {
                rangeValueAmount.value = rangeInputAmount.value;
                calcFunction();
            });

            rangeValueAmount.addEventListener("input", function () {
                rangeInputAmount.value = rangeValueAmount.value;
                calcFunction();
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
                $('.control-bi').removeClass('bi-dash');
                $('.control-bi').addClass('bi-plus');
                $('.control').hide();
                $('.control').removeClass('active');
                $(elt).show();
                $(elt).addClass('active');
                $(icone).addClass('bi-dash');
                $(icone).removeClass('bi-plus');
            }

        }

        function displayPreloader() {


            $('#main').hide();
            $('#mainPreloader').show();
            document.getElementById('main').classList.remove('show');


            setTimeout(function () {
                $('#mainPreloader').hide();

                $('#main').show();
                document.getElementById('main').classList.add('show');
            }, 800);


        }

        function loadBrand() {

            $.ajax({
                url: "users/agency/data_retriever.php",
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
                url: "users/agency/data_retriever.php",
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
                url: "users/agency/data_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'tariff', ID_PRODUCT: ProductID, ID_BRAND: BrandID },
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
                url: "users/agency/data_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'duration', ID_PRODUCT: ProductID, ID_BRAND: BrandID, ID_TARIFF: TariffID },
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
                url: "users/agency/data_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'apport', ID_PRODUCT: ProductID.val(), ID_BRAND: BrandID.val(), ID_TARIFF: TariffID, ID_DURATION: Duration },
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
                url: "users/agency/calc-fx.php",
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
                    
                    $("#rangeValueAmount").val(AmountID.val());
                    $("#rangeInputDuration").val(DurationValue);
                    $("#rangeInputApport").val(ApportValue);

                    $("#infoAmount").val(result.TTC);
                    $("#infoDuration").val(DurationValue);
                    $("#rangeInputMonthly").val(result.paymentNoFormat);
                    $("#rangeValueMonthly").val(result.payment);
                    $("#infoMonthly").val(result.payment);
                    $("#infoApportPerc").val(ApportValue);
                    $("#infoApport").val(result.Apport_Total);
                    $("#infoADI").val(result.Assurance);
                    $("#infoTariffID").val(result.tariff_id);
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

        function loadRegions() {
            $.ajax({
                url: "users/region_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'region' },
                success: function (data) {
                    $("#idRegion").html(data);

                    const RegionID = $("#idRegion").val();

                    $.ajax({
                        url: "users/region_retriever.php",
                        method: "POST",
                        data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
                        success: function (data) {
                            console.log(data);
                            $("#idTown").html(data);
                        }
                    });
                }
            });
        }

        function loadTowns() {
            const RegionID = $("#idRegion").val();
            $.ajax({
                url: "users/region_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'town', ID_REGION: RegionID },
                success: function (data) {
                    $("#idTown").html(data);
                }
            });
        }



    </script>



    <!-- Vendor JS Files -->
    <!-- <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script> -->

    <!-- <script type="text/javascript" src="./javascript/ajax-script.js"></script> -->
    <!-- <script type="text/javascript" src="assets/js/preloader.js"></script> -->

    <style>
        input[type="radio"] {
            width: 18px;
            height: 18px;

        }

        .group-select {
            padding: 2% 3%;
            border-radius: 10px;
            box-shadow: 0px 0px 1px 1px rgba(172, 132, 212, 0.2);
            width: 100%;
        }

        .custom-select {
            padding: 1% 5%;
            width: 60%;
            border: none;
            font-size: 25px;
            border-radius: 10px;
            background-color: rgba(1, 41, 112, 0.1);
            text-align: center;
            box-shadow: 0px 8px 20px rgba(1, 41, 112, 0.1);
        }
    </style>

</body>

</html>
<?php
ob_end_flush();
?>