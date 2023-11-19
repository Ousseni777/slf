<?php

include './connectToDB.php';

// if (isset($_POST['ID_BRAND'], $_POST['ID_PRODUCT'], $_POST['ID_TARIFF'], $_POST['ID_DURATION'], $_POST['ID_AMOUNT'], $_POST['ID_APPORT'])) {
if (isset($_POST['ID_DURATION'], $_POST['ID_AMOUNT'], $_POST['ID_APPORT'])) {
    // $brand = $_POST['ID_BRAND'];
    // $product = $_POST['ID_PRODUCT'];
    // $tariff = $_POST['ID_TARIFF'];
    $number = $_POST['ID_DURATION'];
    $principal = $_POST['ID_AMOUNT'];
    $DG = $_POST['ID_APPORT'];
    $TIMB = 25;
    // echo '<script>console.log("'.$number.'")</script>';
    $results = fetchData($number, $DG);
    echo '<script>console.log("'.$results.'")</script>';
    $errors = countErrors();
    if (empty($errors)) {
        if (count($results) > 0) {
            $elements= array();
            foreach ($results as $data) {
                ['PRODUIT' => $produit, 'TAUX' => $rate, 'TXFD' => $TXFD, 'ADI' => $ADI, 'Dif' => $Diff] = $data;
                // ($produit, $rate, $TXFD, $ADI, $Diff)=($data['PRODUIT'],$data['TAUX'],$data['TXFD'],$data['ADI'],$data['Dif']);            

                $VR = (float) pow($principal * 0.01 * (1 + $rate), -$number);
                $differ = (float) pow((1 + ($rate / 100)), $Diff);

                $PHT = $principal / 1.2;
                $FraisDoss = $PHT * $TXFD / 100;
                $Avance = $principal * $DG / 100;
                $Apport_Total = $Avance + $FraisDoss;
                $Apport_Total = number_format($Apport_Total, 2, ".", "");
                $FraisDoss = number_format($FraisDoss, 2, ".", "");
                if ($produit == 'LOA') {
                    $MTF = $principal * (1 - $DG / 100) / 1.2 * $differ + $TIMB / 1.2;
                    $Ass = $principal * (1 - $DG / 100) / 1.2 * $ADI / 100;
                    $payment = calc_payment($MTF, $number, $rate, $VR, 2);
                    $payment = $payment * 1.2;
                } else {
                    $MTF = ($principal - $DG);
                    $Ass = $principal * $ADI / 100;
                    $payment = calc_payment($MTF, $number, $rate, $VR, 2);
                }

                $Cout = $number * $payment + $Apport_Total - $principal;
                $elt = [
                    "TTC" => number_format($principal, 2, ".", " "),
                    "payment" => number_format($payment, 2, ".", " ")
                    // "paymentNoFormat" => $payment,
                    // "Apport_Total" => number_format($Apport_Total, 2, ".", " "),
                    // "Assurance" => number_format($Ass, 2, ".", ""),
                    // "FraisDossier" => number_format($FraisDoss, 2, ".", " "),
                    // "Cout" => number_format($Cout, 2, ".", " ")
                ];

                array_push($elements,$elt);
                echo json_encode($elt);
                echo '<script>console.log("'.$elt.'")</script>';

            }
            
            // echo json_encode($elt);

        } else {
            echo '<option>No Data Found</option>';
        }

    }
}else{
    $elt='errors';
    echo '<script>console.log("'.$elt.'")</script>';
}

function countErrors(){
    global $principal, $number, $R_Value;
    $error = [];
    if (!empty($principal)) {
        if (!is_numeric($principal) || $principal < 0) {
            $error['principal'] = "must be numeric and greater than or equal to zero";
        } else {
            $principal = (float) $principal;
        }
    }

    if (!empty($number) && !preg_match('/^[0-9]+$/', $number)) {
        $error['number'] = "must be an integer";
    } else {
        $number = (int) $number;
    }

    if (!empty($R_Value)) {
        if (!is_numeric($R_Value) || $R_Value < 0) {
            $error['R_Value'] = "must be numeric and greater than or equal to zero";
        } else {
            $R_Value = (float) $R_Value;
        }
    }
    return $error;

}



function fetchData($duration, $DG)
{
    global $conn;
    $query = "SELECT * FROM SLF_TARIFICATION WHERE DUREE = $duration AND APPORT =$DG ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $data = [];
    }

    return $data;
}

function calc_payment($pv, $payno, $int, $RV, $accuracy)
{
    $RV = $RV / pow((1 + ($int / 100)), $payno);
    $int = $int / 100;
    $value1 = $int * pow((1 + $int), $payno);
    $value2 = pow((1 + $int), $payno) - 1;
    if ($int == 0) {
        $pmt = ($pv - $RV) / $payno;
    } else {
        $pmt = ($pv - $RV) * ($value1 / $value2);
    }

    //$pmt = ($int == 0) ? ($pv - $RV) / $payno : ($pv - $RV) * ($value1 / $value2);

    $pmt = number_format($pmt, $accuracy, ".", "");
    return $pmt;
}
