<?php
session_start();
include '../../connectToDB.php';
$SELLER_ID = "ANONYME";

if (!empty(mysqli_real_escape_string($conn, $_POST['EMAIL']))) {
    
    $CLIENT_EMAIL = mysqli_real_escape_string($conn, $_POST['EMAIL']);
    $TAUXINT = $_POST['TAUXINT'];

    $AMOUNT = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['AMOUNT'])));
    $DURATION = mysqli_real_escape_string($conn, $_POST['DURATION']);
    $MONTHLY = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['MONTHLY'])));
    $APP_FEES = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['APP_FEES'])));

    $ADI = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['ADI'])));
    $COST_EX_ADI = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['COST_EX_ADI'])));
    $DOWN_PMT = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['DOWN_PMT'])));
    $DOWN_PMT_PERC = mysqli_real_escape_string($conn, $_POST['DOWN_PMT_PERC']);

    $TARIFF_ID = mysqli_real_escape_string($conn, $_POST['TARIFF_ID']);


    $rand_text = generateUniqueID(2);
    $ran_id = rand(time(), 100000000);
    $ran_id = $rand_text . '-' . $ran_id;
    $today = new DateTime();
    $today = $today->format('Y-m-d');

    $insert_query = "INSERT INTO `credit_client_tmp`(`CREDIT_ID`, `TARIFF_ID`, `CLIENT_EMAIL`, `SELLER_ID`,  `AMOUNT`, `DURATION`, `MONTHLY`, `PROJECT`,`TAUXINT`, `APP_FEES`, `DOWN_PMT_PERC`, `DOWN_PMT`, `ADI`, `COST_EX_ADI`, `UP_DATE`) 
    VALUES ('{$ran_id}','{$TARIFF_ID}','{$CLIENT_EMAIL}','{$SELLER_ID}','{$AMOUNT}','{$DURATION}','{$MONTHLY}','Crédit auto' , '{$TAUXINT}', '{$APP_FEES}','{$DOWN_PMT_PERC}','{$DOWN_PMT}','{$ADI}','{$COST_EX_ADI}','{$today}')";


    $result_insert = $conn->query($insert_query);
    if (($result_insert)) {

        $response = array('status' => 'success', 'message' => 'Demande N°: <b>' . $ran_id . ' </b> , ajoutée avec succès');
    } else {
        $response = array('status' => 'error', 'message' => 'Une erreur est survenue, merci de réessayer encore !');
    }



} else {
    $response = array('status' => 'error', 'message' => 'Veuillez saisir une adresse email !');
}

echo json_encode($response);




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