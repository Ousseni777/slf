<?php
session_start();
include '../../connectToDB.php';

if (isset($_POST['project'], $_POST['amount'], $_POST['duration'], $_POST['monthly'], $_POST['app_fees'])) {
    $project = strtoupper(mysqli_real_escape_string($conn, $_POST['project']));
    $amount = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['amount'])));
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $monthly = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['monthly'])));
    $app_fees = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['app_fees'])));

    $rand_text = generateUniqueID(2);
    $ran_id = rand(time(), 100000000);
    $ran_id = $rand_text . '-' . $ran_id;
    if (isset($_SESSION['client_id'])) {
        $client_id = $_SESSION['client_id'];
    } else {
        $client_id = $ran_id;
    }
    $seller_id = 'ANONYME';


    $today = new DateTime();
    $today = $today->format('Y-m-d');

    if ($project == "AUTO") {

        if (isset($_POST['adi'], $_POST['cost_ex_adi'], $_POST['tariff_id'], $_POST['down_pmt'], $_POST['down_pmt_perc'])) {
            $adi = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['adi'])));
            $cost_ex_adi = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['cost_ex_adi'])));
            $tariff_id = mysqli_real_escape_string($conn, $_POST['tariff_id']);
            $down_pmt = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['down_pmt'])));
            $down_pmt_perc = mysqli_real_escape_string($conn, $_POST['down_pmt_perc']);



            $insert_query = "INSERT INTO `credit_client`(`credit_id`, `tariff_id`, `client_id`, `seller_id`, `state`, `amount`, `duration`, `monthly`, `project`, `app_fees`,`down_pmt_perc`, `down_pmt`, `adi`, `cost_ex_adi`, `up_date`) 
        VALUES ('{$ran_id}','{$tariff_id}','{$client_id}','{$seller_id}','En attente','{$amount}','{$duration}','{$monthly}','{$project}','{$app_fees}','{$down_pmt_perc}','{$down_pmt}','{$adi}','{$cost_ex_adi}','{$today}')";
        } else {
            $msg = array('status' => 'error', 'message' => 'Une erreur est survenue, merci de réessayer encore !');
        }
    } else {
        $insert_query = "INSERT INTO `credit_client`(`credit_id`, `tariff_id`, `client_id`, `seller_id`, `state`, `amount`, `duration`, `monthly`, `project`, `app_fees`, `up_date`) 
    VALUES ('{$ran_id}',0,'{$client_id}','{$seller_id}','En attente','{$amount}','{$duration}','{$monthly}','{$project}','{$app_fees}','{$today}')";
    }


    $result_insert = $conn->query($insert_query);
    if (($result_insert)) {
        $msg = array('status' => 'success', 'message' => 'Demande N°: <b>' . $ran_id . ' </b> , ajoutée avec succès');
        if (!isset($_SESSION['client_id'])) {
            $_SESSION['credit_id_temp'] = $ran_id;
        }


    } else {
        $msg = array('status' => 'error', 'message' => 'Une erreur est survenue, merci de réessayer encore !');
    }

} else {
    $msg = array('status' => 'error', 'message' => 'Une erreur est survenue, merci de réessayer encore !');
}
echo json_encode($msg);





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