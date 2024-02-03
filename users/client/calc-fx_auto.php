<?php

include '../../connectToDB.php';

if (isset($_POST['ID_BRAND'], $_POST['ID_PRODUCT'], $_POST['ID_TARIFF'], $_POST['ID_DURATION'], $_POST['ID_AMOUNT'], $_POST['ID_APPORT'])) {
    $brand = $_POST['ID_BRAND'];
    $product = $_POST['ID_PRODUCT'];
    // $tariff=$_POST['ID_TARIFF'];
    $profession = $_POST['ID_PROFESSION'];
    $number = $_POST['ID_DURATION'];
    $principal = $_POST['ID_AMOUNT'];
    $DG = $_POST['ID_APPORT'];
    $TIMB = 25;

    $tariff = attrBareme($brand, $product, $profession);

    list($tariff_id, $rate, $TXFD, $ADI, $Diff) = fetchData($brand, $product, $tariff, $number, $DG);

    $VR = (float) pow($principal * 0.01 * (1 + $rate), -$number);
    $differ = (float) pow((1 + ($rate / 100)), $Diff);

    $PHT = $principal / 1.2;
    $FraisDoss = $PHT * $TXFD / 100;
    $Avance = $principal * $DG / 100;
    $Apport_Total = $Avance + $FraisDoss;
    $Apport_Total = number_format($Apport_Total, 2, ".", "");
    $FraisDoss = number_format($FraisDoss, 2, ".", "");

    if ($product == 'LOA') {
        $MTF = $principal * (1 - $DG / 100) / 1.2 * $differ + $TIMB / 1.2;
        $Ass = $principal * (1 - $DG / 100) / 1.2 * $ADI / 100;
    } else {
        $MTF = ($principal - $DG);
        $Ass = $principal * $ADI / 100;
    }


}

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

if (empty($error)) {
    $payment = calc_payment($MTF, $number, $rate, $VR, 2);
    if ($product == 'LOA') {
        $payment = $payment * 1.2;
    }
    $Cout = $number * $payment + $Apport_Total - $principal;
    $result = [
        "TTC" => number_format($principal, 2, ".", " "),
        "payment" => number_format($payment, 2, ".", " "),
        "paymentNoFormat" => $payment,
        "tariff_id" => $tariff_id,
        "Apport_Total" => number_format($Apport_Total, 2, ".", " "),
        "Assurance" => number_format($Ass, 2, ".", ""),
        "FraisDossier" => number_format($FraisDoss, 2, ".", " "),
        "Cout" => number_format($Cout, 2, ".", " ")
    ];


    echo json_encode($result);
}

function fetchData($brand, $product, $tariff, $duration, $DG)
{
    global $conn;
    $query = "SELECT * FROM SLF_TARIFICATION WHERE MARQUE = '$brand' AND PRODUIT = '$product' AND BAREME = '$tariff' AND DUREE = '$duration' AND APPORT ='$DG' ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $tariff_id = $data['TARIFF_ID'];
        $rate = $data['TAUX'];
        $data_dg = $data['TXFD'];
        $data_ADI = $data['ADI'];
        $data_Diff = $data['Dif'];
    } else {
        $rate = $tariff_id = $data_dg = $data_ADI = $data_Diff = 0;
    }

    return [$tariff_id, $rate, $data_dg, $data_ADI, $data_Diff];
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


function attrBareme($brand, $product, $profession)
{
    if ($brand == "AUDI") {
        if ($product == "CA") {
            if ($profession == "SALARIE") {

            }
            if ($profession == "FONCTIONNAIRE") {

            }
            if ($profession == "COMMERCANT") {

            }
            if ($profession == "SOCIETE") {

            }

        }
        if ($product == 'LOA') {
            if ($profession == "SALARIE") {

            }
            if ($profession == "FONCTIONNAIRE") {

            }
            if ($profession == "COMMERCANT") {

            }
            if ($profession == "SOCIETE") {

            }
        }
    }
    if ($brand == "AUDI") {
        if ($product == "CA") {
            if ($profession == "SALARIE") {
                return "CLASSIQUE PARTICULIER";
            }
            if ($profession == "FONCTIONNAIRE") {
                return "CLASSIQUE PARTICULIER";
            }
            if ($profession == "COMMERCANT") {
                return "CA PRO";
            }
            if ($profession == "SOCIETE") {
                return "CA PRO";
            }

        }
        if ($product == 'LOA') {

            if ($profession == "SALARIE") {
                return "LOA STANDARD";
            }
            if ($profession == "FONCTIONNAIRE") {
                return "LOA STANDARD";
            }
            if ($profession == "COMMERCANT") {
                return "LOA STANDARD";
            }
            if ($profession == "SOCIETE") {
                return "LOA STANDARD";
            }
        }
        if ($product == "OCCASION") {
            return "CA OCCASION STANDARD";
        }
    }
    if ($brand == "KIA") {
        if ($product == "CA") {
            if ($profession == "SALARIE") {
                return "CA PARTICULIER";
            }
            if ($profession == "FONCTIONNAIRE") {
                return "CA PARTICULIER";
            }
            if ($profession == "COMMERCANT") {
                return "CA SOCIETE";
            }
            if ($profession == "SOCIETE") {
                return "CA SOCIETE";
            }

        }
        if ($product == 'LOA') {
            if ($profession == "SALARIE") {
                return "LOA STANDARD";
            }
            if ($profession == "FONCTIONNAIRE") {
                return "LOA STANDARD";
            }
            if ($profession == "COMMERCANT") {
                return "LOA STANDARD";
            }
            if ($profession == "SOCIETE") {
                return "LOA STANDARD";
            }
        }
    }
    if ($brand == "FORD") {
        if ($product == "CA") {
            if ($profession == "SALARIE") {
                return "CA SALARIES";
            }
            if ($profession == "FONCTIONNAIRE") {
                return "CA SALARIES";
            }
            if ($profession == "COMMERCANT") {
                return "CA PROMO PROFESSIONNEL";
            }
            if ($profession == "SOCIETE") {
                return "CA PROMO PROFESSIONNEL";
            }

        }
        if ($product == 'LOA') {
            if ($profession == "SALARIE") {
                return "LOA STANDARD";
            }
            if ($profession == "FONCTIONNAIRE") {
                return "LOA STANDARD";
            }
            if ($profession == "COMMERCANT") {
                return "LOA STANDARD";
            }
            if ($profession == "SOCIETE") {
                return "LOA STANDARD";
            }
        }
    }
    if ($brand == "MERCEDES") {
        if ($product == "CA") {
            if ($profession == "SALARIE") {
                return "CLASSIQUE PARTICULIER";
            }
            if ($profession == "FONCTIONNAIRE") {
                return "CLASSIQUE PARTICULIER";
            }
            if ($profession == "COMMERCANT") {
                return "CA PRO";
            }
            if ($profession == "SOCIETE") {
                return "CA PRO";
            }

        }
        if ($product == 'LOA') {
            if ($profession == "SALARIE") {
                return "LOA STANDARD";
            }
            if ($profession == "FONCTIONNAIRE") {
                return "LOA STANDARD";
            }
            if ($profession == "COMMERCANT") {
                return "LOA STANDARD";
            }
            if ($profession == "SOCIETE") {
                return "LOA STANDARD";
            }
        }
        if ($product == "OCCASION") {
            return "CA OCCASION STANDARD";
        }
    }
}