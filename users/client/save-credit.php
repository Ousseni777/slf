<?php
session_start();
include '../../connectToDB.php';

if (isset($_POST['project'], $_POST['amount'], $_POST['duration'], $_POST['monthly'], $_POST['app_fees'])) {
    $project = mysqli_real_escape_string($conn, $_POST['project']);
    $amount = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['amount'])));
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $monthly = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['monthly'])));
    $app_fees = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['app_fees'])));

    $rand_text = generateUniqueID(2);
    $ran_id = rand(time(), 100000000);
    $ran_id = $rand_text . '-' . $ran_id;
    $today = new DateTime();
    $today = $today->format('Y-m-d');

    if ($project == "auto") {

        if (isset($_POST['adi'], $_POST['cost_ex_adi'], $_POST['tariff_id'], $_POST['down_pmt'], $_POST['down_pmt_perc'])) {
            $adi = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['adi'])));
            $cost_ex_adi = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['cost_ex_adi'])));
            $tariff_id = mysqli_real_escape_string($conn, $_POST['tariff_id']);
            $down_pmt = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['down_pmt'])));
            $down_pmt_perc = mysqli_real_escape_string($conn, $_POST['down_pmt_perc']);

            $insert_query = "INSERT INTO `credit_client`(`IDCREDIT`, `IDTARIFF`, `IDCLIENT`, `IDSELLER`, `STATE`, `STATE_LIB`, `AMOUNT`, `DURATION`, `MONTHLY`, `PROJECT`, `APP_FEES`, `DOWN_PMT_PERC`, `DOWN_PMT`, `ADI`, `COST_EX_ADI`, `UP_DATE`) 
        VALUES ('{$ran_id}','{$tariff_id}','{$ran_id}','{$ran_id}', 0,'En attente','{$amount}','{$duration}','{$monthly}','{$project}','{$app_fees}','{$down_pmt_perc}','{$down_pmt}','{$adi}','{$cost_ex_adi}','{$today}')";
        } else {
            $msg = "Une erreur est survenue, merci de réessayer encore !";
        }
    } else {
        $insert_query = "INSERT INTO `credit_client`(`IDCREDIT`, `IDTARIFF`, `IDCLIENT`, `IDSELLER`, `STATE`, `STATE_LIB`, `AMOUNT`, `DURATION`, `MONTHLY`, `PROJECT`, `APP_FEES`, `UP_DATE`) 
    VALUES ('{$ran_id}','{$ran_id}','{$ran_id}','{$ran_id}', 0,'tempo','{$amount}','{$duration}','{$monthly}','{$project}','{$app_fees}','{$today}')";
    }


    $result_insert = $conn->query($insert_query);
    if (($result_insert)) {
        $_SESSION['credit_id_temp'] = $ran_id;
        $msg = "success";
    } else {
        $msg = "Une erreur est survenue, merci de réessayer encore !";
    }    

}else {
    $msg = "Une erreur est survenue, merci de réessayer encore !";
}
echo $msg;




function generateUniqueID($k)
{
    $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $concat = '';
    for ($i = 0; $i < $k; $i++) {
        $concat = $concat . $alpha[rand(0, strlen($alpha) - 1)];
    }
    return $concat;
}

?>