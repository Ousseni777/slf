<?php
session_start();
include '../../connectToDB.php';

if (isset($_POST['PROJECT'], $_POST['AMOUNT'], $_POST['DURATION'], $_POST['MONTHLY'], $_POST['APP_FEES'])) {
    $PROJECT = strtoupper(mysqli_real_escape_string($conn, $_POST['PROJECT']));
    $AMOUNT = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['AMOUNT'])));
    $DURATION = mysqli_real_escape_string($conn, $_POST['DURATION']);
    $MONTHLY = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['MONTHLY'])));
    $APP_FEES = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['APP_FEES'])));

    $rand_text = generateUniqueID(2);
    $ran_id = rand(time(), 100000000);
    $ran_id = $rand_text . '-' . $ran_id;
    if (isset($_SESSION['CLIENT_ID'])) {
        $CLIENT_ID = $_SESSION['CLIENT_ID'];
    } else {
        $CLIENT_ID = $ran_id;
    }
    $SELLER_ID = 'ANONYME';


    $today = new DateTime();
    $today = $today->format('Y-m-d');

    if ($PROJECT == "AUTO") {

        if (isset($_POST['ADI'], $_POST['COST_EX_ADI'], $_POST['TARIFF_ID_UK'], $_POST['DOWN_PMT'], $_POST['DOWN_PMT_PERC'])) {
            $ADI = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['ADI'])));
            $COST_EX_ADI = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['COST_EX_ADI'])));
            $TARIFF_ID_UK = mysqli_real_escape_string($conn, $_POST['TARIFF_ID_UK']);
            $DOWN_PMT = (float) (str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['DOWN_PMT'])));
            $DOWN_PMT_PERC = mysqli_real_escape_string($conn, $_POST['DOWN_PMT_PERC']);



            $insert_query = "INSERT INTO `credit_client`(`CREDIT_ID`, `TARIFF_ID`, `CLIENT_ID`, `SELLER_ID`, `STATE_LIB`, `AMOUNT`, `DURATION`, `MONTHLY`, `PROJECT`, `APP_FEES`,`DOWN_PMT_PERC`, `DOWN_PMT`, `ADI`, `COST_EX_ADI`, `UP_DATE`) 
        VALUES ('{$ran_id}','{$TARIFF_ID_UK}','{$CLIENT_ID}','{$SELLER_ID}','En attente','{$AMOUNT}','{$DURATION}','{$MONTHLY}','{$PROJECT}','{$APP_FEES}','{$DOWN_PMT_PERC}','{$DOWN_PMT}','{$ADI}','{$COST_EX_ADI}','{$today}')";
        } else {
            $msg = array('status' => 'error', 'message' => 'Une erreur est survenue, merci de réessayer encore !');
        }
    } else {
        $insert_query = "INSERT INTO `credit_client`(`CREDIT_ID`, `TARIFF_ID`, `CLIENT_ID`, `SELLER_ID`, `STATE_LIB`, `AMOUNT`, `DURATION`, `MONTHLY`, `PROJECT`, `APP_FEES`, `UP_DATE`) 
    VALUES ('{$ran_id}',0,'{$CLIENT_ID}','{$SELLER_ID}','En attente','{$AMOUNT}','{$DURATION}','{$MONTHLY}','{$PROJECT}','{$APP_FEES}','{$today}')";
    }


    $result_insert = $conn->query($insert_query);
    if (($result_insert)) {
        $msg = array('status' => 'success', 'message' => 'Demande N°: <b>' . $ran_id . ' </b> , ajoutée avec succès');
        if (!isset($_SESSION['CLIENT_ID'])) {
            $_SESSION['CREDIT_ID_TEMP'] = $ran_id;
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