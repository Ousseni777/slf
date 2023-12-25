<?php
ob_start();
session_start();
include './connectToDB.php';
$num_doss = $_GET["id"];

$query_credit = "SELECT * FROM `majestic` WHERE NUMDOSS = '{$num_doss}'";
$result_credit = $conn->query($query_credit);
// $_SESSION['page'] = "detail-doss?id=".$num_doss;

if ($result_credit->num_rows > 0) {
    $dossier = $result_credit->fetch_assoc();
}
$DateEch1=$dossier['DATEECH1'];
$balance =  $dossier['PRIXTTC'];
$rate = $dossier['TAUXINT'] / 100;
$payment= $dossier['MENSUALITE'];
$number=$dossier['DUREE'];

// $DateEch1 ="2023-12-02";
// $balance = 20000;
// $rate= 5;
// $payment = 300;
// $number = 48;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./assets/css/style-form.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Amortissement</title>

</head>

<body>
    <?php
    include 'header.php';

    include 'siderbar.php';
    ?>
    <main class="main" id="main">
        <div class="container mt-4">
            <div class="row">
            <div class="col-lg-10">
            <h2>Tableau d'amortissement</h2>
            </div>
            <div class="col-lg-2">
                <button class="col-lg-12 btn btn-outline-success">
                    <i class="bi bi-download"></i>
                    Sauver
                </button>
            </div>
            </div>
            <table class="table table-striped table-bordered">
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
    <!-- Chargement des scripts Bootstrap et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>

        window.addEventListener("load", function () {
            // loadRegions();
            displayPreloader();
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