<?php
include '../../connectToDB.php';

$interestRate = 5; // Taux d'intérêt MENSUEL en pourcentage

switch ($_POST['ID_SCRIPT']) {
    case "monthly":
        $loanTerm = $_POST['ID_DURATION'];
        $loanAmount = $_POST['ID_AMOUNT'];
        $monthlyPayment = calculateMonthlyPayment($loanAmount, $interestRate, $loanTerm);
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


function calculateMonthlyPayment($principal, $InterestRate, $loanTermInMonths)
{

    $monthlyInterestRate = $InterestRate / 100;

    // Calculer la mensualité en utilisant la formule du prêt amortissable
    $monthlyPayment = ($principal * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$loanTermInMonths));

    return $monthlyPayment;
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