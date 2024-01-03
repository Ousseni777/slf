<?php
include '../../connectToDB.php';

$interestRate = 5; // Taux d'intérêt MENSUEL en pourcentage

switch ($_POST['ID_SCRIPT']) {
    case "monthly":
        $loanTerm = $_POST['ID_DURATION'];
        $loanAmount = $_POST['ID_AMOUNT'];
        $R_Value =  (float) pow($loanAmount * 0.01 * (1 + $interestRate), -$loanTerm);
        $monthlyPayment = calc_payment($loanAmount, $loanTerm, $interestRate, $R_Value, 2);
        $results = [
            "monthlyNOFormat" => $monthlyPayment,
            "monthly" => number_format($monthlyPayment, 2),
            "duration" => $loanTerm
        ];
        echo json_encode($results);
        break;
    case "duration":
        $loanAmount = $_POST['ID_AMOUNT'];
        $loanMonthly = $_POST['ID_MONTHLY'];
        $interestRate = 5; // Taux d'intérêt MENSUEL en pourcentage
        $duration = calc_number($loanAmount, $interestRate,$loanMonthly);
        $results = [
            "duration" => $duration,
            "monthly" => $loanMonthly
        ];
        echo json_encode($results);
        break;

    default:
        break;
}


// function calculateMonthlyPayment($principal, $InterestRate, $loanTermInMonths)
// {

//     $monthlyInterestRate = $InterestRate / 100;

    
//     $monthlyPayment = ($principal * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$loanTermInMonths));

//     return $monthlyPayment;
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

    // $payno = number_format($payno, 0, ".", "");

    return $payno;
} // calc_number =====================================================================


?>