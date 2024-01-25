<?php
ob_start();
session_start();
include './connectToDB.php';
$num_doss = '790551';

$query_credit = "SELECT * FROM `majestic` WHERE NUMDOSS = '{$num_doss}'";
$result_credit = $conn->query($query_credit);
// $_SESSION['page'] = "detail-doss?id=".$num_doss;

if ($result_credit->num_rows > 0) {
    $dossier = $result_credit->fetch_assoc();
}
$DateEch1 = $dossier['DATEECH1'];
$balance = $dossier['PRIXTTC'];
$rate = $dossier['TAUXINT'] / 100;
$payment = $dossier['MENSUALITE'];
$number = $dossier['DUREE'];

// $DateEch1 ="2023-12-02";
// $balance = 20000;
// $rate= 5;
// $payment = 300;
// $number = 48;
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

    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./assets/css/style-form.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Amortissement</title>

    <style>
        ::-webkit-scrollbar {
            width: 2px;            
        }

        ::-webkit-scrollbar-thumb {
            background-color: purple;            
            /* border-radius: 6px; */
            
        }

        #table-id tbody {
            max-height: 440px;
            overflow-y: auto;
            display: block;
        }

        #table-id thead,
        #table-id tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .card-body .form-hide {
            display: none;
        }

        .success-text {
            display: none;
        }

        #mainPreloader {
            margin-left: 55%;
            margin-top: 25%;

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

        /* .card-body .form-floating {
                display: none;
            } */

        .card-body:hover {
            background-color: #f6f9ff;
        }

        .right {
            float: right;
            margin-right: 3%;
            font-size: 35px;
        }

        .status {
            text-align: center;
            color: green;
            border-radius: 5px;
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

        #main {
            /* opacity: 0; */
            transition: opacity .8s ease .3s;
        }

        #main.show {
            /* opacity: 1; */
        }
    </style>
</head>

<body>
    <?php
    include 'header.php';

    include 'siderbar.php';
    ?>
    <main class="main" id="main">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Tableau d'amortissement</h2>
                </div>
                <div class="col-lg-3">
                    <button id="save-excel-btn" class="col-lg-12 btn btn-outline-secondary">
                        <i class="bi bi-file-excel"></i>
                        Export en Excel
                    </button>
                </div>
                <div class="col-lg-3">
                    <button id="save-pdf-btn" class="col-lg-12 btn btn-outline-secondary">
                        <i class="bi bi-file-pdf"></i>
                        Télécharger en PDF
                    </button>
                </div>
            </div>
            <table id="table-id" class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">DUREE</th>
                        <th scope="col">DATE</th>
                        <th scope="col">PAYMENT</th>
                        <th scope="col">INTEREST</th>
                        <th scope="col">PRINCIPAL</th>
                        <th scope="col">BALANCE</th>
                        <th scope="col">FISCAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $count = 0;

                    $date = new DateTime($DateEch1);

                    // calculate Fisc Loan Amortization
                    
                    $Fisc = $balance / $number;

                    do {

                        $count++;

                        // return Date
                        $date->add(new DateInterval('P1M')); // P1D means a period of 1 day
                    
                        $Date2 = $date->format('Y-m-d');
                        // calculate interest on outstanding balance
                    
                        $interest = $balance * $rate / 100;

                        // what portion of payment applies to principal?
                    
                        $principal = $payment - $interest;

                        // watch out for balance < payment
                    
                        if ($balance < $payment) {

                            $principal = $balance;

                            $payment = $interest + $principal;

                        } // if
                    


                        // reduce balance by principal paid
                    
                        $balance = $balance - $principal;

                        // watch for rounding error that leaves a tiny balance
                    
                        if ($balance < 0) {

                            $principal = $principal + $balance;

                            $interest = $interest - $balance;

                            $balance = 0;

                        } // if
                    
                        echo "<tr>";

                        echo "<td>$count</td>";

                        echo "<td>$Date2</td>";

                        echo "<td>" . number_format($payment, 2, ".", " ") . "</td>";

                        echo "<td>" . number_format($interest, 2, ".", " ") . "</td>";

                        echo "<td>" . number_format($principal, 2, ".", " ") . "</td>";

                        echo "<td>" . number_format($balance, 2, ".", " ") . "</td>";

                        echo "<td>" . number_format($Fisc, 2, ".", " ") . "</td>";

                        echo "</tr>";

                        @$totPayment = $totPayment + $payment;

                        @$totInterest = $totInterest + $interest;

                        @$totPrincipal = $totPrincipal + $principal;

                        if ($payment < $interest) {

                            echo "</table>";

                            echo "<p>Payment < Interest amount - rate is too high, or payment is too low</p>";

                            exit;

                        } // if
                    


                    } while ($balance > 0);
                    ?>

                    <!-- Ajoutez d'autres lignes selon vos besoins -->
                </tbody>
            </table>
        </div>
    </main>

    <div class="main spinner-grow text-danger" id="mainPreloader" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <?php include 'users/agency/new-client.php'; ?>
    <!-- Chargement des scripts Bootstrap et jQuery -->


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> -->
    <script src="jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.full.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js"></script>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>

    <script type="text/javascript" src="ax_script_auto.js"></script>
    <script type="text/javascript" src="assets/js/main-form.js"></script>

    <script>

        window.addEventListener("load", function () {
            displayPreloader();
        });

        $(document).ready(function () {
            $('#save-pdf-btn').click(function () {
                var pdf = new jsPDF();
                pdf.autoTable({ html: '#table-id' });
                let pdfName = "tableau_amortissement_" + <?php echo $num_doss ?> + ".pdf";
                pdf.save(pdfName);
            });

            $('#save-excel-btn').click(function () {
                let excelName = "tableau_amortissement_" + <?php echo $num_doss ?>;
                exportToExcel('table-id', excelName);
            });

            function exportToExcel(tableId, filename) {
                var table = document.getElementById(tableId);
                var ws = XLSX.utils.table_to_sheet(table);
                var wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
                XLSX.writeFile(wb, filename + '.xlsx');
            }
        });

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
    </script>

</body>

</html>