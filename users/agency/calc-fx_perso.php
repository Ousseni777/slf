<?php
include '../../connectToDB.php';

if (isset($_POST['ID_SCRIPT'])) {
    $rate = 5;
    $brand = $_POST['ID_BRAND'];
    $product = $_POST['ID_PRODUCT'];
    $tariff = $_POST['ID_TARIFF'];
    $principal = $_POST['ID_AMOUNT'];
    list($tariff_id, $rate, $TXFD, $ADI, $Diff) = fetchData($brand, $product, $tariff);

    // $VR = (float) pow($principal * 0.01 * (1 + $rate), -$duration);
    $differ = (float) pow((1 + ($rate / 100)), $Diff);
    $PHT = $principal;
    $DG = 0;
    $FraisDoss = $PHT * $TXFD / 100;
    $Avance = $principal * $DG / 100;
    $Apport_Total = $Avance + $FraisDoss;
    $Apport_Total = number_format($Apport_Total, 2, ".", "");
    $FraisDoss = number_format($FraisDoss, 2, ".", "");

    switch ($_POST['ID_SCRIPT']) {
        case "slider-monthly":
            $duration = $_POST['ID_DURATION'];
            

            $R_Value = (float) pow($principal * 0.01 * (1 + $rate), -$duration);
            $payment = calc_payment($principal, $duration, $rate, $R_Value, 2);
  
            break;
        case "slider-duration":      
            $payment = $_POST['ID_MONTHLY'];  
            $duration = calc_number($principal, $rate, $payment);           
     
            break;

        default:
            break;
    }

    

    $results = [
        "monthly_no_format" => $payment,
        "amount" => number_format($principal, 2, ",", " "),
        "monthly" => number_format($payment, 2, ",", " "),
        "duration" => $duration,
        "apport_perc" => 0,
        "apport_total" => $Apport_Total,
        "assurance" => $ADI,
        "frais_dossier" => $FraisDoss,
        "cout" => 0
    ];

    echo json_encode($results);

}


// function calculateMonthlyPayment($principal, $InterestRate, $loanTermInMonths)
// {

//     $monthlyInterestRate = $InterestRate / 100;


//     $payment = ($principal * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$loanTermInMonths));

//     return $payment;
// }

function calc_payment($pv, $payno, $int, $RV, $accuracy)
{

    // check that required values have been supplied

    if (empty($pv)) {

        echo "<p class='error'>a value for PRINCIPAL is required</p>";

        exit;

    } // if

    if (empty($payno)) {

        echo "<p class='error'>a value for NUMBER of PAYMENTS is required</p>";

        exit;

    } // if

    if (empty($int)) {

        echo "<p class='error'>a value for INTEREST RATE is required</p>";

        exit;

    } // if

    if (($RV < 0)) {

        echo "<p class='error'>RV must be > 0 </p>";

        exit;

    }

    // now do the calculation using this formula:



    //******************************************

    //            INT * ((1 + INT) ** PAYNO)

    // PMT = PV * --------------------------

    //             ((1 + INT) ** PAYNO) - 1

    //******************************************

    $RV = $RV / pow((1 + ($int / 100)), $payno);

    $int = $int / 100;    // convert to a percentage

    $value1 = $int * pow((1 + $int), $payno);

    $value2 = pow((1 + $int), $payno) - 1;

    $pmt = ($pv - $RV) * ($value1 / $value2);

    // $accuracy specifies the number of decimal places required in the result

    $pmt = number_format($pmt, $accuracy, ".", "");

    return $pmt;
}

// function calculateDuration($montantPret, $mensualite, $tauxInteret)
// {
//     $tauxInteretMensuel = $tauxInteret / 100;
//     $numerator = log($mensualite / ($mensualite - $tauxInteretMensuel * $montantPret));
//     $denominator = log(1 + $tauxInteretMensuel);
//     $duree = $numerator / $denominator;

//     return round($duree);
// }

function calc_number($pv, $int, $pmt)
{

    //******************************************

    //         log(1 - INT * PV/PMT)

    // PAYNO = ---------------------

    //             log(1 + INT)

    //******************************************

    $int = $int / 100;

    $value1 = log(1 - $int * ($pv / $pmt));

    $value2 = log(1 + $int);

    $payno = $value1 / $value2;

    $payno = abs(round($payno));

    $payno = number_format($payno, 0, ".", "");

    return $payno;
} // calc_number =====================================================================

function fetchData($brand, $product, $tariff)
{
    global $conn;
    $query = "SELECT * FROM SLF_TARIFICATION WHERE MARQUE = '$brand' AND PRODUIT = '$product' AND BAREME = '$tariff' ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        
        $rate = $data['TAUX'];
        $tariff_id = $data['TARIFF_ID'];
        $data_dg = $data['TXFD'];
        $data_ADI = $data['ADI'];
        $data_Diff = $data['Dif'];
    }

    return [$tariff_id, $rate, $data_dg, $data_ADI, $data_Diff];

}
?>