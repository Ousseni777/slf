<?php

include '../../connectToDB.php';

if (isset($_POST['ID_BRAND'], $_POST['ID_PRODUCT'], $_POST['ID_DURATION'], $_POST['ID_AMOUNT'], $_POST['ID_APPORT'])) {
    $brand = $_POST['ID_BRAND'];
    $product = $_POST['ID_PRODUCT'];
    $tariff = $_POST['ID_TARIFF'];
    $number = $_POST['ID_DURATION'];
    $principal = $_POST['ID_AMOUNT'];
    $DG = $_POST['ID_APPORT'];
    $TIMB = 25;


    $durations = fetchDuration($brand, $tariff, $product, $DG);
    
    $lengthDurations = count($durations);
    if ($lengthDurations > 0) {
        $payments = [];
        $options = '';
        // $durations = [24, 35, 47, 59, 71];
        $ct = 0;
        $trs = '';
        foreach ($durations as $data) {


            $duration = $data['DUREE'];

            list($tariff_id, $rate, $TXFD, $ADI, $Diff) = fetchData($brand, $product, $tariff, $duration, $DG);

            $VR = (float) pow($principal * 0.01 * (1 + $rate), -$duration);
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
            $payments[$duration] = calc_payment($MTF, $duration, $rate, $VR, 2);

            if ($product == 'LOA') {
                $payments[$duration] = $payments[$duration] * 1.2;
            }

            $ct++;
            if ($ct == 1) {
                $firstPmt = $payments[$duration];
            }else{
                $trs = $trs . '<tr>
                <td class="" ><p>' . $duration . '</p></td>
                <td class="" >' . $payments[$duration] . '</p></td>
            
                </tr>';
            }

            $Cout = $duration * $payments[$duration] + $Apport_Total - $principal;
           
          

            if ($duration == $number) {

                $payment_tmp = $payments[$duration];
                $Apport_Total_tmp = $Apport_Total;
                $rate_tmp = $rate;
                $FraisDoss_tmp = $FraisDoss;
                $Cout_tmp = $Cout;
                $Ass_temp = $Ass;
                $tariff_id_tmp = $tariff_id;

                $options .= '<button type="button" onclick="fetchBtnId(this)" id="'.$duration.'" class="btn btn-outline-secondary active btn-monthly" style="margin-right : 2%" >' . number_format($payments[$duration], 2, ".", " ") . '</button>';




            } else {
                $options .= '<button type="button" onclick="fetchBtnId(this)" id="'.$duration.'"  class="btn btn-outline-secondary btn-monthly" style="margin-right : 2%" >' . number_format($payments[$duration], 2, ".", " ") . '</button>';
            }

        }

    }

    $RecapSim = '
    <table class="toPrint" id="toPrintSim">

    <thead>
        <tr>
            <th>MARQUE</th>
            <th>PRODUIT</th>
            <th>BAREME</th>
            <th>PRIX TTC</th>
            <th>APPORT</th>
            <th>DUREEE</th>
            <th>MENSUALITE</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="" rowspan="' . $lengthDurations . '">
                <p>' . $brand . '</p>
            </td>
            <td class="" rowspan="' . $lengthDurations . '">
                <p>' . $product . '</p>
            </td>
            <td class="" rowspan="' . $lengthDurations . '">
                <p>' . $tariff . '</p>
            </td>
            <td class="" rowspan="' . $lengthDurations . '">
                <p>' . $principal . '</p>
            </td>
            <td class="" rowspan="' . $lengthDurations . '">
                <p>' . $DG . '</p>
            </td>
            <td class="">
                <p>' . $number . '</p>
            </td>
            <td class="">' . $firstPmt . '</p>
            </td>

        </tr>'. $trs .'



    </tbody>
</table>             
                ';

    $result = [
        "TTC" => number_format($principal, 2, ",", " "),        
        "payment" => number_format($payment_tmp, 2, ",", " "),
        "paymentNoFormat" => $payment_tmp,
        "Apport_Total" => number_format($Apport_Total_tmp, 2, ",", " "),
        "Assurance" => number_format($Ass, 2, ",", " "),
        "FraisDossier" => number_format($FraisDoss_tmp, 2, ",", " "),
        "Cout" => number_format($Cout_tmp, 2, ",", " "),
        "tariff_id" => $tariff_id_tmp,
        "TAUXINT" => $rate_tmp,
        "Marque" => $brand,
        "Produit" => $product,
        "Bareme" => $tariff,
        "RecapSim" => $RecapSim,
        "OptionMonthly" => $options
    ];

    echo json_encode($result);


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

}

function fetchDuration($brand, $tariff, $product, $apport)
{
    global $conn;
    $query = "SELECT DISTINCT DUREE FROM SLF_TARIFICATION WHERE MARQUE='$brand' AND PRODUIT='$product' AND BAREME='$tariff' AND APPORT='$apport' ORDER BY DUREE";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $sql_duree = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $sql_duree = [];
    }

    return $sql_duree;
}

function fetchData($brand, $product, $tariff, $duration, $DG)
{
    global $conn;
    $query = "SELECT * FROM SLF_TARIFICATION WHERE MARQUE = '$brand' AND PRODUIT = '$product' AND BAREME = '$tariff' AND DUREE = '$duration' AND APPORT ='$DG' ";
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


// function vpm($TAUX, $DUREE, $VA){
//     return $TAUX*$VA/(1-pow((1+$TAUX), $DUREE));
// }

// function montFin2($TTC, $APPORT, $TAUX){
//     // $APPORT = $APPORT / 100;
//     return montFin1($TTC, $APPORT)+pow((1+$TAUX), 0.5);
// }

// function montFin1($TTC, $APPORT){
//     $VR=0;
//     $FLATE= 25;
//     $PHT=$TTC/1.2;
//     return $PHT-montDG_HT($TTC, $APPORT)+$VR+$FLATE/1.2;
// }

// function montDG_HT($TTC, $APPORT){
//     return ($TTC*$APPORT)/1.2;
// }
